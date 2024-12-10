<?php
include "../Backend/connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json'); // Pastikan respons dalam format JSON
    $email = $_POST['forgot-email'];

    // Cek apakah email ada di database
    $sql = "SELECT * FROM Users WHERE LOWER(Email) = LOWER(?)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Email ditemukan
        echo json_encode(['success' => true, 'message' => 'Verification code sent']);
    } else {
        // Email tidak ditemukan
        echo json_encode(['success' => false, 'message' => 'Email not found']);
    }
    exit(); // Hentikan eksekusi script
}
?>
