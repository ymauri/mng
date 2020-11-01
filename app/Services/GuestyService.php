<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

/**
 * GuestyService allows to connect with the guesty API and interact with it
 */
class GuestyService
{

    private $user;
    private $url;
    private $password;

    public function __construct()
    {
        $this->user = config('guesty.auth.user');
        $this->url = config('guesty.auth.url');
        $this->password = config('guesty.auth.password');
        $this->id = config('guesty.auth.id');
    }

    /**
     * Authenticate on guesty API
     * @return Http
     */
    private function auth()
    {
        return Http::withBasicAuth($this->user, $this->password);
    }

    /**
     * Parse API response
     * @param mixed $response
     *
     * @return mixed
     */
    private function parseResponse($response)
    {
        if ($response->ok()) {
            return $response->json();
        } else {
            return false;
        }
    }

    /**
     * Get listtingCalendar object by dates and optionally listings id
     * @param string $from
     * @param string $to
     * @param array $ids
     *
     * @return mixed
     */
    public function listingCalendar(string $from, string $to, array $ids = [])
    {
        $response = $this->auth()->get($this->url . 'listings/calendars', [
            'from' => $from,
            'to' => $to,
            'ids' => count($ids) > 0 ? $ids : ''
        ]);
        return $this->parseResponse($response);
    }

    /**
     * Update listtingCalendar object by dates and optionally listings id
     * @param mixed $data | [{"listingId":"LISTINGID1","from":"2020-01-13","to":"2020-01-16","price":70}]
     *
     * @return mixed
     */
    public function updatelistingCalendar(array $data)
    {
        $response = $this->auth()->put($this->url . 'listings/calendars', $data);
        return $this->parseResponse($response);
    }

    /**
     * Get Reservation data
     * @param string $date
     *
     * @return array
     */
    public function reservation(string $date)
    {
        $response = $this->auth()->get(
            $this->url . 'reservations',
            [
                'fields' => 'checkIn checkOut checkInDateLocalized checkOutDateLocalized confirmationCode listing.title status source nightsCount guestsCount notes.guest guest money.fareAccommodation money.invoiceItems money.balanceDue money.hostPayout canceledAt',
                'filters' => '[{"field":"status", "operator":"$in", "value":["confirmed","canceled"]},{"field":"checkInDateLocalized", "operator":"$eq","value":"'.$date.'"}]',
                'limit' => '30'
            ]
        );
        return $this->parseResponse($response);
    }
}
