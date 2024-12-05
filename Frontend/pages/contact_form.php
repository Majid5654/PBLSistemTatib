<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $nim = htmlspecialchars($_POST['nim']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Email setup
    $to = "3rwanmajid@gmail.com";
    $email_subject = "New Customer Service Ticket: " . $subject;
    $email_body = "Name: $name\nNIM: $nim\nEmail: $email\n\n$message";
    $headers = "From: $email\r\nReply-To: $email\r\n";

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Your ticket has been submitted successfully!";
    } else {
        echo "Failed to send your ticket. Please try again.";
    }
} else {
    echo "Invalid request. Please submit the form.";
}
?>
