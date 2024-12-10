<?php
include('connect.php');  
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Users WHERE LOWER(Email) = LOWER(?)";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            //proses verif password
            if ($password === $user['Password']) { // Ganti dengan password_hash jika terenkripsi
                $_SESSION['username'] = $user['Username']; // Perbaiki penempatan variabel
                $_SESSION['level'] = $user['Level'];

                //Mengarahkan sesuai level
                if ($user['Level'] === 'student') {
                    header("Location: ../Frontend/index.php");
                    exit();
                } elseif ($user['Level'] === 'admin') {
                    header("Location: ../Backend/index.php");
                    exit();
                }
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "User not found.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
