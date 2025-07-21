<?php
require_once "classes/Product.php";
require_once "classes/ShoppingCart.php";
if (!isset($_SESSION["username"])) {
    session_start();
}

// $showSearchCategory = false; 
$title = "About Sports Warehouse";

ob_start();
include "templates/about.html.php";
$output = ob_get_clean();
include "templates/layout.html.php";
