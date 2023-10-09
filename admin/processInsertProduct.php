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

$title = "Process Add Product";
$message = "";

$uploadErrMessages = [];
$photoUploadError = false;


if (isset($_POST["submitInsert"])) {

    // check required fields
    if (isset($_POST["itemName"]) && isset($_POST["price"]) && isset($_POST["description"])) {
        $itemNameCharacterCount = strlen(trim($_POST["itemName"]));
        if ($itemNameCharacterCount < 3) {
            $uploadErrMessages[] = "The product name should be at least 3 characters.";
        } else {
            $itemName = trim($_POST["itemName"]);
        }
        if ($_POST["price"] < 0) {
            $uploadErrMessages[] = "Price cannot be negative.";
        } else {
            $price = trim($_POST["price"]);
        }
        if (strlen(trim($_POST["description"])) < 10) {
            $uploadErrMessages[] = "Product description should be at least 10 characters";
        } else {
            $description = trim($_POST["description"]);
        }
        // image upload handling
        $targetDirectory = "../assets/images/product-images/";
        $photoToUpload = basename($_FILES["photoToUpload"]["name"]);
        $targetFile = $targetDirectory . $photoToUpload;
        $imageFileType = pathinfo($targetFile, PATHINFO_EXTENSION);
        // no image supplied
        if (strlen($photoToUpload) == 0) {
            $photo = "imageUnavailable.webp";
        } else {
            // check if file is a actual image
            if (!empty($_FILES["photoToUpload"]["tmp_name"])) {
                if (getimagesize($_FILES["photoToUpload"]["tmp_name"]) === false) {
                    $uploadErrMessages[] = "This file is not a image format";
                    $photoUploadError = true;
                }
            } else {
                $uploadErrMessages[] = "Filename cannot be empty";
                $photoUploadError = true;
            }

            // check image format
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "webp") {
                $uploadErrMessages[] =  "Only jpg, jpeg, png, gif and webp files are allowed.";
                $photoUploadError = true;
            }
            //Change the upload file size limit in: php.ini - upload_max_filesize
            if ($_FILES["photoToUpload"]["error"] == 1) {
                $uploadErrMessages[] =  "File is too large. max of 40MB is allowed";
                $photoUploadError = true;
            }
            // check if file exist
            if (file_exists($targetFile)) {
                $uploadErrMessages[] = "File: " . $photoToUpload . " already exist in: " . $targetDirectory;
                $photoUploadError = true;
            }
            // upload photo if no error
            if ($photoUploadError !== true) {
                if (move_uploaded_file($_FILES["photoToUpload"]["tmp_name"], $targetFile)) {
                    $photo = trim($photoToUpload);
                } else {
                    $uploadErrMessages[] = "There was an error uploading your file. Error code:" . $_FILES["photoToUpload"]["error"];
                    $photo = "imageUnavailable.webp";
                }
            }
        }
        // check if "featured" checkbox is set
        $featured = isset($_POST["featured"]) ? 1 : 0;
        if (empty($uploadErrMessages)) {
            // insert data
            $sql = "INSERT INTO item(itemName, photo, price, salePrice, description, featured, categoryId) VALUES(:itemName, :photo, :price, :salePrice, :description, :featured, :categoryId)";

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":itemName", $_POST["itemName"], PDO::PARAM_STR);
            $stmt->bindValue(":photo", $photo, PDO::PARAM_STR);
            $stmt->bindValue(":price", $_POST["price"], PDO::PARAM_INT);
            $stmt->bindValue(":salePrice", $_POST["salePrice"], PDO::PARAM_INT);
            $stmt->bindValue(":description", $_POST["description"], PDO::PARAM_STR);
            $stmt->bindValue(":featured", $featured, PDO::PARAM_INT);
            $stmt->bindValue(":categoryId", $_POST["categoryId"], PDO::PARAM_INT);
            $id = $db->executeNonQuery($stmt, true);
            $message = "Item: " . $_POST["itemName"] . " was added<br>Item ID: " . $id;
        } else {
            // display $uploadErrMessages[] on the page
            ob_start();
            include "templates/displayInsertProduct.html.php";
            $output = ob_get_clean();
            include "templates/layoutAdmin.html.php";
            exit();
        }
    } else {
        $message = "Please enter required field";
    }
} else {
    echo "The form is not submitted";
}

ob_start();
include "templates/displayProducts.html.php";
$output = ob_get_clean();
include "templates/layoutAdmin.html.php";
