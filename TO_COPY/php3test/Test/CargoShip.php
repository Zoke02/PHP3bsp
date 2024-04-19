<?php

namespace WIFI\Prufung\Test;

use WIFI\Prufung\Test\Containe\ContainerAbstract;


class CargoShip implements \Iterator {

    private array $ship = array();
    private float $speed;
    private $weight_of_products;

    public function __construct(float $value) 
    {
        $this->speed = $value;
    }

    public function reisezeit($distance_in_km) 
    {
        $result = $distance_in_km / $this->speed;
        return $result;
    }

    // public function add_container(ContainerAbstract $container): void
    public function add_container($container): void
    {
        $this->ship[] = $container;
    }

    
    public function how_many_containers():int
    {
        $result = count($this->ship);
        return $result;
    }

    
    public function weight_of_all_containers() 
    {
        foreach ($this->ship as $key => $container) 
        {
        $this->weight_of_products += $container->get_weight_of_products();
        }
        return $this->weight_of_products;
    }

    // Inerator-Interface Implementierung
    private int $index = 0;

    public function current(): mixed {
        return $this->ship[$this->index];
    }

    public function key() {
        return $this->ship[$this->index];
    }

    public function next():void {
        ++$this->index;
    }

    public function valid(): bool {
        return isset ($this->ship[$this->index]);
    }

    public function rewind(): void {
        $this->index = 0;
    }
}