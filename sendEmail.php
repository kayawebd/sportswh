
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$currentURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$parsedURL = parse_url($currentURL);
$mainDomain = $parsedURL['scheme'] . '://' . $parsedURL['host'];

if (isset($_POST['submit'])) {
    if (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["message"])) {
        $recipient = "info@kayawebdesign.com";
        $sender = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $subject = "$name sent you a message from $mainDomain";
        $message = filter_var($_POST['message'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $header = "From: $name <$sender>\r\n";

        if (mail($recipient, $subject, $message, $header)) {
            header("Location: contactThankYouPage.php");
        } else {
            echo 'Failed to send email. Please check your configuration.';
        }
    } else {
        echo "Please fill in all required fields.";
    }
}
?>
