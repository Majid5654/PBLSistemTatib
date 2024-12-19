<?php
include('connect.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];  // Email untuk login
    $password = $_POST['password'];

    $sql = "
        SELECT 
            s.Nama, 
            s.NIM,   -- Menambahkan NIM ke query
            u.Email, 
            u.Password, 
            u.Level
        FROM 
            Users u
        INNER JOIN 
            Students s 
        ON 
            u.No = s.UserId
        WHERE 
            LOWER(u.Email) = LOWER(?)
    ";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch();

        if ($user) {
            if ($password === $user['Password']) { 
                // Menyimpan data session
                $_SESSION['email'] = $user['Email'];
                $_SESSION['level'] = $user['Level'];
                $_SESSION['nama'] = $user['Nama']; 
                $_SESSION['nim'] = $user['NIM'];  
                
                // Redirect sesuai level
                $redirectUrl = match ($user['Level']) {
                    'mahasiswa' => '../Frontend/Mahasiswa/indexMahasiswa.php',
                    'dosen' => '../Frontend/Dosen/indexDosen.php',
                    'admin' => '../Frontend/Admin/indexAdmin.php',
                    'dpa' => '../Frontend/Admin/indexAdmin.php',
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
