<?php
require_once "../classes/Authentication.php";
if (!isset($_SESSION)) {
    session_start();
}
Authentication::protectAdmin();

require_once "../classes/DBAccess.php";
include "../settings/db.php";
$db = new DBAccess($dsn, $username, $password);
$pdo = $db->connect();

$title = "Process Add Category";
$message = "";

if (isset($_POST["submitInsert"])) {
    $categoryName = trim($_POST["categoryName"]);
    $categoryNameCharacterCount = strlen($categoryName);
    if ($categoryNameCharacterCount > 2) {
        $sql = "insert into category(categoryName) values(:categoryName)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":categoryName", $_POST["categoryName"], PDO::PARAM_STR);
        $id = $db->executeNonQuery($stmt, true);
        $message = "The category was added, id: " . $id;
        ob_start();
    } else {
        $message = "The category name should be at least 3 charactors";
        ob_start();
        include "templates/displayInsertCategory.html.php";
        $output = ob_get_clean();
        include "templates/layoutAdmin.html.php";
    }
}

ob_start();
include "templates/displayCategories.html.php";
$output = ob_get_clean();
include "templates/layoutAdmin.html.php";
