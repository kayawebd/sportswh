<?php
require_once "../../classes/Authentication.php";
if (!isset($_SESSION)) {
	session_start();
}
Authentication::protectUser();

require_once "../../classes/DBAccess.php";
include "../../settings/db.php";
$db = new DBAccess($dsn, $username, $password);
$pdo = $db->connect();

$title = "Users";
$message = "";

ob_start();
include "./templates/displayUserProfile.html.php";
$output = ob_get_clean();
include "./templates/layoutUser.html.php";
