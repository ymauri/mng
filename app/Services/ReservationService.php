<?php

namespace App\Services;

use App\Models\Checkin;
use App\Models\Checkout;
use App\Models\Listing;
use App\Noms\Status;
use Carbon\Carbon;

class ReservationService
{
    /**
     * @var GuestyService
     */
    private $guesty;

    public function __construct(GuestyService $guesty)
    {
        $this->guesty = $guesty;
    }

    public function retrieve(string $date = "")
    {
        if (empty($date)) {
            $date = Carbon::now()->format("Y-m-d");
        }

        $reservations = $this->guesty->reservation($date);

        foreach ($reservations['results'] as $reservation) {
            if (!empty($reservation['_id'])) {
                $listing = Listing::where('idguesty', $reservation['listingId'])->first();
                if (!empty($listing)) {
                    $invoice = $this->getMoneyValues($reservation['money']['invoiceItems']);
                    $dataForSave = [
                        'listing'   => $listing->id,
                        'name'      => $reservation['guest']['fullName'],
                        'email'     => empty($reservation['guest']['email']) ? '' : $reservation['guest']['email'],
                        'phone'     => empty($reservation['guest']['phone']) ? '' : $reservation['guest']['phone'],
                        'time'      => Carbon::parse($reservation['checkInDateLocalized'])->format("Y-m-d H:i:s"),
                        'source'    => $reservation['source'],
                        'nights'    => $reservation['nightsCount'],
                        'guests'    => $reservation['guestsCount'],
                        'confcode'  => $reservation['confirmationCode'],
                        'idguesty'  => $reservation['_id'],
                        'status'    => $reservation['status'],
                        'betalen'   => $invoice['accommodation'] + $invoice['vat'] - $invoice['discount'],
                        'voldan'    => $reservation['money']['hostPayout'] - $reservation['money']['balanceDue'],
                        'note'      => empty($reservation['guest']['notes']) ? "" : $reservation['guest']['notes'],
                        'canceledat' => $reservation['status'] == 'canceled' ? Carbon::parse($reservation['canceledAt'])->format('Y-m-d H:i:s') : null
                    ];
                    Checkin::updateOrCreate(['confcode'  => $reservation['confirmationCode']],$dataForSave);
                    $dataForSave['time'] = Carbon::parse($reservation['checkOutDateLocalized'])->format("Y-m-d H:i:s");
                    Checkout::updateOrCreate(['confcode'  => $reservation['confirmationCode']],$dataForSave);
                }
            }
        }
    }


    private function getMoneyValues($invoiceItems)
    {
        $result['vat'] = 0;
        $result['accommodation'] = 0;
        $result['discount'] = 0;
        foreach ($invoiceItems as $item) {
            if (is_numeric(strpos(strtolower($item['title']), 'accommodation'))) {
                $result['accommodation'] = abs($item['amount']);
            }
            if (is_numeric(strpos(strtolower($item['title']), 'vat'))) {
                $result['vat'] = abs($item['amount']);
            }
            if ((!empty($item['title']) &&  is_numeric(strpos(strtolower($item['title']), 'discount'))) ||  (!empty($item['type']) && is_numeric(strpos(strtolower($item['type']), 'discount')))) {
                $result['discount'] = abs($item['amount']);
            }
        }
        return $result;
    }
}
