<?php

// Config for Project 
const MYSQL_HOST = "localhost";
const MYSQL_USER = "root";
const MYSQL_PASSWORD = "";
const MYSQL_DATABANK = "php3";



// Setup-Code: Only when u know what your doin.
session_start();

function is_loggedin(){
    if (empty($_SESSION["eingeloggt"])){
        header("Location: login.php");
        exit; // User is not logged in and it sends u to login page.
    }
}

spl_autoload_register(
    function (string $class) {
        // Project Specific Name.
        $prefix = "WIFI\\PHP3\\";
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