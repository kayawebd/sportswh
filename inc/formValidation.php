<?php
$firstnameErr = $lastnameErr = $emailErr = $phoneErr = $messageErr = "";
// $firstname = $lastname = $email = $phone = $message = "";
function input_data($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // check first name string
    if (empty($_POST["firstname"])) {
        $firstnameErr =  "First name is required";
    } else {
        if (!preg_match("/^[a-zA-Z ]*$/", input_data($_POST["firstname"]))) {
            $firstnameErr = "Only alphabets and white space are allowed";
        } else {
            $firstname = input_data($_POST["firstname"]);
        }
    }
    // check last name string
    if (empty($_POST["lastname"])) {
        $lastnameErr =  "Last name is required";
    } else {
        if (!preg_match("/^[a-zA-Z ]*$/", input_data($_POST["lastname"]))) {
            $lastnameErr = "Only alphabets and white space are allowed";
        } else {
            $lastname = input_data($_POST["lastname"]);
        }
    }
    // Email validation
    if (empty($_POST["email"])) {
        $emailErr =  "Email is required";
    } else {
        if (filter_var(input_data($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
            $email = input_data($_POST["email"]);
        } else {
            $emailErr = "Invalid email format";
        }
    }
    // Phone number validation
    if (empty($_POST["phone"])) {
        $phoneErr =  "Phone number is required";
    } else {
        if (!preg_match("/^[0-9]*$/", input_data($_POST["phone"]))) {
            $phoneErr = "Only numeric value is allowed.";
        } else {
            // change this accroding to local number format 
            if (strlen(input_data($_POST["phone"]) > 15)) {
                $phoneErr = "Phone no should be less than 15 digits.";
            } else {
                $phone = input_data($_POST["phone"]);
            }
        }
    }

    if (empty($_POST["message"])) {
        $messageErr =  "Please leave your message.";
    } else {
        $message = input_data($_POST['message']);
    }

    if ($firstnameErr = $lastnameErr = $emailErr = $phoneErr = "" && isset($_POST['submit'])) {
        $recipient = "kayawebd@gmail.com";
        $sender = $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $subject = "Sports warehouse enquiry";
        $header = "From: " . $firstname . "<" . $sender . ">\r\n";

        mail($recipient, $subject, $message, $header)
            or die("Error!");

        echo "<h3>Thank you for contacting us. We will get back to you as soon as possible.</h3>";
    }
}
