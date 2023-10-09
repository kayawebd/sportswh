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

$title = "Process Delete User";
$message = "";

if (!empty($_GET["id"])) {

    $sql = "SELECT * FROM user WHERE userId = :userId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":userId", $_GET["id"]);

    $sql = "DELETE FROM user WHERE userId=:userId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":userId", $_GET["id"], PDO::PARAM_INT);
    $db->executeNonQuery($stmt, false);
}
// set DBAccess if code is 23000 $value = -1
$affectedRows = $db->executeNonQuery($stmt, false);
if ($affectedRows === -1) {
    $message = "The userId:" . $_GET["id"] . " cannot be deleted. ";
} else {
    $message = "The userId:" . $_GET["id"] . " was deleted";
}

ob_start();
include "templates/displayUsers.html.php";
$output = ob_get_clean();
include "templates/layoutAdmin.html.php";
