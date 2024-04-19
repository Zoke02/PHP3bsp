<?php

namespace WIFI\Prufung\Test\Container;

class ContainerSmall extends ContainerAbstract
{
    private float $leergewicht = 2.33;
    private float $nutzlast = 21.67;

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