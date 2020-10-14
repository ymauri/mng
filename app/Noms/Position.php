<?php

namespace App\Noms;

use ReflectionClass;

class Position {
    const MANAGER_RESTAURANT = 'Manager Restaurant';
    const CHEF = 'Chef';
    const RECEPTION = 'Receptie';
    const MANAGER_SKY_BAR = 'Manager Sky Bar';

    static function all() {
        $oClass = new ReflectionClass(__CLASS__);
        return $oClass->getConstants();
    }
}
