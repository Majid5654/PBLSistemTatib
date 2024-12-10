<div class="container mt-4">
    <h2>Student Data</h2>
    <a class="btn btn-success mt-2" href="../Mahasiswa/pages/Violance/createMahasiswa.php">Tambah Data</a>
    <br><br>
    
    <?php
        include('../../Backend/connect.php'); // Pastikan path ke Connect.php benar
        
        try {
            // Query JOIN untuk mengambil data dari tabel Mahasiswa dan PelanggaranMahasiswa
            $query = "SELECT pm.No AS PelanggaranNo,
                pm.ID,
                pm.Nama,
                pm.NIM,
                pm.Jurusan,
                pm.Prodi,
                pm.Semester,
            tp.Pelanggaran AS JenisPelanggaran,
            tp.Tingkat AS TingkatPelanggaran
        FROM PelanggaranMahasiswa pm
        JOIN TingkatPelanggaran tp
            ON pm.Jenis_Pelanggaran = tp.NO;";

            // Eksekusi query
            $result = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error fetching data: " . $e->getMessage());
        }
    ?>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>ID</th>
                <th>Nim</th>
                <th>Jurusan</th>
                <th>Prodi</th>
                <th>Semester</th>
                <th>Jenis Pelanggaran</th>
                <th>Tingkat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // Tampilkan hasil query dalam bentuk tabel
        foreach ($result as $index => $row): 
        ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= $row["Nama"] ?></td>
                <td><?= $row["ID"] ?></td>
                <td><?= $row["NIM"] ?></td>
                <td><?= $row["Jurusan"] ?></td>
                <td><?= $row["Prodi"] ?></td>
                <td><?= $row["Semester"] ?></td>
                <td><?= $row["JenisPelanggaran"] ?></td>
                <td><?= $row["TingkatPelanggaran"] ?></td>
                <td>
                    <a class="btn btn-primary" href="../Mahasiswa/pages/Violance/editMahasiswa.php?id=<?= $row["ID"] ?>">Edit</a>
                    <a class="btn btn-danger" href="../Mahasiswa/pages/Violance/deleteMahasiswa.php?id=<?= $row["ID"] ?>" data-toggle="modal" data-target="#hapusModal<?= $row["ID"] ?>">Hapus</a>

                </td>
            </tr>

            <!-- Modal Hapus -->
            <div class="modal fade" id="hapusModal<?= $row["ID"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?= "Apakah Anda yakin ingin menghapus data dengan nama " . $row["Nama"] . "?" ?>
                        </div>
                        <div class="modal-footer">
                            <!-- Form untuk menghapus data -->
                            <form action="../Mahasiswa/pages/Violance/deleteMahasiswa.php" method="GET">
    <input type="hidden" name="id" value="<?= $row["ID"] ?>">
    <button type="submit" class="btn btn-danger">Hapus</button>
</form>

                            </form>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
