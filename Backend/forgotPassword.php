<?php
include "../Backend/connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['forgot-email'];

    $sql = "SELECT * FROM Users WHERE LOWER(Email) = LOWER(?)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Generate kode verifikasi
        $verificationCode = rand(100000, 999999);

        // Simpan kode verifikasi di database (opsional, jika ingin validasi di langkah berikutnya)
        //$updateSql = "UPDATE Users SET VerificationCode = ? WHERE Email = ?";
        //$updateStmt = $conn->prepare($updateSql);
        //$updateStmt->bindParam(1, $verificationCode, PDO::PARAM_INT);
        //$updateStmt->bindParam(2, $email, PDO::PARAM_STR);
        //$updateStmt->execute();

       
        header("Location: ../Frontend/Login.php?message=verification_sent");
        exit();
    } else {
        echo "Email not found.";
    }
}
?>
