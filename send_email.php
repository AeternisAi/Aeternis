<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the email from the form
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Validate the email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Set up the email details
    $to = "daybreak.theory@gmail.com"; // Replace with your email address
    $subject = "New Sign-Up";
    $message = "A new user has signed up with the email: $email";
    $headers = "From: no-reply@yourdomain.com\r\n"; // Replace with your domain

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you for signing up!";
    } else {
        echo "There was an error sending the email. Please try again.";
    }
} else {
    echo "Invalid request method.";
}
?>
