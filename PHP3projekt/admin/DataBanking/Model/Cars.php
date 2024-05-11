<?php
namespace WIFI\PHP3\DataBanking\Model;
use WIFI\PHP3\DataBanking\Mysql;
use WIFI\PHP3\DataBanking\Model\Row\Car;

class Cars {

    public function all_cars(): array
    {
        $all_cars = array();
        $db = Mysql::getInstanz();
        $result = $db->query("SELECT * FROM autos ORDER BY id ASC");
        
        // print_r($result);
        // exit;

        while ($row = $result->fetch_assoc()) 
        {   

            // print_r($row);
            // exit;

            $all_cars[] = new Car($row);
        }
        return $all_cars;
    }
}