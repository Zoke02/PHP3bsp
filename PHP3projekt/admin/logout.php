<?php 
session_start();
// Chance in array if logged in or not
unset($_SESSION["eingeloggt"]);

// Unset the session 
session_unset();

// I think this also clears cookies (Vernichtet die Session samt Cookies)
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged out from Administration Area</title>
</head>
<body style="font-family:system-ui;background:lightseagreen;color:white">
    <h1>Logged out from Administration Area</h1>
    <P>You are logged out</P>
    <p><a href="login.php">Click here to return to Login screen.</a></p>
    
</body>
</html>