<?php
require_once "classes/Product.php";
require_once "classes/ShoppingCart.php";
if (!isset($_SESSION["username"])) {
    session_start();
}

$title = "Thank You!";

ob_start();
include "templates/contactThankYouPage.html.php";
$output = ob_get_clean();
include "templates/layout.html.php";
