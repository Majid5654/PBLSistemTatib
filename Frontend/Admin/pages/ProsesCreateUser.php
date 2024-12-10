<?php
include('../../../Backend/connect.php');

// Periksa jika form dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $level = $_POST['level'];  // Menangkap level yang dipilih

    // Debug: Pastikan data yang diterima sudah benar
    echo "Username: " . $username . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Password " . $password . "<br>";
    echo "Level: " . $level . "<br>";  // Tampilkan level untuk debugging

    // Query untuk memasukkan data ke tabel Users
    $sql = "INSERT INTO Users (Username, Email, password ,Level) VALUES (:username, :email, :password, :level)";  // Gunakan placeholder PDO

    try {
        // Siapkan statement
        $stmt = $conn->prepare($sql);

        // Bind parameter
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':level', $level, PDO::PARAM_STR);  // Bind level

        // Eksekusi query dan periksa apakah berhasil
        if ($stmt->execute()) {
            // Ambil UserId yang baru saja disisipkan
            $userId = $conn->lastInsertId();
            echo "Registrasi berhasil! UserId: " . $userId;
        } else {
            echo "Error saat eksekusi query: " . $stmt->errorInfo()[2];
        }
    } catch (PDOException $e) {
        // Menangkap error PDO
        echo "Error: " . $e->getMessage();
    }
}
?>
