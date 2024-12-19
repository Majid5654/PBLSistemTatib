<?php
include '../../Backend/connect.php'; // Pastikan path ke connect.php benar

try {
    // Query untuk mengambil data email_logs
    $query = "SELECT id, name, nim, email, subject, message, gmail_link, created_at 
              FROM email_logs 
              ORDER BY id ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching data: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Logs</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        .printRules {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 50px auto;
            background: #fefefe;
            padding: 20px;
            width: 90%;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #e0e0e0;
        }

        th,
        td {
            padding: 12px;
            border: 2px solid white;
            text-align: center;
            font-size: 14px;
            color: #333;
        }

        th {
            background: #1e293b; /* Slightly bright dark red */
            text-transform: uppercase;
            font-weight: bold;
            text-align: center;
            color: white;
        }

        tr:nth-child(even) {
            background: #d0d0d0;
        }

        tr:hover {
            background: #f1f1f1;
            transition: background 0.3s;
        }

        .btn-mini {
            background: #007bff;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            border: none;
            font-size: 12px;
            text-decoration: none;
            text-align: center;
            display: inline-block;
            cursor: pointer;
        }

        .btn-mini:hover {
            background: #0056b3;
            text-decoration: none;
        }

        .delete-button {
            background-color: #B22222; /* Slightly bright dark red */
        }

        .delete-button:hover {
            background-color: #8B0000;
        }
    </style>
    <!-- Tambahkan SweetAlert (Opsional) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="printRules">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>NIM</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($result)) : ?>
                    <?php foreach ($result as $row) : ?>
                        <tr id="row-<?php echo htmlspecialchars($row['id']); ?>" data-id="<?php echo htmlspecialchars($row['id']); ?>">
                            <td><?= htmlspecialchars($row['id']) ?></td>
                            <td><?= htmlspecialchars($row['name']) ?></td>
                            <td><?= htmlspecialchars($row['nim']) ?></td>
                            <td><?= htmlspecialchars($row['email']) ?></td>
                            <td><?= htmlspecialchars($row['subject']) ?></td>
                            <td><?= nl2br(htmlspecialchars($row['message'])) ?></td>
                            <td><?= htmlspecialchars($row['created_at']) ?></td>
                            <td>
                                <button class="btn-mini delete-button" data-id="<?= htmlspecialchars($row['id']) ?>">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="9" style="text-align: center;">No logs found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script>
        function deleteRow(id) {
            // SweetAlert Konfirmasi
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#B22222',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const formData = new FormData();
                    formData.append('delete_id', id);

                    fetch('assets/php/deleteRow.php', { // Pastikan path ke deleteRow.php benar
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            Swal.fire(
                                'Dihapus!',
                                data.message,
                                'success'
                            );
                            // Menghapus baris dari tabel
                            const row = document.querySelector(`tr[data-id="${id}"]`);
                            if (row) row.remove();
                        } else {
                            Swal.fire(
                                'Error!',
                                data.message,
                                'error'
                            );
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire(
                            'Error!',
                            'Terjadi kesalahan saat menghapus record.',
                            'error'
                        );
                    });
                }
            });
        }

        // Attach event listeners to delete buttons
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.delete-button');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const id = this.getAttribute('data-id');
                    deleteRow(id);
                });
            });
        });
    </script>
</body>

</html>