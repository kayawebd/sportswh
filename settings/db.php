<?php
// LOCALHOST SETTING
$localhost_database_name = "sportswh";

// SERVER SETTING
$mySQL_Host = "";
$mySQL_UserName = "";
$mySQL_DatabaseName = "";
$mySQL_Password = "";



if ($_SERVER["SERVER_NAME"] == "localhost" || $_SERVER["SERVER_ADDR"] == "127.0.0.1") {
    $dsn = "mysql:host=localhost;dbname=" . $localhost_database_name . ";charset=utf8";
    $username = "root";
    $password = "";
} else {
    $dsn = "mysql:host=" . $mySQL_Host . ";dbname=" . $mySQL_DatabaseName . ";charset=utf8";
    $username = $mySQL_UserName;
    $password = $mySQL_Password;
}
