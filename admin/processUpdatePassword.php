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

$title = "Process Update Password";
$message = "";

$myUsername = $_SESSION["username"];

$sql = "SELECT password FROM user WHERE userName=:userName";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":userName", $myUsername);


if (isset($_POST["submit"])) {
    // TODO: CHECK PASSWORD CHARACTOERS REQUIREMENT  (eg. at least 4 characters, upper case, include number)
    if (!empty($_POST["password"]) && !empty($_POST["confirmPassword"])) {
        if ($_POST["password"] === $_POST["confirmPassword"]) {
            $myUsername = $_SESSION["username"];
            $myNewPassword = $_POST["password"];
            if (strlen($myNewPassword) >= 4) {
                $hashedNewPassword = password_hash($myNewPassword, PASSWORD_DEFAULT);
                $sql = "UPDATE user SET password=:password WHERE userName=:userName";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(":password", $hashedNewPassword, PDO::PARAM_STR);
                $stmt->bindValue(":userName", $myUsername, PDO::PARAM_STR);
                $db->executeNonQuery($stmt, false);
                // $message = "Password updated";
                // diresct user the the login page after reset password
                ob_start();
                unset($_SESSION["username"]);
                header("Location: ../login.php");
                exit;
            } else {
                $message = "Password must be at least 4 characters long";
            }
        } else {
            $message = "Passwords not match";
        }
    } else {
        $message = "Please enter your new password.";
    }
    // direct to the same page if not success
    ob_start();
    include "templates/displayUpdatePassword.html.php";
    $output = ob_get_clean();
    include "templates/layoutAdmin.html.php";
}
