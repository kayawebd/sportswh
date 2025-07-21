<?php
require_once "../classes/Authentication.php";
if (!isset($_SESSION)) {
    session_start();
}
// 

require_once "../classes/DBAccess.php";
include "../settings/db.php";
$db = new DBAccess($dsn, $username, $password);
$pdo = $db->connect();

$title = "Process Delete Photo";
$message = "";

if (!empty($_GET["id"])) {
    // get photo
    $sql = "SELECT photo FROM item WHERE itemId = :itemId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":itemId", $_GET["id"]);
    $photoToDelete = $db->executeSQLReturnOneValue($stmt);
    $imagePlaceholder = "imageUnavailable.webp";

    // confirmation prompt
    if (!empty($photoToDelete) && $photoToDelete != $imagePlaceholder) {
        echo '<script>
        if (confirm("Are you sure you want to delete the photo?")) {
            window.location.href = "processMoveToImageBin.php?id=' . $_GET["id"] . '";
        } else {
            window.location.href = "displayUpdateProduct.php?id=' . $_GET["id"] . '";
        }
        </script>';
        exit();
    }

    // set DBAccess if code is 23000 $value = -1
    $sql = "DELETE FROM item WHERE itemId=:itemId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":itemId", $_GET["id"], PDO::PARAM_INT);
    $affectedRows = $db->executeNonQuery($stmt, false);

    if ($affectedRows === -1) {
        $message = "The item cannot be deleted";
    } else {
        $message = "The product id:" . $_GET["id"] . " was deleted";
    }
}

ob_start();
include "templates/displayProducts.html.php";
$output = ob_get_clean();
include "templates/layoutAdmin.html.php";
