<?php
include "setup.php";
use WIFI\PHP3\DataBanking\Validate;
use WIFI\PHP3\DataBanking\Mysql;

// print_r($_POST);

if (!empty($_POST)) 
{
    // Validate Class
    $validate = new Validate();
    $validate->is_formular_filled($_POST["benutzername"], "Username");
    $validate->is_formular_filled($_POST["passwort"], "Password");

    if (!$validate->is_errors()) {
        $db = Mysql::getInstanz();
        $sql_username = $db->escape($_POST["benutzername"]);
        $result = $db->query("SELECT * FROM user WHERE username = '{$sql_username}'");
        $username = $result->fetch_assoc();
        // echo "<pre>";
        // print_r($username);
        // echo "</pre>";
        if (empty($username) || !password_verify($_POST["passwort"], $username["password"])) 
        {
            // Error: username does not exist.
            $validate->error_entry("Username or Password is FALSE.");
        } else {
            // Everything was ok with login. Login in Session merken.
            $_SESSION["eingeloggt"] = true;
            // Username comes from DataBank ["username"]
            $_SESSION["benutzername"] = $username["username"];
            $_SESSION["benutzer_id"] = $username["id"];

            // Redirect to Admin-Area
            header("Location: index.php");
            exit;
        }
    }
}
?>


<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

</head>
<body style="font-family:system-ui;background:lightseagreen;color:white">
    <h1 style="text-align:center">Login DataBanking</h1>

    <?php
    if (!empty($validate)) {
        // If u return a empty string is baiscly like nothing happened.
        echo $validate->error_html();
    }
     ?>
    <form action="login.php" method="post">
        <div>
            <label for="benutzername">Username</label>
            <input type="text" name="benutzername" id="benutzername">
        </div>
        <div>
            <label for="passwort">Password</label>
            <input type="password" name="passwort" id="passwort">
        </div>
        <button type="submit">Login</button>
    </form>
</body>
</html>

<?php
include "footer.php";
?>