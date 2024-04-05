<?php
// !include!
include "Person.php";

// Create object from class "Person"
// Instantiate / Create Instance
$me = new Person("Alin");
echo $me->introduce();
echo "<br>";

$me->set_firstname("Markus");
// $me->set_firstname("Alin");
echo $me->get_firstname();
echo "<br>";

// Create another object from class "Person"
$her = new Person("Yana");
echo $her->introduce();
echo "<br>";

echo $her->get_firstname();
echo "<br>";