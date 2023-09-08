<?php
require_once "classes/Product.php";
require_once "classes/ShoppingCart.php";
if (!isset($_SESSION["username"])) {
    session_start();
}

$title = "Contact US";

ob_start();
include "templates/contact.html.php";
$output = ob_get_clean();
include "templates/layout.html.php";
