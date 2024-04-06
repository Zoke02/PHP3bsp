<?php
namespace WIFI\JWE\Tier;

class Mouse extends Animal {

    public function get_name():string {
        $name = parent::get_name();
        return $name . " (Mouse)";

    }

    public function make_noise():string {
        return "Squeak!.. Squeak!";
    }

}