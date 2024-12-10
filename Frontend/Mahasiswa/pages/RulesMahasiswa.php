<style>
    .printRules {
        display: flex; /* Use Flexbox */
        align-items: center; /* Center vertically */
        justify-content: center; /* Center horizontally */
        min-height: 100vh; /* Full-height container */
        margin: 0 auto; /* Center horizontally with auto margins */
    }

    table {
        width: 80%; /* Set table width as needed */
        border-collapse: collapse;
        text-align: left;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 10px;
    }

    th {
        background-color: #f2f2f2;
        text-align: center;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
</style>

    
    
    <?php
        include('../../Backend/Connect.php'); // Pastikan path ke Connect.php benar
        
        try {
            
            $query = "SELECT * FROM TingkatPelanggaran";

            // Eksekusi query
            $result = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            die("Error fetching data: " . $e->getMessage());
        }
    ?>
    <div class="printRules">
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>No.</th>
                <th>Pelanggaran</th>
                <th>Tingkat</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // Tampilkan hasil query dalam bentuk tabel
        foreach ($result as $index => $row): 
        ?>
            <tr>
                
                <td><?= $row["NO"] ?></td>
                <td><?= $row["Pelanggaran"] ?></td>
                <td><?= $row["Tingkat"] ?></td>
        
                
            </tr>

            
        <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    