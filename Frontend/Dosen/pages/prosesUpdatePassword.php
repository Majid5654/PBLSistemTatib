<?php
require_once '../../../Backend/classes/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $newPassword = $_POST['newPassword'];

    // Create User object to call updatePassword method
    $user = new User();
    if ($user->updatePassword($email, $newPassword)) {
        $_SESSION['message'] = "Password updated successfully.";
    } else {
        $_SESSION['message'] = "Failed to update password.";
    }

    header("Location: /PBLTatib/PBLSistemTatib/Frontend/Admin/indexAdmin.php?page=dashboard");
    exit();
}
?>
