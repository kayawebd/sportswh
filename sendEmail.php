
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (isset($_POST['submit'])) {
    if (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["message"])) {
        $recipient = "kayawebd@gmail.com";
        $sender = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $subject = "Message - sports warehouse";
        $message = $_POST['message'];
        $header = "From: $name <$sender>\r\n";

        if (mail($recipient, $subject, $message, $header)) {
            echo 'Email sent successfully!';
        } else {
            echo 'Failed to send email. Please check your configuration.';
        }
    } else {
        echo "Please fill in all required fields.";
    }
}
?>
