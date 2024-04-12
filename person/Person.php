<?php
// Define classes that can later be used as objects.
class Person {
    // Property:
    // Placeholder for later values (like variable).
    // Private variables (or Methods) can only be accessed within the class.
    private $firstname;

    // Constructor: Called automatically as soon as the object is created.
    // z.B.: $variable = new Person();
    public function __construct($name) {
        $this->firstname = $name;
        // You can call later functions.
        // $this->set_firstname($name);
    }

    // Public Method, which can be accessed from outside.
    public function introduce() { //$this-> refers to Person class (Row-3)
        return "Hello, my name is " . $this->firstname . ".";
    }

    // Method to get private First Name.
    // A so-called “getter”.
    public function get_firstname() {
        return $this->firstname;
    }

    // Method to change the private $firstname.
    public function set_firstname($new_name) {
        // This method gives us the opportunity to insert checks before setting the new name.
        if ($this->firstname == $new_name) {
            echo "Error: Same name.";
            echo "<br>";
        } else {
            $this->firstname = $new_name;
        }
    }
}