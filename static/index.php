<?php

include "Statik.php";

$new = new Statik();
$new2 = new Statik();
$new3 = new Statik();
$new4 = new Statik();

// for static variable u need the $ and u can use the :: method. ()
echo Statik::$id;
echo "<br>";

// static function
Statik::set_id_to_0();
echo Statik::$id;
echo "<br>";


