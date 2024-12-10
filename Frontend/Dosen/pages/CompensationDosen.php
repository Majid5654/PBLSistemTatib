<?php
include '../../../Backend/connect.php';

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT t.id, t.nim, t.subject, t.message, t.attachment_path, t.created_at, s.Nama
            FROM tickets t
            INNER JOIN Students s ON t.nim = s.nim
            ORDER BY t.created_at DESC";


    $stmt = $conn->query($sql);


    $tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    $tickets = [];  
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Tickets</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Ticket List</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NIM</th>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Attachment</th>
                    <th>Date And Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Jika ada tiket, tampilkan di tabel
                if (!empty($tickets)) {
                    foreach ($tickets as $ticket) {
                        echo "<tr>";
                        echo "<td>" . $ticket['id'] . "</td>";
                        echo "<td>" . $ticket['nim'] . "</td>";
                        echo "<td>" . htmlspecialchars($ticket['Nama']) . "</td>";
                        echo "<td>" . htmlspecialchars($ticket['subject']) . "</td>";
                        echo "<td>" . nl2br(htmlspecialchars($ticket['message'])) . "</td>";
                        echo "<td>";

                        // Jika ada attachment, tampilkan link download
                        if ($ticket['attachment_path']) {
                            echo '<a href="' . htmlspecialchars($ticket['attachment_path']) . '" target="_blank">Download</a>';
                        } else {
                            echo 'No attachment';
                        }

                        echo "</td>";
                        echo "<td>" . $ticket['created_at'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>No tickets found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

