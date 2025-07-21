<?php
require_once "classes/Product.php";
require_once "classes/ShoppingCart.php";
if (!isset($_SESSION["username"])) {
    session_start();
}

$title = "Privacy policy";
$showSearchCategory = false;

ob_start();
include "templates/privacy.html.php";
$output = ob_get_clean();
include "templates/layout.html.php";
