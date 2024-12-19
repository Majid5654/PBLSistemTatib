<div class="container mt-4">
    <h2>REPORTING HISTORY</h2>
    <a class="btn btn-success mt-2" href="../Dosen/pages/violance/createDosen.php">Add Student Violance</a>
    <br><br>
    
    <?php
       $dosen_id = $_SESSION['user_id'];

        include('../../Backend/connect.php'); // Pastikan path ke Connect.php benar
        
        try {
            $query = "SELECT 
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
            sc.Sanction AS Sanksi,  
            pm.Verifikasi
          FROM 
            PelanggaranMahasiswa pm
          JOIN 
            TingkatPelanggaran tp ON pm.Jenis_Pelanggaran = tp.NO
          JOIN 
            Students s ON pm.NIM = s.NIM
          LEFT JOIN 
            Sanctions sc ON pm.Tingkat = sc.Tingkat
          WHERE 
            pm.ID_Pelapor = :dosen_id
"; 
        
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':dosen_id', $dosen_id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error fetching data: " . $e->getMessage());
        }
        ?>

    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>ID Pelanggaran</th>
                <th>Nim</th>
                <th>Jurusan</th>
                <th>Prodi</th>
                <th>Semester</th>
                <th>Class</th>
                <th>Jenis Pelanggaran</th>
                <th>Tingkat</th>
                <th>Sanksi</th> 
                <th>Verifikasi</th> 
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
                <td><?= $row["class"] ?></td>
                <td><?= $row["JenisPelanggaran"] ?></td>
                <td><?= $row["TingkatPelanggaran"] ?></td>
                <td>
                    <?= $row["Verifikasi"] == 1 ? htmlspecialchars($row["Sanksi"]) : 'Not Verified' ?>
                </td>

                <td>
                    
                    <?= $row["Verifikasi"] == 1 ? '<span class="text-success">Verified</span>' : '<span class="text-danger">Not Verified</span>' ?>
                </td>

                <td>
                <a class="btn btn-danger" href="../Dosen/pages/violance/deleteDosen.php?id=<?= $row["ID"] ?>" data-toggle="modal" data-target="#hapusModal<?= $row["ID"] ?>">Hapus</a>
                    <?php if ($row["Verifikasi"] == 0): ?>
                        <a class="btn btn-primary" href="../Dosen/pages/violance/editDosen.php?id=<?= $row["ID"] ?>">Edit</a>
                        
                    <?php else: ?>
                       
                    <?php endif; ?>
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
                            <form action="../Dosen/pages/Violance/deleteDosen.php" method="GET">
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
