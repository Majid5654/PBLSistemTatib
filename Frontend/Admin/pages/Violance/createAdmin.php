<?php
include('../../../../Backend/connect.php'); // Pastikan path benar

try {
    $stmt = $conn->prepare("SELECT NO, Pelanggaran, Tingkat FROM TingkatPelanggaran");
    $stmt->execute();
    $listPelanggaran = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}


?>


<!DOCTYPE html>
<html>
    <head>
        <title>Tambah Data Anggota</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-4">
            <h2>Tambah Data Anggota</h2>

            <form action="/PBLTatib/PBLSistemTatib/Frontend/Admin/pages/Violance/proccessAdmin.php?aksi=tambah" method="post">
    <!-- Pastikan 'prosesAdmin.php' sesuai path -->

    <div class="form-group">
        <label for="nama">Nama:</label>
        <input type="text" class="form-control" name="nama" id="nama" required>
    </div>

    <div class="form-group">
        <label for="ID" >ID:</label>
        <input type="text" class="form-control" name="ID" id="ID" required>
    </div>
    
    <div class="form-group">
        <label for="nim">NIM:</label>
        <input type="text" class="form-control" name="nim" id="nim" required>
    </div>
    <div class="form-group">
        <label for="jurusan">Jurusan:</label>
        <select id="jurusan" name="jurusan" class="form-control" required>
            <option value="Teknologi Informasi">Teknologi Informasi</option>
            <option value="Teknik Sipil">Teknik Sipil</option>
            <option value="Teknik Elektro">Teknik Elektro</option>
            <option value="Teknik Mesin">Teknik Mesin</option>
            <option value="Teknik Kimia">Teknik Kimia</option>
            <option value="Akuntansi">Akuntansi</option>
            <option value="Administrasi Niaga">Administrasi Niaga</option>
        </select>
    </div>
    <div class="form-group">
        <label for="prodi">Prodi:</label>
        <input type="text" class="form-control" name="prodi" id="prodi" required>
    </div>
    <div class="form-group">
        <label for="semester">Semester:</label>
        <select id="semester" name="semester" class="form-control" required>
            <option value="1">Semester 1</option>
            <option value="2">Semester 2</option>
            <option value="3">Semester 3</option>
            <option value="4">Semester 4</option>
            <option value="5">Semester 5</option>
            <option value="6">Semester 6</option>
            <option value="7">Semester 7</option>
            <option value="8">Semester 8</option>
        </select>
    </div>
    <div class="form-group">
    <label for="jenis_pelanggaran">Jenis Pelanggaran:</label>
    <select id="jenis_pelanggaran" name="jenis_pelanggaran" class="form-control" required>
        <option value="" disabled selected>Pilih Jenis Pelanggaran</option>
        <?php foreach ($listPelanggaran as $pelanggaran): ?>
            <option value="<?= $pelanggaran['NO'] ?>">
                <?= $pelanggaran['Pelanggaran'] ?> - Tingkat <?= $pelanggaran['Tingkat'] ?>
            </option>
        <?php endforeach; ?>
    </select>
    
</div>


    <button type="submit" class="btn btn-primary">Simpan Data</button>
    <a class="btn btn-secondary" href="/PBLTatib/PBLSistemTatib/Frontend/Admin/indexAdmin.php?page=violance">Kembali</a>
    
</form>

        </div>

        <script src="https://code.jguery.com/jguery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popper3s/coreg2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>