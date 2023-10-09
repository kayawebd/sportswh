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

$title = "Process Delete Product";
$message = "";

if (!empty($_GET["id"])) {
    // get photo
    $sql = "SELECT photo FROM item WHERE itemId = :itemId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":itemId", $_GET["id"]);
    $photoToDelete = $db->executeSQLReturnOneValue($stmt);
    $imagePlaceholder = "imageUnavailable.webp";
    $imageBinDirectory = "../assets/images/imageBin/";
    $targetDirectory = "../assets/images/product-images/";
    // delete old photo
    if (!empty($photoToDelete)) {
        //delete the file using unlink  
        if ($photoToDelete != $imagePlaceholder && !empty($photoToDelete)) {
            if (!is_dir($imageBinDirectory)) {
                mkdir($imageBinDirectory);
            }
            // Move the file to the imageBin directory
            if (!rename($targetDirectory . $photoToDelete, $imageBinDirectory . $photoToDelete)) {
                $photoToDelete = "";
            }
        } else {
            $photoToDelete = "";
        }
        $sql = "DELETE FROM item WHERE itemId=:itemId";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":itemId", $_GET["id"], PDO::PARAM_INT);
        $db->executeNonQuery($stmt, false);
    }
    // set DBAccess if code is 23000 $value = -1
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
