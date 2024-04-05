<?php

include "Circle.php";

$k = new Circle (3);
echo "Area is " . $k->area_of_circle();
echo "<br>";
echo "Diameter is " . $k->diameter_of_circle();
echo "<br>";
echo "Circumference is " . $k->circumference_of_circle();
echo "<br>";
$k->set_radius(6);
echo "New diameter is " . $k->diameter_of_circle();
echo "<br>";

$user_input = 2;
// With this u can try the code and in catch u can get a answer of your choise.
try {
    $k->set_radius($user_input);
    echo "User input Diameter is " . $k->diameter_of_circle();
    echo "<br>";
} catch (Exception $excep) {
    // Catches all Exception objects thrown in the try block: throw new Exception("...").
    echo "Something went wrong: " . $excep->getMessage();
    echo "<br>";
} finally {
    // This code will be executed in every case.
    echo "That was probably it. <br>";
}
// __destrukt() (Check it out in Circle.php)
unset($k);

echo "Last row of code<br>";