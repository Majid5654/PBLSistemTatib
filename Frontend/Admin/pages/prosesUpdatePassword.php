<?php
require_once '../../../Backend/classes/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $newPassword = $_POST['newPassword'];

    // Validate the password
    if (preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $newPassword)) {
        // Create User object to call updatePassword method
        $user = new User();
        if ($user->updatePassword($email, $newPassword)) {
            $_SESSION['message'] = "Password updated successfully.";
        } else {
            $_SESSION['message'] = "Failed to update password.";
        }
    } else {
        $_SESSION['message'] = "Password must be at least 8 characters long and include letters and numbers.";
    }

    header("Location: /PBLTatib/PBLSistemTatib/Frontend/Admin/indexAdmin.php?page=dashboard");
    exit();
}
?>
