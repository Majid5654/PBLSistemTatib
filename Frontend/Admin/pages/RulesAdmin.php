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
    background: #f8f9fa; /* Soft white for a clean background */
    padding: 40px; /* Increased padding for breathing room */
    width: 100%; /* Make it responsive */
}

table {
    width: 80%; /* More flexible width for responsiveness */
    max-width: 1200px;
    margin: 0 auto;
    border-collapse: collapse; /* Merge borders for a sleek look */
    background: #ffffff; /* White table background for a clean design */
    border-radius: 20px; /* Rounded corners for a modern feel */
    overflow: hidden; /* Prevent overflow for rounded corners */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Soft shadow for depth */
}

th, td {
    padding: 12px 16px; /* Comfortable padding */
    border: 1px solid #e5e5e5; /* Subtle borders */
    color: #333; /* Dark text for readability */
    font-family: 'Roboto', sans-serif; /* Modern font family */
}

th {
    background: #f3f4f6; /* Soft gray header background */
    text-align: left;
    font-size: 14px; /* Slightly larger header text */
    font-weight: 700; /* Bold headers for emphasis */
    text-transform: capitalize; /* Modern text style */
    letter-spacing: 0.03em; /* Slightly spaced-out letters */
}

tr:nth-child(even) {
    background: #fafafa; /* Light alternate row background */
}

tr:hover {
    background: #f0f0f5; /* Slightly darker hover effect */
    transition: background 0.2s ease; /* Smooth hover transition */
}

td {
    font-size: 14px; /* Comfortable font size */
    font-weight: 400; /* Normal weight for content */
}

header {
    display: flex;
    justify-content: space-between; /* Align content to both sides */
    align-items: center; /* Vertically centered */
    padding: 40px 60px; /* Comfortable padding */
    background: #1e293b; /* Dark modern background */
    color: #fff; /* Contrast with text */
}

header .left {
    max-width: 600px;
}

header .left h1 {
    font-size: 48px; /* Modern large font size */
    font-weight: 700; /* Bold for emphasis */
    margin-bottom: 20px; /* Breathing space */
    line-height: 1.2; /* Improved readability */
}

header .left h1 span {
    color: #3b82f6; /* Bright accent color */
}

header .left p {
    margin: 20px 0;
    color: #e2e8f0; /* Softer white for better contrast */
    font-size: 16px; /* Standard readable size */
    line-height: 1.6; /* Easier to read paragraphs */
}

header .left a {
    display: flex;
    align-items: center;
    background: #3b82f6; /* Accent color for CTA */
    padding: 12px 24px; /* Comfortable padding */
    border-radius: 8px; /* Rounded corners */
    color: #fff;
    text-decoration: none; /* Remove underline */
    font-weight: 600;
    transition: background 0.3s ease;
}

header .left a:hover {
    background: #2563eb; /* Darker accent for hover */
}

header .left a i {
    background-color: #fff;
    color: #3b82f6; /* Accent icon color */
    font-size: 20px;
    border-radius: 50%;
    padding: 8px;
    margin-right: 10px;
}

header .left a span {
    color: #fff; /* Match link text color */
}

.left {
    display: flex;
    flex-direction: column;
    align-items: flex-start; /* Left-align content */
}

@media (max-width: 768px) {
    .printRules {
        padding: 20px; /* Reduce padding for smaller screens */
    }

    table {
        width: 100%; /* Full width for smaller screens */
    }

    header {
        flex-direction: column;
        align-items: flex-start; /* Stack content vertically */
        padding: 20px;
    }

    header .left h1 {
        font-size: 36px; /* Smaller font size */
    }
}


.hero{
    margin-top: 1px;
    height: calc(80vh - 80px);
    padding: 0 60px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 30px;
    background-color: #f5f5f5;
    padding-bottom: -20px;
}

.hero > img{
    max-width: 520px;
    width: 44%;
    border-radius: 26px;
}

.hero .left-section{
    display: flex;
    flex-direction: column;
    gap: 100px;
}

.hero .left-section .top h2{
    font-size: 40px;
    margin-bottom: 24px;
}

.hero .left-section .top p{
    color: #606060;
    font-size: 15px;
    margin-bottom: 24px;
    text-align: justify;
}

.hero .left-section .top .buttons {
    display: flex;
    gap: 8px;
}

.hero .left-section .top .buttons a.doc,
.projects .inner > a,
.contact .items .item a {
    font-size: 16px;
    border: none;
    padding: 5px 20px;
    background-color: #031224;
    color: #fff;
    border: 1px solid #dedede;
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
    text-decoration: none;
    transition: all 0.3s ease;
}

.hero .left-section .top .buttons a.doc i {
    font-size: 26px;
}

.hero .left-section .top .buttons a.doc:hover {
    background: #fff;
    color: #000;
    border-color: #000;
}
</style>


<?php
    include('../../Backend/connect.php'); // Ensure the path to Connect.php is correct

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

<div class="hero">
        <div class="left-section">
            <div class="top">
                <h2>Get the PDF for complete guidelines</h2>
                <p>
                Click the button below to download the PDF, where you’ll find a comprehensive and detailed explanation of the rules, guidelines, and important information designed to help you better understand everything you need to know in a clear and organized manner, ensuring that you have access to all the essential details in one convenient document. 
                </p>

                <div class="buttons">
                <a href="https://drive.google.com/file/d/1UZR4TV_U2xzeZqUm6LRzmreOhm7I8aTs/view?usp=sharing" class="doc" download>
                    Download PDF <i class="ri-file-download-line"></i>
    </a>
</div>
            </div>
        </div>

