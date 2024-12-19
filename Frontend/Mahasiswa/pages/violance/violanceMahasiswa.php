<?php


// Cek apakah pengguna sudah login
if (!isset($_SESSION['email'])) {
    header('Location: ../Frontend/LoginPage.php');
    exit();
}

$nama = $_SESSION['nama'];
$nim = $_SESSION['nim'];

// Include the database connection
include('../../Backend/connect.php');

try {
    // Pre-defined view (assuming it exists) with a safe query
    $query = "SELECT * FROM vw_pelanggaran_mahasiswa
            WHERE Nama = :nama AND NIM = :nim;"; 

    // Prepare and execute the query with parameter binding
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':nama', $nama, PDO::PARAM_STR);
    $stmt->bindParam(':nim', $nim, PDO::PARAM_STR);
    $stmt->execute();

    // Fetch only relevant data
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Error fetching data: " . $e->getMessage());
}
?>

<div class="container mt-4">
    <h2>Data Violance</h2>
    
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
                <th>Jenis Pelanggaran</th>
                <th>Tingkat Pelanggaran</th>
                <th>Verification</th>
                <th>Sanksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Display the query results
            $index = 1;  // Start index at 1
            foreach ($result as $row): 
            ?>
                <tr>
                    <td><?= htmlspecialchars($index++) ?></td>  
                    <td><?= htmlspecialchars($row["Nama"]) ?></td>
                    <td><?= htmlspecialchars($row["ID"]) ?></td>
                    <td><?= htmlspecialchars($row["NIM"]) ?></td>
                    <td><?= htmlspecialchars($row["Jurusan"]) ?></td>
                    <td><?= htmlspecialchars($row["Prodi"]) ?></td>
                    <td><?= htmlspecialchars($row["Semester"]) ?></td>
                    <td><?= htmlspecialchars($row["JenisPelanggaran"]) ?></td>
                    <td><?= htmlspecialchars($row["TingkatPelanggaran"]) ?></td>
                    <td>
                        <?php
                        // Tampilkan status verifikasi dalam format teks
                        if ($row["StatusVerifikasi"] == 1) {
                            echo '<span class="text-success">Verified</span>';
                        } else {
                            echo '<span class="text-danger">Not Verified</span>';
                        }
                        ?>
                    </td>
                    <td>
                    <?= $row["StatusVerifikasi"] == 1 ? htmlspecialchars($row["Sanksi"]) : 'Not Verified' ?>
                </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>