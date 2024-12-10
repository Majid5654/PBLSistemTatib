<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}
    .printRules {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        margin: 0 auto;
        background: #fefefe; /* Light gray background for contrast */
        padding: 20px;
        width: 1500px;
        margin top: 300px;
    }

    table {
        width: 40%; /* Reduced table width for a smaller design */
        border-collapse: separate; /* Separate borders for cleaner look */
        border-spacing: 0; /* No spacing between cells */
        text-align: left;
        background: #b0b0b0; /* Light gray background for the table */ 
        overflow: hidden; /* Prevent overflow of content */    
    }

    th, td {
        padding: 8px; /* Smaller padding for a compact design */
        border: 1px solid #ddd; /* Subtle borders for a clean look */
        color: #333; /* Dark text for better readability */
    }

    th {
        background: #e0e0e0; /* Slightly darker gray for the header */
        text-align: center;
        font-size: 12px; /* Reduced font size */
        font-weight: bold;
        text-transform: uppercase; /* Uppercase for header text */
        letter-spacing: 0.05em; /* Slight letter spacing for a modern look */
    }

    tr:nth-child(even) {
        background: #b0b0b0; /* Light gray for alternating rows */
    }

    tr:hover {
        background: #eaeaea; /* Slight hover effect */
        transition: background 0.3s; /* Smooth hover transition */
    }

    td {
        font-size: 12px; /* Reduced font size for cells */
        font-weight: normal;
    }

    header .left {
    width: 700px;
}

header .left h1 {
    font-size: 60px;
}

header .left h1 span {
    color: #1e293b;
}

header .left p {
    margin: 40px 0;
    color: #666;
}

#download-icon {
    color: rgb(25, 25, 25);
}

header .left a {
    display: flex;
    align-items: center;
    background: #031224;
    width: 200px;
    padding: 8px;
    border-radius: 60px;
    margin-top: auto;
}

header .left a i {
    background-color: #fff;
    font-size: 24px;
    border-radius: 50%;
    padding: 8px;
}

header .left a span {
    color: #fff;
    margin-left: 10px;
}

header .left p {
    margin-top: 100px; /* Adjust this value to fine-tune the position */
}

header {
    display: flex;
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
    height: 100vh; /* Full viewport height */
    margin-top: -420px;
    margin-bottom: 100px;
}

.left {
    display: flex;
    flex-direction: column; /* Stack elements vertically */
    align-items: center; /* Center items horizontally */
}    
</style>


<?php
    include('../../Backend/Connect.php'); // Ensure the path to Connect.php is correct

    try {
        $query = "SELECT * FROM TingkatPelanggaran";

        // Execute query
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
        // Display query results in a table
        foreach ($result as $index => $row): 
        ?>
            <tr>
                <td><?= htmlspecialchars($row["NO"]) ?></td>
                <td><?= htmlspecialchars($row["Pelanggaran"]) ?></td>
                <td><?= htmlspecialchars($row["Tingkat"]) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<header>
        <div class="left">
            <a href="https://drive.google.com/file/d/1UZR4TV_U2xzeZqUm6LRzmreOhm7I8aTs/view?usp=sharing">
            <i class='bx bx-download' id="download-icon"></i>
                <span>Download PDF</span>
            </a>
        </div>
    </header>