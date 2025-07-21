<?php
require_once "classes/ShoppingCart.php";

if (!isset($_SESSION)) {
    session_start();
}


$title = "Thanks";
$orderId = 0;

if (isset($_POST["pay"]) && isset($_SESSION["cart"])) {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $address = $_POST["address"];
    $contactNumber = $_POST["contactNumber"];
    $email = $_POST["email"];
    $creditCardNumber = $_POST["creditCardNumber"];
    $expiryDate = $_POST["expiryDate"];
    $nameOnCard = $_POST["nameOnCard"];
    $csv = $_POST["csv"];
    if (
        !empty($firstName) &&
        !empty($lastName) &&
        !empty($address) &&
        !empty($contactNumber) &&
        !empty($email) &&
        !empty($creditCardNumber) &&
        !empty($expiryDate) &&
        !empty($nameOnCard) &&
        !empty($csv)
    ) {
        //retreive shopping cart from session         
        $cart = $_SESSION["cart"];
        //save the shopping cart       
        $orderId = $cart->saveCart(
            $firstName,
            $lastName,
            $address,
            $contactNumber,
            $email,
            $creditCardNumber,
            $expiryDate,
            $nameOnCard,
            $csv
        );
        //clear the session         
        session_destroy();
        ob_start();
        include "templates/confirmation.html.php";
        $output = ob_get_clean();
        $showSearchCategory = false;
        include "templates/layout.html.php";
    } else {
        echo "Please complete the form.";
    }
} else {
    echo "Something went wrong with your cart.";
}
