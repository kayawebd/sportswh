<?php
require_once "classes/Product.php";
require_once "classes/ShoppingCart.php";
if (!isset($_SESSION["username"])) {
    session_start();
}
$title = "Search Products";
$showSearchCategory = true;

require_once "./classes/DBAccess.php";
include "./settings/db.php";
$db = new DBAccess($dsn, $username, $password);
$pdo = $db->connect();

// check if the search button has been pressed
if (isset($_GET["searchButton"]) && isset($_GET["search"])) {
    $search = $_GET["search"];
    $sql = "SELECT itemId, itemName, photo, price, salePrice, description FROM item WHERE itemName LIKE :itemName";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":itemName", "%$search%");
    $searchResultRows = $db->executeSQL($stmt);
}

ob_start();
include "./templates/searchProducts.html.php";
$output = ob_get_clean();
include "./templates/layout.html.php";
