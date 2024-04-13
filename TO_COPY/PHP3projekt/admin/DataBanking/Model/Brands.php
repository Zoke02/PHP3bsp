<?php
namespace WIFI\PHP3\DataBanking\Model;

use WIFI\PHP3\DataBanking\Mysql;
use WIFI\PHP3\DataBanking\Model\Row\Brand;

class Brands {

    public function all_brands(): array
    {
        $all_brands = array();
        $db = Mysql::getInstanz();
        $result = $db->query("SELECT * FROM brand ORDER BY brand ASC");
        
        // print_r($result);
        // exit;

        while ($row = $result->fetch_assoc()) 
        {   

            // print_r($row);
            // exit;

            $all_brands[] = new Brand($row);
        }
        return $all_brands;
    }
}