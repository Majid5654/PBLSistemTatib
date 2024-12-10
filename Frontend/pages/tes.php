<?php
// Include PHPMailer
require '../../vendor/autoload.php'; // Update the path to your PHPMailer autoload file
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Set up response
header('Content-Type: application/json');
$response = ['status' => 'error', 'message' => 'Unknown error occurred.'];

// Retrieve form data
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : null;
$nim = isset($_POST['nim']) ? htmlspecialchars($_POST['nim']) : null;
$subject = isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : null;
$message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : null;

// Check if the required fields are provided
if (!$name || !$nim || !$subject || !$message) {
    $response['message'] = 'Missing required fields';
    echo json_encode($response);
    exit;
}

// Use PHPMailer to send an email
$mail = new PHPMailer(true);
try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'majiderwan14@gmail.com'; // Replace with your email
    $mail->Password = 'gkryifmglsaxtucs'; // Replace with your email password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Recipients
    $mail->setFrom('majiderwan14@gmail.com', 'Customer Service'); // Replace with your email
    $mail->addAddress('majiderwan14@gmail.com'); // Replace with recipient email

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'New Ticket Submission: ' . $subject;
    $mail->Body = "
        <h3>New Ticket Submitted</h3>
        <p><strong>Name:</strong> $name</p>
        <p><strong>NIM:</strong> $nim</p>
        <p><strong>Subject:</strong> $subject</p>
        <p><strong>Message:</strong> $message</p>
    ";

    // Send email
    $mail->send();

    // Return success response
    $response['status'] = 'success';
    $response['message'] = 'Ticket submitted and email sent successfully.';
} catch (Exception $e) {
    // Handle email errors
    $response['message'] = 'Email error: ' . $mail->ErrorInfo;
}

// Return response as JSON
echo json_encode($response);
?>
