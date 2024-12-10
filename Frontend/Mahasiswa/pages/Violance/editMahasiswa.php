<?php
include('../../../../Backend/connect.php'); // Pastikan path benar
// Cek apakah parameter `id` ada di URL
if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan!";
    exit;
}

$id = $_GET['id'];

try {
    // Ambil data mahasiswa berdasarkan ID
    $stmt = $conn->prepare("SELECT * FROM PelanggaranMahasiswa WHERE ID = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $mahasiswa = $stmt->fetch(PDO::FETCH_ASSOC);

    // Ambil data untuk dropdown jenis pelanggaran
    $stmtPelanggaran = $conn->prepare("SELECT NO, Pelanggaran, Tingkat FROM TingkatPelanggaran");
    $stmtPelanggaran->execute();
    $listPelanggaran = $stmtPelanggaran->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}

// Jika data tidak ditemukan
if (!$mahasiswa) {
    echo "Data tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Data Mahasiswa</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-4">
            <h2>Edit Data Mahasiswa</h2>

            <form action="prosesMahasiswa.php?aksi=edit" method="post">
                <input type="hidden" name="ID" value="<?= $mahasiswa['ID'] ?>">

                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="<?= $mahasiswa['Nama'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="nim">NIM:</label>
                    <input type="text" class="form-control" name="nim" id="nim" value="<?= $mahasiswa['NIM'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="jurusan">Jurusan:</label>
                    <input type="text" class="form-control" name="jurusan" id="jurusan" value="<?= $mahasiswa['Jurusan'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="prodi">Prodi:</label>
                    <input type="text" class="form-control" name="prodi" id="prodi" value="<?= $mahasiswa['Prodi'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="semester">Semester:</label>
                    <select id="semester" name="semester" class="form-control" required>
                        <?php for ($i = 1; $i <= 8; $i++): ?>
                            <option value="<?= $i ?>" <?= $mahasiswa['Semester'] == $i ? 'selected' : '' ?>>Semester <?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="jenis_pelanggaran">Jenis Pelanggaran:</label>
                    <select id="jenis_pelanggaran" name="jenis_pelanggaran" class="form-control" required>
                        <?php foreach ($listPelanggaran as $pelanggaran): ?>
                            <option value="<?= $pelanggaran['NO'] ?>" <?= $mahasiswa['Jenis_Pelanggaran'] == $pelanggaran['NO'] ? 'selected' : '' ?>>
                                <?= $pelanggaran['Pelanggaran'] ?> - Tingkat <?= $pelanggaran['Tingkat'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a class="btn btn-secondary" href="./pages/Violance/violanceMahasiswa.php">Kembali</a>
            </form>
        </div>
    </body>
</html>
