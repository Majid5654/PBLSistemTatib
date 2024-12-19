<?php
header('Content-Type: application/json'); // Mengatur header respon ke JSON

// Sertakan file koneksi database
include '../../../../Backend/connect.php'; // Pastikan path ke connect.php benar

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];

    // Validasi bahwa $id adalah integer
    if (!filter_var($id, FILTER_VALIDATE_INT)) {
        echo json_encode(['status' => 'error', 'message' => 'ID tidak valid']);
        exit;
    }

    try {
        // Query untuk menghapus data menggunakan prepared statement
        $query = "DELETE FROM email_logs WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        // Cek apakah baris berhasil dihapus
        if ($stmt->rowCount() > 0) {
            echo json_encode(['status' => 'success', 'message' => 'Record berhasil dihapus']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Record tidak ditemukan atau sudah dihapus']);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Gagal menghapus record: ' . $e->getMessage()]);
    }

    exit;
}

// Jika permintaan bukan POST atau tidak ada delete_id
echo json_encode(['status' => 'error', 'message' => 'Permintaan tidak valid']);
exit;
?>