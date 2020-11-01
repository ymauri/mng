<?php

namespace App\Services;

use App\Models\Listing;
use Carbon\Carbon;

/**
 * PricingService. Functionalities related with the bulk update prices in guesty.
 */
class PricingService
{

    /**
     * @var GuestyService
     */
    private $guesty;

    public function __construct(GuestyService $guesty)
    {
        $this->guesty = $guesty;
    }

    /**
     * Parsing guesty calendar data for been showing in the view.
     * @param string $from
     * @param string $to
     * @param array $weekdays
     * @param array $listings
     *
     * @return mixed
     */
    public function filterCalendar(string $from, string $to, array $weekdays = [], array $listings = [])
    {
        $calendars = $this->guesty->listingCalendar($from, $to, $listings);
        $result = [];
        foreach ($calendars as $calendar) {
            if (count($weekdays) == 0 || in_array(Carbon::parse($calendar['date'])->dayOfWeek, $weekdays)) {
                $listing = Listing::where('idguesty', $calendar['listingId'])->first();
                $calendar['listingNumber'] = !empty($listing) ? $listing->value : 'Not Found';
                $result[$calendar['listingNumber']][] = $calendar;
            }
        }
        return $result;
    }

    /**
     * Update listing prices on guesty platform
     * @param array $data
     *
     * @return bool
     */
    public function update(array $data)
    {
        $arrayToSend = [];
        foreach ($data as $key => $item) {
            $keyData = explode('_', $key);
            if (!empty($item)) {
                $arrayToSend[] = [
                    'listingId' => $keyData[1],
                    'from'      => $keyData[0],
                    'to'        => $keyData[0],
                    'price'     => (int) $item,
                    'note'      => 'Updated by API'
                ];
            }
        }
        if (count($arrayToSend) > 0) {
            $this->guesty->updatelistingCalendar($arrayToSend);
            return true;
        }
        return false;
    }
}
