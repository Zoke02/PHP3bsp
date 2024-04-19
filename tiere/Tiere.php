<?php
namespace WIFI\JWE;
use WIFI\JWE\Tier\Animal;

class Tiere implements AnimalInterface,\Iterator {

    private array $farm = array();


    // Typdeclaration (Type-Hint): Animals
    // Only objects that inherit from "Animals" or are "Animals" themselves may be passed as arguments to this method
    public function add(Animal $tier): void {
        $this->farm[] = $tier;
    }
    public function output(): string {
        $return = "";
        foreach ($this->farm as $animal) {
            $return .= $animal->get_name() . " says " . $animal->make_noise() . "<br>" . "<br>";
            // Some of my tests with instanceof
            // if ($animal instanceof Dogge) {
            //     $return .= $animal->get_name() . "<br>" . $dogge->bite() . "<br>" . $animal->make_noise() . "<br>" . "<br>";
            // }
        }
        return $return;
    }

    // Inerator-Interface Implementierung
    private int $index = 0;

    public function current(): mixed {
        return $this->farm[$this->index];
    }

    public function key() {
        return $this->farm[$this->index];
    }

    public function next():void {
        ++$this->index;
    }

    public function valid(): bool {
        //isset give true if the index is there and false if not just like if.
        return isset ($this->farm[$this->index]);
    }

    public function rewind(): void {
        $this->index = 0;
    }

}
