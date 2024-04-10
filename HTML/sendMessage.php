<<<<<<< HEAD
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form Data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $to = "rohitghatal@gmail.com"; // Receiver email address

    // Email message
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n $message";

    // ini_set("SMTP", "smtp.gamil.com");
    // ini_set("smtp_port", "587");

    $headers = "From:$email\r\n";
    // sending mail
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Mail Sent!!')</script>";
    } else {
        echo "<script>alert('Failed to send Mail!!')</script>";
    }
}
=======
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form Data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $to = "rohitghatal@gmail.com"; // Receiver email address

    // Email message
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n $message";

    // ini_set("SMTP", "smtp.gamil.com");
    // ini_set("smtp_port", "587");

    $headers = "From:$email\r\n";
    // sending mail
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Mail Sent!!')</script>";
    } else {
        echo "<script>alert('Failed to send Mail!!')</script>";
    }
}
>>>>>>> origin/main
