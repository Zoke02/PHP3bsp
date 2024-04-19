<?php

namespace WIFI\Prufung\Test\Container;

class ContainerBig extends ContainerAbstract
{
    private float $leergewicht = 4.00;
    private float $nutzlast = 26.48;

    public function ist_gewicht():float
    {
        $result = $this->leergewicht + parent::get_weight_of_products();
        return $result;
    }

    public function max_gewicht():float
    {
        $result = $this->leergewicht + $this->nutzlast;
        return $result;
    }
}