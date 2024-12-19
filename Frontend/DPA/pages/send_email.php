<?php
// Include PHPMailer
require '../../../vendor/autoload.php'; // Update the path to your PHPMailer autoload file
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Set up response
header('Content-Type: application/json');
$response = ['status' => 'error', 'message' => 'Unknown error occurred.'];

// Include database connection
require '../../../Backend/Connect.php'; // Replace with the correct path to your database connection file

// Retrieve form data
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : null;
$nim = isset($_POST['nim']) ? htmlspecialchars($_POST['nim']) : null;
$subject = isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : null;
$message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : null;
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : null;

// Check if the required fields are provided
if (!$name || !$nim || !$subject || !$message || !$email) {
    $response['message'] = 'Missing required fields';
    echo json_encode($response);
    exit;
}

// Use PHPMailer to send an email
$mail = new PHPMailer(true);
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

    // Attach file directly from the request if provided
    $attachmentName = null;
    if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == 0) {
        $mail->addAttachment($_FILES['attachment']['tmp_name'], $_FILES['attachment']['name']);
        $attachmentName = $_FILES['attachment']['name'];
    }

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
    $gmailUserIndex = 0; // Default Gmail user index
    $gmailMessageID = $mail->getLastMessageID(); // Get the unique Gmail Message ID
    $gmailLink = "https://mail.google.com/mail/u/{$gmailUserIndex}/#inbox/{$gmailMessageID}";

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO email_logs (name, nim, email, subject, message, attachment, gmail_link) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $nim, $email, $subject, $message, $attachmentName, $gmailLink]);

    // Return success response with Gmail link
    $response['status'] = 'success';
    $response['message'] = 'Ticket submitted and email sent successfully.';
    $response['gmail_link'] = $gmailLink;
} catch (Exception $e) {
    // Handle email errors
    $response['message'] = 'Email error: ' . $mail->ErrorInfo;
}

// Return response as JSON
echo json_encode($response);
?>