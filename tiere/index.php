<?php

// The autoloader receives class names (with namespace) that have not yet been included.
// We can convert this to a file path and then include the file.
spl_autoload_register(
    function (string $class) {
        // Project Specific Name.
        $prefix = "WIFI\\JWE\\";
        $length = strlen($prefix);

        // Basicdirectory for the Project.
        $basis = __DIR__ . "/";

        // If the class does not use the prefix, abort
        // (We are not responsible for loading data from other projects)
        if (substr($class, 0, $length) != $prefix) {
            return;
        }
        // Class without prefix
        $class_without_prefix = substr($class, $length);

        // Create file path
        $datei = $basis . $class_without_prefix . ".php";
        // die($datei);
        $datei = str_replace("\\", "/", $datei);
        // die($datei);

        // If the Datei exists "file_exists()" include.
        if (file_exists($datei)) {
        include $datei;
        }
    }
);

// For "namespace".
use WIFI\JWE\Tier\Hund\Dogge;
use WIFI\JWE\Tier\Dog;
use WIFI\JWE\Tier\Cat;
use WIFI\JWE\Tier\Mouse;
use WIFI\JWE\Tiere;

$dog = new Dog ("Spike");
// echo $dog->get_name();
// echo "<br>";
// echo $dog->make_noise();
// echo "<br>";
// echo "<br>";

$dogge = new Dogge ("Tyke");
// echo $dogge->get_name();
// echo "<br>";
// echo $dogge->make_noise();
// echo "<br>";
// echo $dogge->bite();
// echo "<br>";
// echo "<br>";

$cat = new Cat ("Tom");
// echo $cat->get_name();
// echo "<br>";
// echo $cat->make_noise();
// echo "<br>";
// echo "<br>";

$mouse = new Mouse ("Jerry");
// echo $mouse->get_name();
// echo "<br>";
// echo $mouse->make_noise();
// echo "<br>";
// echo "<br>";


$tiere = new Tiere();
echo $tiere->add($dog);
echo $tiere->add($dogge);
echo $tiere->add($cat);
echo $tiere->add($mouse);
echo $tiere->add(new Mouse ("Micky"));
echo $tiere->add(new Mouse ("Minnie"));

echo $tiere->output();
echo "<br>";
echo "<br>";
echo "<br>";

foreach ($tiere as $tier) {
    echo "<br>";
    echo $tier->get_name(). " says " . $tier->make_noise();
    if($tier instanceof Dogge) {
        echo " and bites you " . $tier->bite();
    }
    echo "<br>";
}