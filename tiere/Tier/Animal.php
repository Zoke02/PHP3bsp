<?php
namespace WIFI\JWE\Tier;

// ^ Is always as the top and it puts this text vefor the class Animal.
// Eigener nameraum für das Projekt, bzw. diese Klasse.
// Wird verwendet um gleich benannte Klassen in Verschiden Projekten zu erlauben.

abstract class Animal {

    // "Public" can be modefied everywhere.
    // "Private" can only be used in this file and in this class.
    // "Protected" means u can use $this->name; in other subclasses of this class.
    // "Readonly" only readable.
    
    // row 15 and 17 are the same as just row 16 but u put private befor string.
    // private readonly string $name;
    public function __construct(private string $name) {
        // $this->name = $name;
    }

    // Public Final Function get_name();
    // When somethng "final" is no subclases can overwrite this function.
    public function get_name(): string {
        return $this->name;
    }

    // Abstract before method means:
    // This method MUST be overridden (implemented) in child classes.

    abstract public function make_noise(): string;

}