<!DOCTYPE html>
<html>
    <head>
        <title>PHP 3 Praxisprüfung</title>
        <meta charset='utf-8' />
    </head>
    <body>
        <h2>Container testen</h2>

        <?php

        // Done
        spl_autoload_register(
          function (string $class) {
              // Project Specific Name.
              $prefix = "WIFI\\Prufung\\";
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

        use WIFI\Prufung\Test\Container\ContainerBig;
        use WIFI\Prufung\Test\Container\ContainerSmall;
        use WIFI\Prufung\Test\Container\ContainerAbstract;
        use WIFI\Prufung\Test\CargoShip;
        use WIFI\Prufung\Test\InterfaceCargo;

        // Done

        // $warengewicht = new ContainerSmall(20);
        // $warengewicht2 = new ContainerSmall(30);
        
        // Irgendeinen Container mit $warengewicht erstellen
        // und Ist-Gewicht, sowie maximales Gesamtgewicht ausgeben
        
        
        // Testing
        // print_r($warengewicht);
        // echo $warengewicht->ist_gewicht();
        // echo "<br>";
        // echo $warengewicht->max_gewicht();
        // $snip_name = new CargoShip(100);
        // echo "<br>";
        // echo $snip_name->reisezeit(100);
        // echo "<br>";
        // echo $snip_name->add_container($warengewicht);
        // echo $snip_name->add_container($warengewicht2);
        // echo "<br>";
        // echo $snip_name->how_many_containers();
        // echo "<br>";
        // echo $snip_name->weight_of_all_containers();
        // echo "<br>";

        ?>


        <h2>Frachtschiff testen</h2>
        <?php
        if (!empty($_POST)) {
            // - Frachtschiff erstellen
            // - Gegebene Anzahl an Container hinzufügen (for-Schleife)
            // - Reisezeit, Anzahl Container, geladenes Gewicht ausgeben
            $ship = new CargoShip($_POST["geschwindigkeit"]);
            $time = $ship->reisezeit($_POST["strecke"]);
            for ($i = 1; $i <= $_POST["anzahl_container"]; $i++) {
                // Container dem Schiff hinzufügen
                if ($_POST["anzahl_container"] <= 21.67) 
                {
                $container = new ContainerSmall($_POST["gewicht_container"]);
                } elseif ($_POST["anzahl_container"] > 21.67) 
                {
                $container = new ContainerBig($_POST["gewicht_container"]);
                }
                $ship->add_container($container);
            }
            echo "<br>";
            echo "Reisezeit is " . $time . " Hour";
            echo "<br>";
            echo "Number of Containers: " .  $ship->how_many_containers();
            echo "<br>";
            echo "Total weight is " . "{$ship->weight_of_all_containers()}" . " tones.";
            echo "<br>";
            echo "<br>";

        }
        ?>
        <form action='index.php' method='post'>
            <div>
                <label for='geschwindigkeit'>Geschwindigkeit in km/h:</label>
                <input type='number' name='geschwindigkeit' id='geschwindigkeit' min='0.0' max='100.0' step='0.1' value='<?php
                  if (!empty($_POST["geschwindigkeit"])) {
                    echo $_POST["geschwindigkeit"];
                  } else {
                    echo 23;
                  } ?>' />
            </div>
            <div>
                <label for='strecke'>Strecke in km:</label>
                <input type='number' name='strecke' id='strecke' min='0' max='40000' step='1' value='<?php
                  if (!empty($_POST["strecke"])) {
                    echo $_POST["strecke"];
                  } else {
                    echo 4669;
                  } ?>' />
            </div>
            <div>
                <label for='anzahl_container'>Anzahl Container:</label>
                <input type='number' name='anzahl_container' id='anzahl_container' min='0' max='10000' step='1' value='<?php
                  if (!empty($_POST["anzahl_container"])) {
                    echo $_POST["anzahl_container"];
                  } else {
                    echo 8400;
                  } ?>' />
            </div>
            <div>
                <label for='gewicht_container'>Warengewicht je Container:</label>
                <input type='number' name='gewicht_container' id='gewicht_container' min='0.0' max='100.0' step='0.01' value='<?php
                  if (!empty($_POST["gewicht_container"])) {
                    echo $_POST["gewicht_container"];
                  } else {
                    echo 8.64;
                  } ?>' />
            </div>
            <div>
                <button type='submit'>Berechnen</button>
            </div>
        </form>
    </body>
</html>
