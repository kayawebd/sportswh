<?php
require_once "../classes/Authentication.php";
if (!isset($_SESSION)) {
    session_start();
}
Authentication::protectAdmin();

if (!empty($_GET["id"])) {
    require_once "../classes/DBAccess.php";
    include "../settings/db.php";
    $db = new DBAccess($dsn, $username, $password);
    $pdo = $db->connect();

    // Get the photo to be moved
    $sql = "SELECT photo FROM item WHERE itemId = :itemId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":itemId", $_GET["id"]);
    $photoToMove = $db->executeSQLReturnOneValue($stmt);
    $imagePlaceholder = "imageUnavailable.webp";

    if (!empty($photoToMove) && $photoToMove != $imagePlaceholder) {
        $targetDirectory = "../assets/images/product-images/";
        $sourceFile = $targetDirectory . $photoToMove;
        $destinationDirectory = "../assets/images/imageBin/";

        // Generate a new unique filename in case there's a file with the same name in the destination directory
        $path_parts = pathinfo($photoToMove);
        $extension = $path_parts['extension'];
        $newFilename = uniqid() . '.' . $extension;
        $destinationFile = $destinationDirectory . $newFilename;

        // Move the file to the destination directory
        if (rename($sourceFile, $destinationFile)) {
            // Update the database with the new photo name
            $sql = "UPDATE item SET photo = :newPhoto WHERE itemId = :itemId";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":newPhoto", $newFilename, PDO::PARAM_STR);
            $stmt->bindValue(":itemId", $_GET["id"], PDO::PARAM_INT);
            $db->executeNonQuery($stmt, false);
            $message = "The photo has been moved to the image bin successfully.";
        } else {
            $message = "Error moving the photo to the image bin.";
        }
    } else {
        $message = "The photo does not exist or cannot be moved.";
    }
} else {
    $message = "No item ID specified.";
}

// Redirect back to the displayUpdateProduct.php page
header("Location: displayUpdateProduct.php?id=" . $_GET["id"]);
exit();
