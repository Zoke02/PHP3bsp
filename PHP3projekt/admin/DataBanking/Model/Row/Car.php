<?php
namespace WIFI\PHP3\DataBanking\Model\Row;

class Car extends RowAbstract
{
    protected string $tabel = "autos";

    public function get_brand(): Brand 
    {
        //$this-bramd_id
        return new Brand($this->brand_id);
    }
}