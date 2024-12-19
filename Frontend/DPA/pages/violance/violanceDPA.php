<?php
include('../../Backend/connect.php'); // Pastikan path ke Connect.php benar
$sessionClass = $_SESSION['class'] ?? null;
?>

<?php
include('../../Backend/connect.php'); // Pastikan path ke Connect.php benar
$sessionClass = $_SESSION['class'] ?? null;

if (!$sessionClass) {
    echo "<div class='alert alert-danger'>Kelas tidak ditemukan dalam sesi. Silakan login kembali.</div>";
    exit;
}
?>

<div class="container mt-4">
    <h2>List Violance Class <?php echo htmlspecialchars($sessionClass); ?></h2>

    <br><br>

    <?php
    try {
        // aggregate function
        $query = "SELECT 
            pm.No AS PelanggaranNo,
            pm.ID,
            pm.Nama,
            pm.NIM,
            pm.Jurusan,
            pm.Prodi,
            pm.Semester,
            tp.Pelanggaran AS JenisPelanggaran,
            tp.Tingkat AS TingkatPelanggaran,
            s.class AS Class,
            pm.Verifikasi AS StatusVerifikasi,
            COALESCE(sc.Sanction, 'Tidak Ada Sanksi') AS Sanksi,
            COUNT(*) OVER (PARTITION BY pm.NIM) AS TotalPelanggaran,
            ROW_NUMBER() OVER (PARTITION BY pm.NIM ORDER BY pm.No DESC) AS PelanggaranTerbaru
        FROM 
            PelanggaranMahasiswa pm
        JOIN 
            TingkatPelanggaran tp ON pm.Jenis_Pelanggaran = tp.NO
        JOIN 
            Students s ON pm.NIM = s.NIM
        LEFT JOIN 
            Sanctions sc ON tp.Tingkat = sc.Tingkat
        WHERE 
            s.class = :class
        ORDER BY 
            pm.NIM, PelanggaranTerbaru;";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':class', $sessionClass, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("<div class='alert alert-danger'>Error fetching data: " . htmlspecialchars($e->getMessage()) . "</div>");
    }
    ?>

    <?php if (empty($result)): ?>
        <div class="alert alert-warning">Tidak ada data pelanggaran ditemukan untuk kelas ini.</div>
    <?php else: ?>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>ID</th>
                    <th>NIM</th>
                    <th>Jurusan</th>
                    <th>Prodi</th>
                    <th>Semester</th>
                    <th>Kelas</th>
                    <th>Jenis Pelanggaran</th>
                    <th>Tingkat</th>
                    <th>Status</th>
                    <th>Sanksi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($result as $index => $row): ?>
                <tr>
                    <td><?= htmlspecialchars($index + 1) ?></td>
                    <td><?= htmlspecialchars($row["Nama"]) ?></td>
                    <td><?= htmlspecialchars($row["ID"]) ?></td>
                    <td><?= htmlspecialchars($row["NIM"]) ?></td>
                    <td><?= htmlspecialchars($row["Jurusan"]) ?></td>
                    <td><?= htmlspecialchars($row["Prodi"]) ?></td>
                    <td><?= htmlspecialchars($row["Semester"]) ?></td>
                    <td><?= htmlspecialchars($row["Class"]) ?></td>
                    <td><?= htmlspecialchars($row["JenisPelanggaran"]) ?></td>
                    <td><?= htmlspecialchars($row["TingkatPelanggaran"]) ?></td>
                    <td>
                        <?php if ($row["StatusVerifikasi"] == 1): ?>
                            <span class="text-success">Verified</span>
                        <?php else: ?>
                            <span class="text-danger">Not Verified</span>
                        <?php endif; ?>
                    </td>
                    <td><?= $row["StatusVerifikasi"] == 1 ? htmlspecialchars($row["Sanksi"]) : 'Not Verified' ?></td>
                    <td>
                <a class="btn btn-danger" href="../DPA/pages/violance/deleteDPA.php?id=<?= $row["ID"] ?>" data-toggle="modal" data-target="#hapusModal<?= $row["ID"] ?>">Hapus</a>
                    <?php if ($row["StatusVerifikasi"] == 0): ?>
                        <a class="btn btn-primary" href="../DPA/pages/violance/editDPA.php?id=<?= $row["ID"] ?>">Edit</a>
                        
                    <?php else: ?>
                       
                    <?php endif; ?>
                </td>
                </tr>

                <!-- Modal Hapus -->
                <div class="modal fade" id="hapusModal<?= htmlspecialchars($row["ID"]) ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapus<?= htmlspecialchars($row["ID"]) ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Konfirmasi Hapus</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah Anda yakin ingin menghapus data dengan nama <?= htmlspecialchars($row["Nama"]) ?>?
                            </div>
                            <div class="modal-footer">
                                <form action="../DPA/pages/Violance/deleteDPA.php" method="POST">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($row["ID"]) ?>">
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

