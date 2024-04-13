<?php
include "setup.php";
is_loggedin();
include "head.php";
use WIFI\PHP3\DataBanking\Model\Cars;

?>

<main>
    <h1>Cars List</h1>
<?php
    echo "<p><a href='changecars.php'>Add new car</a></p>";
?>
<table border='3'>
    <thead>
        <tr>
            <th>Licenceplate</th>
            <th>Brand</th>
            <th>Color</th>
            <th>Year</th>
            <th>Change</th>
            <th>Delete</th>
        </tr>
    </thead>
<a href="changecars.php?id={$car-id}"></a>
    <tbody>
    <?php
    $cars = new Cars();
    $all_cars = $cars->all_cars(); // Get all cards from Data-Banking
    // echo "<pre>";
    // print_r($all_cars);
    foreach ($all_cars as $car) {
        echo "<tr>";
            echo "<td>" . $car->licenceplate . "</td>";
            echo "<td>" . $car->get_brand()->brand . "</td>";
            echo "<td>" . $car->color . "</td>";
            echo "<td>" . $car->year . "</td>";
            echo "<td>" . "<a href='changecars.php?id={$car->id}'>Change</a>" . "</td>";
            echo "<td>" . "<a href='deletecars.php?id={$car->id}'>Delete</a>" . "</td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>
</main>

<?php
include "footer.php";
?>