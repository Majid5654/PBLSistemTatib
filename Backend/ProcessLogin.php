<?php
include('connect.php');  
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];  // Email sebagai identifikasi
    $password = $_POST['password'];

    $sql = "SELECT * FROM Users WHERE LOWER(Email) = LOWER(?)";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch();

        if ($user) {
            if ($password === $user['Password']) { 
                $_SESSION['email'] = $user['Email'];
                $_SESSION['level'] = $user['Level'];
                
                // Kirim data JSON (sukses + URL target)
                $redirectUrl = match ($user['Level']) {
                    'student' => '../Frontend/Mahasiswa/indexMahasiswa.php',
                    'dosen' => '../Frontend/Dosen/indexDosen.php',
                    'admin' => '../Frontend/Admin/indexAdmin.php',
                    default => '../Frontend/LoginPage.php'
                };
                echo json_encode(["success" => true, "redirect" => $redirectUrl]);
                exit();
            } else {
                // Password salah
                echo json_encode(["success" => false, "message" => "Invalid password."]);
                exit();
            }
        } else {
            // User tidak ditemukan
            echo json_encode(["success" => false, "message" => "User not found."]);
            exit();
        }
    } catch (PDOException $e) {
        // Kesalahan server
        echo json_encode(["success" => false, "message" => "Server error: " . $e->getMessage()]);
        exit();
    }
}
?>