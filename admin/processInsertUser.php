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

$title = "Process Add User";
$message = "";

$createUserErrMessages = [];

// TODO: VALIDATE INPUT BEFORE SUBMIT  USERNAME, EMAIL, PHONE,  ADDRESS
if (isset($_POST["submitInsert"])) {
    $userName = trim($_POST["userName"]);
    $userNameCharacterCount = strlen($userName);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $address = trim($_POST["address"]);
    $userPasswordCharacterCount = strlen($_POST["password"]);
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    // validate userName
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
    // Define password validation rules
    $minLength = 8; // Minimum length requirement
    $requiresUppercase = true; // Whether an uppercase letter is required
    $requiresLowercase = true; // Whether a lowercase letter is required
    $requiresNumber = true; // Whether a number is required
    $requiresSpecialChar = true; // Whether a special character is required
    // Perform the password validation
    if (strlen($password) < $minLength) {
        // $isValid = false;
        $createUserErrMessages[] = "The password should be at least 8 characters.";
    }
    if ($requiresUppercase && !preg_match('/[A-Z]/', $password)) {
        // $isValid = false;
        $createUserErrMessages[] = "The password should contain at least one uppercase letter.";
    }
    if ($requiresLowercase && !preg_match('/[a-z]/', $password)) {
        // $isValid = false;
        $createUserErrMessages[] = "The password shoudl contain at least one lowercase letter.";
    }
    if ($requiresNumber && !preg_match('/\d/', $password)) {
        // $isValid = false;
        $createUserErrMessages[] = "The password should contain at least one number.";
    }
    if ($requiresSpecialChar && !preg_match('/[^A-Za-z0-9]/', $password)) {
        // $isValid = false;
        $createUserErrMessages[] = "The password should contain at least one special character.";
    }

    if ($password !== $confirmPassword) {
        $createUserErrMessages[] = "Passwords not match";
    }

    // validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $createUserErrMessages[] = "Invalid email address";
    }

    $roles = "staff";
    if (empty($createUserErrMessages)) {
        $message = Authentication::createUser($userName, $password, $email, $phone, $address, $roles);
    } else {
        // display $createUserErrMessages[] on the page
        ob_start();
        include "templates/displayInsertUser.html.php";
        $output = ob_get_clean();
        include "templates/layoutAdmin.html.php";
        exit();
    }
}
ob_start();
include "templates/displayUsers.html.php";
$output = ob_get_clean();
include "templates/layoutAdmin.html.php";
