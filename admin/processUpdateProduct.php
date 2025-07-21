<?php
require_once "../classes/Authentication.php";
require_once "../classes/DBAccess.php";
require_once "../settings/db.php";

session_start();
Authentication::protectAdmin();

$db = new DBAccess($dsn, $username, $password);
$pdo = $db->connect();

$title = "Process Update Product";
$message = "";
$uploadErrMessages = [];

if (isset($_POST["submitUpdateProduct"])) {
    // Validate required fields
    $itemName = $_POST["itemName"] ?? "";
    $price = $_POST["price"] ?? "";
    $salePrice = $_POST["salePrice"] ?? "";
    $description = $_POST["description"] ?? "";
    $categoryId = $_POST["categoryId"] ?? "";

    if (strlen($itemName) < 3) {
        $uploadErrMessages[] = "The product name should be at least 3 characters.";
    }

    if ($price < 0 || $salePrice < 0) {
        $uploadErrMessages[] = "Price cannot be negative.";
    }

    if (strlen($description) < 10) {
        $uploadErrMessages[] = "Product description should be at least 10 characters.";
    }

    // Check photo to be uploaded
    $oldPhoto = basename($_POST["oldPhoto"]);
    $photoToUpload = basename($_FILES["photoToUpload"]["name"]);
    $photoTmpName = $_FILES["photoToUpload"]["tmp_name"];
    $targetDirectory = "../assets/images/product-images/";
    $archiveDirectory = "../assets/images/archiveImages/";
    $targetFile = $targetDirectory . $photoToUpload;
    $imagePlaceholder = "imageUnavailable.webp";
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowedImageExtensions = ["jpg", "jpeg", "png", "gif", "webp"];

    $photoUploadError = false;

    if (!empty($photoToUpload) && !in_array($imageFileType, $allowedImageExtensions)) {
        $uploadErrMessages[] = "Only jpg, jpeg, png, gif, and webp files are allowed.";
        $photoUploadError = true;
    }

    if ($_FILES["photoToUpload"]["error"] == 1) {
        $uploadErrMessages[] = "File is too large. Maximum of 40MB is allowed.";
        $photoUploadError = true;
    }
    // Add timestamp at the end of the file to be uploaded if file already exist
    if (file_exists($targetFile) && $photoToUpload != $imagePlaceholder) {
        $timestamp = time();
        $formattedDateTime = date('Y-m-d_H-i-s', $timestamp);
        $filenameWithoutExtension = pathinfo($photoToUpload, PATHINFO_FILENAME);
        $fileExtension = pathinfo($photoToUpload, PATHINFO_EXTENSION);
        $newFileName = $filenameWithoutExtension . "_" . $formattedDateTime . "." . $fileExtension;
        $targetFile = $targetDirectory . $newFileName;
        $photoToUpload = $newFileName;
    }

    if (file_exists($targetFile) && $photoToUpload == $imagePlaceholder) {
        $targetFile = $targetDirectory . $imagePlaceholder;
        $photoToUpload = $imagePlaceholder;
    }
} else {
    echo "There is an error submitting the your form.";
}

if (empty($uploadErrMessages)) {
    // Bind values and update
    if (!empty($itemName) && !empty($price) && !empty($description) && !empty($categoryId)) {
        $featured = isset($_POST["featured"]) ? 1 : 0;

        if ($photoToUpload == $imagePlaceholder) {
            $photo = $imagePlaceholder;
        } else {
            if (move_uploaded_file($photoTmpName, $targetFile)) {
                $photo = $photoToUpload;
            } else {
                $uploadErrMessages[] = "There was an error uploading your file. Error code: " . $_FILES["photoToUpload"]["error"];
                $photo = " ";
            }
        }


        $sql = "UPDATE item SET itemName=:itemName, photo=:photo, price=:price, salePrice=:salePrice, description=:description, featured=:featured, productCode=:productCode, categoryId=:categoryId WHERE itemId=:itemId";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":itemId", $_POST["itemId"], PDO::PARAM_INT);
        $stmt->bindValue(":itemName", $itemName, PDO::PARAM_STR);
        if (!empty($photoToUpload)) {
            $stmt->bindValue(":photo", $photo, PDO::PARAM_STR);
        }
        $stmt->bindValue(":price", $price, PDO::PARAM_INT);
        $stmt->bindValue(":salePrice", $salePrice, PDO::PARAM_INT);
        $stmt->bindValue(":description", $description, PDO::PARAM_STR);
        $stmt->bindValue(":featured", $featured, PDO::PARAM_INT);
        $stmt->bindValue(":categoryId", $categoryId, PDO::PARAM_INT);
        $stmt->bindValue(":productCode", $_POST["productCode"], PDO::PARAM_INT);
        $db->executeNonQuery($stmt, false);
        $message = "The product: " . $_POST["itemName"] .  " was updated <br>ID: " . $_POST["itemId"];

        ob_start();
        include "templates/displayProducts.html.php";
        $output = ob_get_clean();
        include "templates/layoutAdmin.html.php";
        exit();
    } else {
        $uploadErrMessages[] = "Please enter required field.";
    }
}

// Display error message on the same page if update not successful
ob_start();
include "templates/displayUpdateProduct.html.php";
$output = ob_get_clean();
include "templates/layoutAdmin.html.php";
