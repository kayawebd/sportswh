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

$title = "Process Update Product";
$message = "";

$uploadMessages = array();


// process update
if (isset($_POST["submitUpdate"])) {
    // check required fields
    if (isset($_POST["itemName"]) && isset($_POST["price"]) && isset($_POST["description"])) {
        $itemNameCharacterCount = strlen(trim($_POST["itemName"]));
        if ($itemNameCharacterCount < 3) {
            $uploadErrMessages[] = "The product name should be at least 3 characters.";
        } else {
            $itemName = trim($_POST["itemName"]);
        }
        if ($_POST["price"] < 0 || $_POST["salePrice"] < 0) {
            $uploadErrMessages[] = "Price cannot be negative.";
        } else {
            $price = trim($_POST["price"]);
            $salePrice = trim($_POST["salePrice"]);
        }
        if (strlen(trim($_POST["description"])) < 10) {
            $uploadErrMessages[] = "Product description should be at least 10 characters";
        } else {
            $description = trim($_POST["description"]);
        }
        // check photo to be uploaded
        $oldPhoto = basename($_POST["oldPhoto"]);
        $photoToUpload = basename($_FILES["photoToUpload"]["name"]);
        $photoTmpName  = $_FILES["photoToUpload"]["tmp_name"];
        $targetDirectory = "../images/product-images/";
        $archiveDirectory = "../images/archiveImages/";
        $targetFile = $targetDirectory . $photoToUpload;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $imagePlaceholder = "imageUnavailable.webp";

        if (empty(strlen($photoToUpload))) {
            // if no image supplied use the old photo
            $photo = $oldPhoto;
        } else {
            $photoUploadError = false;
            // if new image suppllied
            // check if file is a actual image
            if (!empty($photoTmpName)) {
                if (getimagesize($_FILES["photoToUpload"]["tmp_name"]) === false) {
                    $uploadErrMessages[] = "This file is not a image format";
                    $photoUploadError = true;
                }
            } else {
                $uploadErrMessages[] = "Filename cannot be empty";
            }
            // check image format
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" & $imageFileType != "webp") {
                $uploadErrMessages[] =  "Only jpg, jpeg, png, gif and webp files are allowed.";
                $photoUploadError = true;
            }
            //check the file size php.ini - upload_max_filesize
            if ($_FILES["photoToUpload"]["error"] == 1) {
                $uploadErrMessages[] =  "File is too large. max of 40MB is allowed";
                $photoUploadError = true;
            }
            // check if file exist
            if (file_exists($targetFile) && $photoToUpload !== $imagePlaceholder) {
                $uploadErrMessages[] = "File: " . $photoToUpload . " already exist in: " . $targetDirectory;
                $photoUploadError = true;

                // replace existing file?
            }
            if ($photoUploadError !== True) {
                $photo = $photoToUpload;
            }
        }
    } else {
        $message = "Please enter required field";
    }
} else {
    echo "the form is not submitted";
}

if (empty($uploadErrMessages) === true) {
    // bind value and update
    if (!empty($_POST["itemName"]) && !empty($_POST["price"]) && !empty($_POST["description"]) && !empty($_POST["categoryId"])) {
        // form check box
        if (isset($_POST["featured"])) {
            $featured = 1;
        } else {
            $featured = 0;
        }
        if ($photo !== $oldPhoto) {
            if ($photoToUpload == $imagePlaceholder) {
                $photo = $imagePlaceholder;
            } else {
                if (move_uploaded_file($photoTmpName, $targetFile)) {
                    $photo = $photoToUpload;
                } else {
                    $uploadErrMessages[] = "There was an error uploading your file. Error code:" . $_FILES["photoToUpload"]["error"];
                    $photo = " ";
                }
            }
        } else {
            if ($photoToUpload = $imagePlaceholder) {
                $photo = $imagePlaceholder;
            } else {
                $photo = $oldPhoto;
            }
        }

        $sql = "UPDATE item SET itemName=:itemName, photo=:photo, price=:price, salePrice=:salePrice, description=:description, featured=:featured, categoryId=:categoryId WHERE itemId=:itemId ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":itemId", $_POST["itemId"], PDO::PARAM_INT);
        $stmt->bindValue(":itemName", $itemName, PDO::PARAM_STR);
        $stmt->bindValue(":photo", $photo, PDO::PARAM_STR);
        $stmt->bindValue(":price", $price, PDO::PARAM_INT);
        $stmt->bindValue(":salePrice", $salePrice, PDO::PARAM_INT);
        $stmt->bindValue(":description", $description, PDO::PARAM_STR);
        $stmt->bindValue(":featured", $featured, PDO::PARAM_INT);
        $stmt->bindValue(":categoryId", $_POST["categoryId"], PDO::PARAM_INT);
        $db->executeNonQuery($stmt, false);
        $message = "The product: " . $_POST["itemName"] .  " was updated <br>ID: " . $_POST["itemId"];

        ob_start();
        include "templates/displayProducts.html.php";
        $output = ob_get_clean();
        include "templates/layoutAdmin.html.php";
        exit();
    } else {
        // display $uploadErrMessages[] on the page
    }
}
// Display error message on the same page if update not success
ob_start();
include "templates/displayUpdateProduct.html.php";
$output = ob_get_clean();
include "templates/layoutAdmin.html.php";


// TO DO:  DISPLAY ERROR MESSAGE ON THE displayUpdateProduct.html.php PAGE