<?php
require '../../vendor/autoload.php'; // Include PHPMailer autoloader
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Database connection
$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "your_database_name"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$nim = $_POST['nim'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$attachment = null;

// Handle file upload
if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == 0) {
    $upload_dir = '../../uploads/';
    $attachment = $upload_dir . basename($_FILES['attachment']['name']);
    move_uploaded_file($_FILES['attachment']['tmp_name'], $attachment);
}

// Insert ticket into database
$sql = "INSERT INTO tickets (name, nim, subject, message, attachment_path) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $name, $nim, $subject, $message, $attachment);
$stmt->execute();
$ticket_id = $stmt->insert_id; // Get the generated ticket ID
$stmt->close();

// Send email
$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'your_email@gmail.com'; // Replace with your email
    $mail->Password = 'your_app_password'; // Replace with your app password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('your_email@gmail.com', 'Customer Service');
    $mail->addAddress('admin_email@gmail.com', 'Admin'); // Replace with recipient's email
    $mail->Subject = "Ticket #$ticket_id - $subject";
    $mail->Body = "Ticket Details:\n\nName: $name\nNIM: $nim\nSubject: $subject\nMessage:\n$message";
    $mail->isHTML(false);

    if ($attachment) {
        $mail->addAttachment($attachment);
    }

    $mail->send();
    header("Location: http://localhost/PBLSistemTatib/Frontend/service.php?status=success&ticket_id=$ticket_id");
} catch (Exception $e) {
    header("Location: http://localhost/PBLSistemTatib/Frontend/service.php?status=error");
}

$conn->close();
