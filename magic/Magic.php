<?php

class Magic {
    // Stores all properties in $daten with __set() that do not exist as independent properties.
    private array $daten = array();

    // If a property is SET from outside that does not exist in the object, 
    // the __(set) magic method is automatically used.
    public function __set($variable, $value) {
        $this->daten[$variable] = $value;
    }

    // If a property is used from the outside that does not exist here in the object, 
    // the __(get)-magic method is automatically used.
    public function __get($variable) {
        return $this->daten[$variable];
    }

    // If a METHOD (function) is called from outside that does not exist in the object, 
    // the __call()- Magic-Method is automatically used.
    public function __call($method, $parameter) {
        echo "The method '". $method . "' is called";
        // echo "<pre>";
        // print_r($parameter);
        // echo "</pre>";
    }

    // If a complete object is used as a string (with echo), PHP uses the return value of the __toString().
    public function __toString() {
        return print_r($this->daten, true);
    }
}
