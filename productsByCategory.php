<?php
require_once "classes/Product.php";
require_once "classes/ShoppingCart.php";
if (!isset($_SESSION["username"])) {
    session_start();
}

require_once("./classes/DBAccess.php");
include "./settings/db.php";
$db = new DBAccess($dsn, $username, $password);
$pdo = $db->connect();

$title = "Products by category";

ob_start();
include "./templates/productsByCategory.html.php";
$output = ob_get_clean();
include "./templates/layout.html.php";
