<?php
require_once "classes/Product.php";
require_once "classes/ShoppingCart.php";
if (!isset($_SESSION["username"])) {
    session_start();
}

$title  = "Products";

ob_start();
include "./templates/products.html.php";
$output = ob_get_clean();
include "./templates/layout.html.php";
