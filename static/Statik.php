<?php

class Statik {

    // A static property belongs to an existing class and not to the created object.
    // This means that the property persists throughout the entire term.
    public static int $id = 0;

    // This static method is also directly mapped to the class.
    // Like the property, it is accessed via Statik::set_id_to_0() and cannot access $this - it is not part of the object.
    public static function set_id_to_0() {
        self::$id = 0;
    }

    public function __construct() {
        // Statik::$id++;
        self::$id++;
    }

    public function do_something() {
        
    }

}