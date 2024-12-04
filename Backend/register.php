<?php
include('connect.php');

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO Users (Username, Email, Password) VALUES (:name, :email, :password)";

$stmt = $conn->prepare($sql);

// Bind parameter
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':password', $password, PDO::PARAM_STR);

// Menjalankan query
if ($stmt->execute()) {
    header("Location: ../Frontend/Login.php");
    exit(); // Menghentikan eksekusi setelah redirect
} else {
    echo "Gagal menambahkan data.";
}



?>
