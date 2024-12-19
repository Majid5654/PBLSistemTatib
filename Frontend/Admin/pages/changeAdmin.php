<?php
session_start();
require_once '../../../Backend/classes/Database.php'; // Pastikan class User Anda tersedia
require_once '../../../Backend/classes/User.php'; // Pastikan file User sudah benar

echo "HALO";
// Pastikan pengguna telah login
if (!isset($_SESSION['nama'])) {
    header("Location: ../../../Frontend/Login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $userId = $_SESSION['email']; // ID pengguna dari sesi
    $newPassword = $_POST['password'];

    // Validasi panjang password baru (opsional)
    if (strlen($newPassword) < 8) {
        $_SESSION['error'] = "Password must be at least 8 characters.";
        header("Location: change.php");
        exit;
    }

    // Instance User class
    $user = new User();

    // Update password di database (tanpa hashing)
    if ($user->updatePasswordWithoutHash($userId, $newPassword)) {
        $_SESSION['success'] = "Password successfully updated.";
        header("Location: /PBLTatib/PBLSistemTatib/Frontend/Admin/indexAdmin.php?page=dashboard"); // Redirect ke halaman sukses
        exit;
    } else {
        $_SESSION['error'] = "Failed to update password. Please try again.";
        header("Location: contact.php");
        exit;
    }
    

}
?>
