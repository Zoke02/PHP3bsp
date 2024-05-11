<?php
include "setup.php";
is_loggedin();
include "head.php";
use WIFI\PHP3\DataBanking\Model\Row\Car;


echo "<h1>Remove Car</h1>";

$car = new Car($_GET["id"]);

// $sql_id = escape($_GET["id"]);

if (!empty($_GET["doit"])) {
    $car->delete();
    echo "<p>Car was DELETED</p>";
    echo "<a href='carslist.php'><ul>
    <li style='font-size:1rem'>Back to List of Ingredients</li>
    </ul></a>";

} else {
    // Benutzer Fragen, ob die Auto wirklich entfern werder soll
    echo "<p>Are you sure u want to REMOVE the car?</p>";
    echo "Licenceplate: " . $car->licenceplate . "<br>";
    echo "Brand: " . $car->get_brand()->brand . "<br>";
    echo "Color: " . $car->color . "<br>";
    echo "Year: " . $car->year . "<br>";
    echo "<p>"
    . "<a href='carslist.php'>No</a>"
    . " "
    . "<a href='deletecars.php?id={$car->id}&amp;doit=1'>Yes</a>"
    . "</p>";
};


include "footer.php";
?>
<a href=""></a>