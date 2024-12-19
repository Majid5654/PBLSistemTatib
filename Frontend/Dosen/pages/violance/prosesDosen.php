<?php
include('../../../../Backend/connect.php'); // Pastikan path benar

if ($_GET['aksi'] === 'tambah') {
    try {
        // Mulai session
        session_start();

        // Ambil data dari form
        $id = $_POST['ID'];
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $jurusan = $_POST['jurusan'];
        $prodi = $_POST['prodi'];
        $semester = $_POST['semester'];
        $jenis_pelanggaran = $_POST['jenis_pelanggaran'];

        // Ambil tingkat berdasarkan jenis pelanggaran
        $stmtTingkat = $conn->prepare("SELECT Tingkat FROM TingkatPelanggaran WHERE NO = :jenis_pelanggaran");
        $stmtTingkat->bindParam(':jenis_pelanggaran', $jenis_pelanggaran);
        $stmtTingkat->execute();

        // Ambil tingkat dari hasil query
        $tingkat = $stmtTingkat->fetchColumn();

        if (!$tingkat) {
            throw new Exception("Jenis pelanggaran tidak valid atau tidak memiliki tingkat.");
        }

        // Ambil id pelapor dari session
        $id_pelapor = $_SESSION['user_id'];

        if (is_null($id_pelapor)) {
            throw new Exception("Id pelapor tidak ditemukan dalam session.");
        }

        // Query untuk insert data
        $stmt = $conn->prepare("
            INSERT INTO PelanggaranMahasiswa (ID, Nama, NIM, Jurusan, Prodi, Semester, Jenis_Pelanggaran, Tingkat, ID_Pelapor)
            VALUES (:id, :nama, :nim, :jurusan, :prodi, :semester, :jenis_pelanggaran, :tingkat, :id_pelapor)
        ");

        // Bind parameter
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':nim', $nim);
        $stmt->bindParam(':jurusan', $jurusan);
        $stmt->bindParam(':prodi', $prodi);
        $stmt->bindParam(':semester', $semester);
        $stmt->bindParam(':jenis_pelanggaran', $jenis_pelanggaran);
        $stmt->bindParam(':tingkat', $tingkat);
        $stmt->bindParam(':id_pelapor', $id_pelapor);

        // Eksekusi query
        if ($stmt->execute()) {
            header("Location: /../../../../../../PBLTatib/PBLSistemTatib/Frontend/Dosen/indexDosen.php?page=violance");
            exit;
        } else {
            throw new Exception("Failed to insert data.");
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}



// Proses edit data
if ($_GET['aksi'] === 'edit') {
    try {
        $id = $_POST['ID'];
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $jurusan = $_POST['jurusan'];
        $prodi = $_POST['prodi'];
        $semester = $_POST['semester'];
        $jenis_pelanggaran = $_POST['jenis_pelanggaran'];

        // Query update data
        $stmt = $conn->prepare("
            UPDATE PelanggaranMahasiswa 
            SET Nama = :nama, NIM = :nim, Jurusan = :jurusan, Prodi = :prodi, Semester = :semester, Jenis_Pelanggaran = :jenis_pelanggaran
            WHERE ID = :id
        ");
        

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':nim', $nim);
        $stmt->bindParam(':jurusan', $jurusan);
        $stmt->bindParam(':prodi', $prodi);
        $stmt->bindParam(':semester', $semester);
        $stmt->bindParam(':jenis_pelanggaran', $jenis_pelanggaran);

        if ($stmt->execute()) {
            header("Location: /PBLTatib/PBLSistemTatib/Frontend/Dosen/indexDosen.php?page=violance");
            exit;
        } else {
            throw new Exception("Failed to update data.");
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Proses delete data
if ($_GET['aksi'] === 'hapus') {
    try {
        $id = $_GET['id'];

        // Query hapus data
        $stmt = $conn->prepare("DELETE FROM PelanggaranDosen WHERE ID = :id");
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            header("Location: violanceDosen.php");
            exit;
        } else {
            throw new Exception("Failed to delete data.");
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}


?>
