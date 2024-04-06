<?php
namespace WIFI\JWE\Tier;

class Cat extends Animal {

    public function get_name():string {
        $name = parent::get_name();
        return $name . " (Cat)";

    }

    public function make_noise():string {
        return "Meoow...";
    }

}