<?php
// Include PHPMailer
require '../../../vendor/autoload.php'; // Update the path to your PHPMailer autoload file
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Set up response
$response = ['status' => 'error', 'message' => 'Unknown error occurred.'];

// Include database connection
require '../../../Backend/Connect.php'; // Replace with the correct path to your database connection file

// Retrieve form data
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : null;
$nim = isset($_POST['nim']) ? htmlspecialchars($_POST['nim']) : null;
$subject = isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : null;
$message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : null;
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : null;

// Use PHPMailer to send an email
$mail = new PHPMailer();
try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Gmail SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'majiderwan14@gmail.com'; // Your Gmail address
    $mail->Password = 'gkryifmglsaxtucs'; // Your app-specific Gmail password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Recipients
    $mail->setFrom('majiderwan14@gmail.com', 'Customer Service'); // Your email
    $mail->addAddress('majiderwan14@gmail.com'); // Admin email

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'New Ticket Submission: ' . $subject;
    $mail->Body = "
        <h3>New Ticket Submitted</h3>
        <p><strong>Name:</strong> $name</p>
        <p><strong>NIM:</strong> $nim</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Subject:</strong> $subject</p>
        <p><strong>Message:</strong> $message</p>
    ";

    // Send email
    $mail->send();

    // Generate Gmail link manually
    // Use default user "u/0" for the Gmail admin inbox

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO email_logs (name, nim, email, subject, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$name, $nim, $email, $subject, $message]);

    // Return success response with Gmail link
    $response['status'] = 'success';
    $response['message'] = 'Ticket submitted and email sent successfully.';
} catch (Exception $e) {
    // Handle email errors
    $response['message'] = 'Email error: ' . $mail->ErrorInfo;
}

// Return response as JSON
echo json_encode($response);
?>