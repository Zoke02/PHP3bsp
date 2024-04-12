<?php
/**
 * These blocks and examples for "phpDoc" / "DocBlock" 
 * and can be processed with phpDocument.
 */

class Circle {
    // Constant that is permanently assigned to a class
    const PI = 3.141592654;

    private float $radius;
    private float $diameter;
    private float $circumference;

    public function __construct(float $r) {
        $this->set_radius($r);
    }
    // The destructor is definitely executed when the object is deleted. 
    // This can happen via unset($k) by the programmer, or automatically by PHP when the program has finished running.
    public function __destruct() {
        echo "Circle with Radius " . $this->radius . " is deleted.<br>";   
    }

    public function area_of_circle(): float {
        // pow() = Power of
        // self refers to "Circle" class
        return pow($this->radius, 2) * self::PI;
    }

    public function diameter_of_circle(): float {
        $this->diameter =  $this->radius * 2;
        return $this->diameter;
    }
      /**
     * Calculates the circumference of the Circle based on the given radius.
     * @return float the circumference of the Circle based on the given radius. 
     */
    public function circumference_of_circle(): float {
        $this->circumference = $this->diameter * self::PI;
        // $this->circumference = $this->diameter_of_circle() * self::PI;
        return $this->circumference;
    }

    /**
     * Set a new radius for the Circle
     * Even if the circle already exists and has been filled with a radius in the constructor,
     * you can set a new radius
     * @param int|float $new_r The new Radius of the Circle.
     * @return void.
     * @throws Exception "throw new Exception("Radius must be bigger as 0");".
     * 
     */
    public function set_radius(float $new_r): void {
        // float (dont forget to give it a datatyp)
        // void (no return type) (no return from function)
        if ($new_r <= 0 ) {
            // Wirft eine Exception, die als Fehler am Bildschrim aufscheint.
            // Gibt Kollegen einen Hintweis, was sie falsch gemacht haben.
            throw new Exception("Radius must be bigger as 0");
        } else {
        $this->radius = $new_r;
        }
    }   
}