<?php
include('../../Backend/connect.php'); // Pastikan path benar

try {
     //CTE  :  common table expression
    $query = "
    WITH PelanggaranDetails AS (
        SELECT 
            pm.No AS PelanggaranNo,
            pm.ID,
            pm.Nama,
            pm.NIM,
            pm.Jurusan,
            pm.Prodi,
            pm.Semester,
            s.class AS class,
            tp.Pelanggaran AS JenisPelanggaran,
            tp.Tingkat AS TingkatPelanggaran,
            pm.Verifikasi,
            sc.Sanction AS Sanksi
        FROM PelanggaranMahasiswa pm
        INNER JOIN TingkatPelanggaran tp ON pm.Jenis_Pelanggaran = tp.NO
        INNER JOIN Students s ON pm.NIM = s.NIM
        LEFT JOIN Sanctions sc ON pm.Tingkat = sc.Tingkat
    )
    SELECT 
        PelanggaranNo, 
        Nama, 
        ID,
        NIM, 
        Jurusan, 
        Prodi, 
        Semester, 
        class, 
        JenisPelanggaran, 
        TingkatPelanggaran, 
        Verifikasi, 
        COALESCE(Sanksi, 'Tidak Ada Sanksi') AS Sanksi
    FROM PelanggaranDetails;
    ";

    // Eksekusi query
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching data: " . $e->getMessage());
}
?>

<!-- HTML Tabel -->
<div class="container mt-4">
    <h2>List Violance Student </h2>
    <br><br>
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>ID</th>
                <th>NIM</th>
                <th>Jurusan</th>
                <th>Prodi</th>
                <th>Semester</th>
                <th>Class</th>
                <th>Jenis Pelanggaran</th>
                <th>Tingkat</th>
                <th>Verification</th>
                <th>Sanksi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($result as $index => $row): ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= htmlspecialchars($row["Nama"]) ?></td>
                <td><?= htmlspecialchars($row["ID"]) ?></td>
                <td><?= htmlspecialchars($row["NIM"]) ?></td>
                <td><?= htmlspecialchars($row["Jurusan"]) ?></td>
                <td><?= htmlspecialchars($row["Prodi"]) ?></td>
                <td><?= htmlspecialchars($row["Semester"]) ?></td>
                <td><?= htmlspecialchars($row["class"]) ?></td>
                <td><?= htmlspecialchars($row["JenisPelanggaran"]) ?></td>
                <td><?= htmlspecialchars($row["TingkatPelanggaran"]) ?></td>
                <td><?= $row["Verifikasi"] ? "Verified" : "Not Verified" ?></td>
                <td><?= $row["Verifikasi"] ? htmlspecialchars($row["Sanksi"]) : "Not Verified" ?></td>
                <td>
                    <!-- Tombol Aksi -->
                    <?php if ($row["Verifikasi"] == 0): ?>
                        <a class="btn btn-primary" href="../Admin/pages/violance/editAdmin.php?id=<?= $row["ID"] ?>">Edit</a>
                        
                    <?php else: ?>
                       
                    <?php endif; ?>
                    <a class="btn btn-primary btn-sm" href="../Admin/pages/Violance/deleteAdmin.php?id=<?= $row["ID"] ?>">Hapus</a>
                    

                    <?php if (!$row["Verifikasi"]): ?>
                        <form action="/PBLTatib/PBLSistemTatib/Frontend/Admin/pages/Violance/verify.php" method="POST" enctype="multipart/form-data" style="display: inline-block;">
                            <input type="hidden" name="id" value="<?= $row["ID"] ?>">
                            <input type="file" name="verification_file" required>
                            <button type="submit" class="btn btn-success btn-sm">Verify</button>
                        </form>
                    <?php else: ?>
                        <button class="btn btn-secondary btn-sm" disabled>Verified</button>
                    <?php endif; ?>
                </td>
            </tr>

            <!-- Modal Konfirmasi Hapus -->
            <div class="modal fade" id="hapusModal<?= $row["ID"] ?>" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel<?= $row["ID"] ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="hapusModalLabel<?= $row["ID"] ?>">Konfirmasi Hapus</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin menghapus data dengan nama <strong><?= htmlspecialchars($row["Nama"]) ?></strong>?
                        </div>
                        <div class="modal-footer">
                            <form action="../Admin/pages/Violance/deleteAdmin.php" method="GET">
                                <input type="hidden" name="id" value="<?= $row["ID"] ?>">
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
</div>
