<?php

namespace WIFI\Prufung\Test\Container;

// use WIFI\Prufung\Test\CargoShip;
use WIFI\Prufung\Test\Container\ContainerSmall;
use WIFI\Prufung\Test\Container\ContainerBig;

abstract class ContainerAbstract

{
    private float $leergewicht_small = 2.33;
    private float $nutzlast_small = 21.67;

    private float $leergewicht_big = 4.00;
    private float $nutzlast_big = 26.48;

    private float $weight_of_products;

    public function __construct(float $weight)
    {
        if ($weight > $this->nutzlast_big) {
            throw new \Exception("The weight of $weight is more then what a BIG container can hold. MAX IS: $this->nutzlast_big");
        }
        // if ($weight > $this->nutzlast_small) {
        //     throw new \Exception("The weight of $weight is more then what a SMALL container can hold.");
        // }
        $this->weight_of_products = $weight;

    }

    public function get_weight_of_products():float {
        return $this->weight_of_products;
    }
}
