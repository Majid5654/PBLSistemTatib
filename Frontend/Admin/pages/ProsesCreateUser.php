<?php
include('../../../Backend/connect.php');

// Periksa jika form dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $email = $_POST['email'];
    $password = $_POST['password'];
    $level = $_POST['level'];  

 
    $password = password_hash($password, PASSWORD_BCRYPT); 

    
    $sql = "INSERT INTO Users (Email, password, Level) VALUES (:email, :password, :level)";  

    try {
        // Siapkan statement
        $stmt = $conn->prepare($sql);

        // Bind parameter
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);  // Bind hashed password
        $stmt->bindParam(':level', $level, PDO::PARAM_STR);  // Bind level

        // Eksekusi query dan periksa apakah berhasil
        if ($stmt->execute()) {
            // Ambil UserId yang baru saja disisipkan
            $userId = $conn->lastInsertId();  // Mengambil ID pengguna yang baru dimasukkan

            // Redirect ke halaman CreateStudent.php dengan UserId sebagai parameter
            header("Location: CreateStudent.php?id=" . $userId);
            exit();  // Pastikan tidak ada proses lebih lanjut setelah pengalihan
        } else {
            echo "Error saat eksekusi query: " . $stmt->errorInfo()[2];
        }
    } catch (PDOException $e) {
        // Menangkap error PDO
        echo "Error: " . $e->getMessage();
    }
}
?>