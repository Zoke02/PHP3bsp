<?php

namespace WIFI\JWE\Tier\Hund;

// You need this for the "extend Dog".
use WIFI\JWE\Tier\Dog;
use WIFI\JWE\Tier\Animal;

class Dogge extends Dog {

    public function get_name():string {
        $name = Animal::get_name();
        return $name . " (Dogge)";
    }

    public function make_noise():string {
        return "Grrrr";
    }

    // Each class can add any method (and properties).
    public function bite():string {
        return "SNAP!";
    }
}