<?php
session_start();
require_once '../../../Backend/classes/User.php';

// Ensure the user is logged in
if (!isset($_SESSION['nama'])) {
    header("Location: ../../../Frontend/Login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user ID and new password from the form
    $userId = $_SESSION['email']; // ID from session
    $newPassword = $_POST['password'];

    // Validate password length (optional)
    if (strlen($newPassword) < 8) {
        $_SESSION['error'] = "Password must be at least 8 characters.";
        header("Location: changeAdmin.php");
        exit;
    }

    // Create User object to interact with the database
    $user = new User();

    // Update password using the updatePassword method
    if ($user->updatePassword($userId, $newPassword)) {
        $_SESSION['message'] = "Password successfully updated.";
        header("Location: /PBLTatib/PBLSistemTatib/Frontend/Admin/indexAdmin.php?page=dashboard"); // Redirect to success page
        exit;
    } else {
        $_SESSION['message'] = "Failed to update password. Please try again.";
        header("Location: SettingAdmin.php"); // Redirect back to change page
        exit;   
    }
}
?>
