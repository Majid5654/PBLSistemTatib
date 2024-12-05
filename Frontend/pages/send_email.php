<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $nim = htmlspecialchars($_POST['nim']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    
    // Your email where the form data will be sent
    $to = "your_email@example.com";
    
    // Email subject
    $email_subject = "New Customer Service Ticket: " . $subject;
    
    // Email body
    $email_body = "You have received a new message from your customer service form.\n\n" .
                  "Name: $name\n" .
                  "NIM: $nim\n" .
                  "Email: $email\n" .
                  "Message:\n$message\n";

    // Email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Check if a file was uploaded
    if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == UPLOAD_ERR_OK) {
        // Save the uploaded file temporarily
        $file_tmp_path = $_FILES['attachment']['tmp_name'];
        $file_name = $_FILES['attachment']['name'];
        $file_content = chunk_split(base64_encode(file_get_contents($file_tmp_path)));

        // Add the file as an attachment
        $boundary = md5(time());
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";

        $email_body = "--$boundary\r\n";
        $email_body .= "Content-Type: text/plain; charset=\"UTF-8\"\r\n";
        $email_body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $email_body .= $email_body . "\r\n";
        $email_body .= "--$boundary\r\n";
        $email_body .= "Content-Type: application/octet-stream; name=\"$file_name\"\r\n";
        $email_body .= "Content-Disposition: attachment; filename=\"$file_name\"\r\n";
        $email_body .= "Content-Transfer-Encoding: base64\r\n\r\n";
        $email_body .= $file_content . "\r\n";
        $email_body .= "--$boundary--";
    }

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Your ticket has been submitted successfully!";
    } else {
        echo "Failed to send your ticket. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>
