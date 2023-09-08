<?php
require_once "classes/Product.php";
require_once "classes/ShoppingCart.php";
if (!isset($_SESSION["username"])) {
    session_start();
}

$showSearchCategory = false;
$title = "Checkout";

ob_start();
include "templates/checkout.html.php";
$output = ob_get_clean();
include "templates/layout.html.php";
