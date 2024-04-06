<?php
namespace WIFI\JWE;
use WIFI\JWE\Tier\Animal;

// A interface gives a template.
// If a class implements this interface, the class MUST incorporate all methods contained here.
interface AnimalInterface {

    // void gives no return on the function but it can do function stuff like change name or whatever.
    public function add(Animal $tier): void;

}