<?php

namespace App\Noms;

use ReflectionClass;

/**
 * Sources. Nomenclator for standardize the Guesty reservations sources
 */
class Sources {
    const AIRBNB = 'Airbnb';
    const BOOKING = 'Booking.com';
    const WEBSITE = 'website';
    const DIRECT_BOOKING = 'Direct Booking';
    const EXPEDIA = 'Expedia';
    const MANUAL = 'Manual';
    const AGODA = 'Agoda';
    const RECEPTIE = 'receptie';
    const RECEPTION = 'Reception';

    static function all() {
        $oClass = new ReflectionClass(__CLASS__);
        return $oClass->getConstants();
    }
}
