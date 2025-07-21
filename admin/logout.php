<?php
require_once "../classes/Authentication.php";
session_start();
unset($_SESSION["username"]);
header("Location: " . "../index.php");
exit;
