<?php
include('../../../../Backend/connect.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $file = $_FILES["verification_file"];

    // File upload handling
    $targetDir = "../../../..Uploads/";
    $filePath = $targetDir . basename($file["name"]);
    move_uploaded_file($file["tmp_name"], $filePath);

    // Update verification status
    $query = "UPDATE PelanggaranMahasiswa SET Verifikasi = 1, VerificationFile = ? WHERE ID = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$filePath, $id]);

    header("Location: /PBLTatib/PBLSistemTatib/Frontend/Admin/indexAdmin.php?page=violance");
    exit;
}
?>
