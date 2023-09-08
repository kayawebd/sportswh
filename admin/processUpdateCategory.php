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

$title = "Process Update Category";
$message = "";

if (isset($_POST["submitUpdate"])) {
    $categoryName = trim($_POST["categoryName"]);
    $categoryNameCharacterCount = strlen($categoryName);
    if ($categoryNameCharacterCount > 2 && !empty($_POST["categoryId"])) {
        $sql = "UPDATE category SET categoryName=:categoryName WHERE categoryId=:categoryId ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":categoryName", $_POST["categoryName"], PDO::PARAM_STR);
        $stmt->bindValue(":categoryId", $_POST["categoryId"], PDO::PARAM_INT);
        $db->executeNonQuery($stmt, false);
        $message = "The category was updated ID:" . $_POST["categoryId"];
        ob_start();
        include "templates/displayCategories.html.php";
        $output = ob_get_clean();
        include "templates/layoutAdmin.html.php";
    } else {
        $message =  "The category name should be at least 3 charactors";
        ob_start();
        include "templates/displayUpdateCategory.html.php";
        $output = ob_get_clean();
        include "templates/layoutAdmin.html.php";
    }
}
