<?php
require_once "classes/Product.php";
require_once "classes/ShoppingCart.php";
require_once "classes/Authentication.php";
if (!isset($_SESSION["username"])) {
    session_start();
}

$title = "Login";
$message = "";

if (isset($_POST["loginSubmit"])) {
    if (!empty($_POST["username"]) && !empty($_POST["password"])) {
        $loginSuccess = Authentication::login($_POST["username"], $_POST["password"]);
        if (!$loginSuccess) {
            $message = "Username or password incorrect";
            $error = true;
        } else {
            echo "login Failed";
        }
    } else {
        echo "username or password is empty";
    }
}

ob_start();
include "templates/login.html.php";
$output = ob_get_clean();
$showSearchCategory = false;
include "templates/layoutLogin.html.php";
