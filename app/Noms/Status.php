<?php

namespace App\Noms;

use ReflectionClass;

/**
 * Status. Nomenclator for standardize the Guesty reservations statuses
 */
class Status {
    const AVAILABLE = 'Available';
    const UNAVAILABLE = 'Unavailable';
    const RESERVED = 'Reserved';
    const BOOKED = 'Booked';

    static function all() {
        $oClass = new ReflectionClass(__CLASS__);
        return $oClass->getConstants();
    }

    static function color(string $status) {
        switch (ucfirst($status)) {
            case self::AVAILABLE:
                return 'success';
            case self::UNAVAILABLE:
                return 'danger';
            case self::RESERVED:
                return 'warning';
            case self::BOOKED:
                return 'info';
        }
    }
}
