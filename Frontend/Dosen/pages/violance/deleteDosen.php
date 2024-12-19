<?php
include('../../../../Backend/connect.php'); // Pastikan path benar

if (isset($_GET['id'])) {
    try {
        $id = $_GET['id'];

        // Query untuk menghapus data berdasarkan ID
        $stmt = $conn->prepare("DELETE FROM PelanggaranMahasiswa WHERE ID = :id");
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            // Redirect setelah berhasil menghapus data
            header("Location: /PBLTatib/PBLSistemTatib/Frontend/Dosen/indexDosen.php?page=violance");
            exit;
        } else {
            throw new Exception("Gagal menghapus data.");
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
