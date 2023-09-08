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

$title = "Categories";
$message = "";

ob_start();
include "templates/displayCategories.html.php";
$output = ob_get_clean();
include "templates/layoutAdmin.html.php";
