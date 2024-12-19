<?php
// Pastikan koneksi dengan database sudah benar
include "../Backend/connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json'); // Pastikan respons dalam format JSON
    
    // Ambil email dari form
    $email = $_POST['forgot-email'];

    // Validasi email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => 'Invalid email format']);
        exit();
    }

    // Query untuk mengecek apakah email ada di database
    $sql = "SELECT * FROM Users WHERE LOWER(Email) = LOWER(?)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user) {
        // Kirim kode verifikasi (ini hanya contoh, pastikan implementasi sesuai dengan aplikasi Anda)
        echo json_encode(['success' => true, 'message' => 'Verification code sent']);
    } else {
        // Email tidak ditemukan
        echo json_encode(['success' => false, 'message' => 'Email not found']);
    }
    exit(); // Hentikan eksekusi script setelah respons JSON

    
}
?>
