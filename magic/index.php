<?php
error_reporting(E_ALL);

include "Magic.php";

$m = new Magic(); // it gets set as Object.

// Magic method: __set();
$m->firstname = "Yana";
$m->lastname = "Nedelcu";

//Magic method: __get();
echo $m->lastname;
echo "<br>";

//Magic method: __call(); (blahblah can be named to anything u wish.)
$m->blahblah("Username", "E-Mail", 4);
echo "<br>";

//Magic method: __toString();
echo $m;
echo "<br>";

// echo "<pre>";
// print_r($m);
// echo "</pre>";