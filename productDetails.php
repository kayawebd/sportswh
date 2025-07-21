<?php
require_once "classes/Product.php";
require_once "classes/ShoppingCart.php";
if (!isset($_SESSION["username"])) {
    session_start();
}

$showSearchCategory = true;
$title = "Product details";

ob_start();
include "./templates/productDetails.html.php";
$output = ob_get_clean();
include "./templates/layout.html.php";
