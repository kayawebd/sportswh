<?php
require_once "./classes/Authentication.php";
require_once "./classes/DBAccess.php";
include "./settings/db.php";
$db = new DBAccess($dsn, $username, $password);
$pdo = $db->connect();
$title = "Create account";
$message = "";
$createUserErrMessages = [];

if (isset($_POST["submit"])) {
    $userName = trim($_POST["userName"]);
    $userNameCharacterCount = strlen($userName);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $userPasswordCharacterCount = strlen($_POST["password"]);
    $confirmPassword = $_POST["confirmPassword"];

    // USERNAME VALIDATION
    if (empty($userName)) {
        $createUserErrMessages[] = "The user name should not be empty";
    }
    if ($userNameCharacterCount < 3) {
        $createUserErrMessages[] = "The user name should be at least 3 charactors";
    }
    $sql = "SELECT userName FROM user WHERE userName=:userName";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":userName", $userName, PDO::PARAM_STR);
    $userNameRows = $db->executeSQL($stmt);
    if (count($userNameRows) > 0) {
        $createUserErrMessages[] = "Username already taken";
    }

    // PASSWORD VALIDATION
    $minLength = 4;
    $requiresUppercase = false;
    $requiresLowercase = false;
    $requiresNumber = false;
    $requiresSpecialChar = false;
    if (strlen($password) < $minLength) {
        $createUserErrMessages[] = "The password should be at least " . $minLength . " characters.";
    }
    if ($requiresUppercase && !preg_match('/[A-Z]/', $password)) {
        $createUserErrMessages[] = "The password should contain at least one uppercase letter.";
    }
    if ($requiresLowercase && !preg_match('/[a-z]/', $password)) {
        $createUserErrMessages[] = "The password shoudl contain at least one lowercase letter.";
    }
    if ($requiresNumber && !preg_match('/\d/', $password)) {
        $createUserErrMessages[] = "The password should contain at least one number.";
    }
    if ($requiresSpecialChar && !preg_match('/[^A-Za-z0-9]/', $password)) {
        $createUserErrMessages[] = "The password should contain at least one special character.";
    }
    if ($password !== $confirmPassword) {
        $createUserErrMessages[] = "Passwords not match";
    }

    // EMAIL VALIDATION
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $createUserErrMessages[] = "Invalid email address";
    }
    $phone = "";
    $address = "";
    $roles = "user";
    if (empty($createUserErrMessages)) {
        $message = Authentication::createUser($userName, $password, $email, $phone, $address, $roles);
        ob_start();
        include "templates/login.html.php";
        $output = ob_get_clean();
        include "templates/layoutLogin.html.php";
        exit;
    }
}
ob_start();
include "templates/createAccount.html.php";
$output = ob_get_clean();
include "templates/layoutLogin.html.php";
exit();
