<?php
namespace WIFI\JWE\Tier;

class Dog extends Animal {

    public function get_name():string {
        $name = parent::get_name();
        return $name . " (Dog)";

    }

    public function make_noise():string {
        return "Wuff!";
    }

}