<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

/**
 * GuestyService allows to connect with the guesty API and interact with it
 */
class GuestyService {

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
    private function auth() {
        return Http::withBasicAuth($this->user, $this->password);
    }

    /**
     * Parse API response
     * @param mixed $response
     *
     * @return mixed
     */
    private function parseResponse($response) {
        if ($response->ok()) {
            return $response->json();
        } else {
            return false;
        }
    }

    /**
     * Gets listtingCalendar object by dates and optionally listings id
     * @param string $from
     * @param string $to
     * @param array $ids
     *
     * @return mixed
     */
    public function listingCalendar(string $from, string $to, array $ids = []) {
        $response = $this->auth()->get($this->url.'listings/calendars', [
            'from' => $from,
            'to' => $to,
            'ids' => count($ids) > 0 ? $ids : ''
        ]);
        return $this->parseResponse($response);
    }
}
