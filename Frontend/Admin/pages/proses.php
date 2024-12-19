<?php
class User {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function createUser($data) {
        try {
            // Query untuk memasukkan data ke tabel Users
            $sql = "INSERT INTO Users (Email, password, Level) VALUES (:email, :password, :level)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':email', $data['email']);
            $stmt->bindParam(':password', $data['password']);
            $stmt->bindParam(':level', $data['level']);
            $stmt->execute();

            // Ambil ID pengguna yang baru dibuat
            $userId = $this->conn->lastInsertId();

            // Redirect ke halaman CreateStudent.php dengan ID pengguna
            header("Location: CreateStudent.php?id=" . $userId);
            exit();  // Pastikan tidak ada proses lebih lanjut setelah pengalihan
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
?>
