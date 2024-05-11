<?php
use WIFI\PHP3\DataBanking\Mysql;
use WIFI\PHP3\DataBanking\Validate;
use WIFI\PHP3\DataBanking\Model\Brands;
use WIFI\PHP3\DataBanking\Model\Row\Car;
include "setup.php";
is_loggedin();
include "head.php";

$success = false;

// Check if the form is beeing send.
if (!empty($_POST)) {
    $validate = new Validate();
    if ($validate->is_formular_filled($_POST["licenceplate"], "Licenceplate")) {
        $validate->is_licenceplate($_POST["licenceplate"], "Licenceplate");
    }
    $validate->is_formular_filled($_POST["brand_id"], "Brand");
    $validate->is_formular_filled($_POST["color"], "Color");
    if($validate->is_formular_filled($_POST["year"], "Year")) {
        $validate->is_year($_POST["year"], "Year");
    }

    if(!$validate->is_errors()) 
    {
        $car = new Car(array(
            "id" => $_GET["id"] ?? null,
            "licenceplate" => $_POST["licenceplate"],
            "brand_id" => $_POST["brand_id"],
            "color" => $_POST["color"],
            "year" => $_POST["year"]
        ));
        $car->save();
        $success = true;
    }

}

?>
<main>
    <h1><?php 
    if (!empty($_GET["id"])) echo "Change Car";
    if (empty($_GET["id"])) echo "Add Car";
    ?></h1>
    <?php 
    if ($success) {
        echo '<p>';
        if (!empty($_GET["id"])) echo "Car Data was changed.";
        if (empty($_GET["id"])) echo "Car Data was added.";
        echo '</p> <br> <a href="carslist.php">Back to Cars List</a> <br><br>';
    } else {

    if (!empty($validate)) 
    {
        echo $validate->error_html();
    }

    if (!empty($_GET["id"]))
    {
        // You are in change data mode.
        $car = new Car($_GET["id"]);
    }

    ?>
    <form action="changecars.php<?php 
        if (!empty($car))
        {
            // You are in Change mode
            echo "?id=" . $car->id;
        } ?>" method="post">
        <div>
            <label for="licenceplate">Licenceplate</label>
            <input type="text" name="licenceplate" id="licenceplate" placeholder="SL-123AB" value="<?php 
            if (!empty($_POST["licenceplate"])) 
            {
                echo htmlspecialchars($_POST["licenceplate"]);
            } else if (!empty($car)) {
                echo htmlspecialchars($car->licenceplate);
            }
            ?>" >
        </div>
        <div>
            <label for="brand_id">Brand:</label>
            <select name="brand_id" id="brand_id">
                <option value=""> - Please Chose -</option>
                <?php
                $brands = new Brands();
                $all_brands = $brands->all_brands();
                foreach ($all_brands as $brand) {
                    echo "<option value='{$brand->id}' ";
                    if (!empty($_POST["brand_id"]) && $_POST["brand_id"] == $brand->id )
                    {
                        echo " selected";
                    } else if (!empty($car) && $car->brand_id == $brand->id ) {
                        echo " selected";
                    }
                    
                    echo ">{$brand->brand}</option>";
                }
                ?>
            </select>
        </div>
        <div>
            <label for="color">Color</label>
            <input type="text" name="color" id="color" value="<?php
            if (!empty($_POST["color"])) 
            {
                echo htmlspecialchars($_POST["color"]);
            } else if (!empty($car)) {
                echo htmlspecialchars($car->color);
            }
            ?>">
        </div>
        <div>
            <label for="year">Year</label>
            <input type="text" name="year" id="year" value="<?php 
                if (!empty($_POST["year"])) 
                {
                    echo htmlspecialchars($_POST["year"]);
                } else if (!empty($car)) {
                    echo htmlspecialchars($car->year);
                }
            ?>">
        </div>
        <div><button type="submit">Save Changes</button></div>
    </form>
</main>

<?php
}
include "footer.php";
?>