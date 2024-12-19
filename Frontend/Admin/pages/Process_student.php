<?php
include('../../../Backend/connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['user_id'];  // Mendapatkan UserId
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $prodi = $_POST['prodi'];
    $semester = $_POST['semester'];
    $email = $_POST['email'];  // Email sudah diambil dan ditampilkan di form
    $class = $_POST['class'];   // Menambahkan input untuk kelas mahasiswa

    // Query untuk memasukkan data mahasiswa
    $sql = "INSERT INTO Students (NIM, Nama, Jurusan, Prodi, Semester, UserId, Email, class) 
            VALUES (:nim, :nama, :jurusan, :prodi, :semester, :user_id, :email, :class)";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nim', $nim);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':jurusan', $jurusan);
        $stmt->bindParam(':prodi', $prodi);
        $stmt->bindParam(':semester', $semester);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':class', $class); 

        if ($stmt->execute()) {
            echo "Data Mahasiswa berhasil disimpan!";
            header("Location: /PBLTatib/PBLSistemTatib/Frontend/Admin/indexAdmin.php?page=dashboard");
            
        } else {
            echo "Gagal menyimpan data mahasiswa.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
