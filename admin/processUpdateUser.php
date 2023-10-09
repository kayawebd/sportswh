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

$title = "Process Update User";
$message = "";

$uploadMessages = array();
$uploadError = false;

// process update
if (isset($_POST["submitUpdate"])) {
    // TODO: check input value eg. min length of username, password requirement
    if (!empty($_POST["userName"]) && !empty($_POST["phone"]) && !empty($_POST["email"]) && !empty($_POST["address"])) {
        $sql = "UPDATE user SET userName=:userName, phone=:phone, address=:address, email=:email WHERE userId=:userId ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":userId", $_POST["userId"], PDO::PARAM_INT);
        $stmt->bindValue(":userName", $_POST["userName"], PDO::PARAM_STR);
        $stmt->bindValue(":phone", $_POST["phone"], PDO::PARAM_STR);
        $stmt->bindValue(":email", $_POST["email"], PDO::PARAM_STR);
        $stmt->bindValue(":address", $_POST["address"], PDO::PARAM_STR);
        $db->executeNonQuery($stmt, false);
        $message = "The user: " . $_POST["userName"] .  " was updated <br>ID: " . $_POST["userId"];
    } else {
        // display $uploadErrMessages[] on the page
    }
}

ob_start();
include "templates/displayUsers.html.php";
$output = ob_get_clean();
include "templates/layoutAdmin.html.php";
