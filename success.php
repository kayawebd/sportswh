<?php
require_once "classes/Authentication.php";
session_start();

$title = "Success";
$loginName = $_SESSION["username"];
$showSearchCategory = false;

ob_start();
include "templates/success.html.php";
$output = ob_get_clean();
include "templates/layout.html.php";
