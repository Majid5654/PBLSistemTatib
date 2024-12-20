<?php
// Start the session if it's not already started
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['email'])) {
    header('Location: ../Frontend/LoginPage.php');
    exit();
}

$nama = $_SESSION['nama']; 
$Level = $_SESSION['level'];// Get the logged-in user's name from session

// Include the database connection
include('../../Backend/connect.php');
?>

<div class="nav">
    <div class="logo">
        <i class='bx bxl-codepen'></i>
        <a href="#">TatibSystem</a>
    </div>
    <div class="nav-links">
        <a href="index.php?page=dashboard">Home</a>
        <div class="dropdown">
            <a href="index.php?page=violance">Violance</a>
            <div class="dropdown-menu">
                <a href="index.php?page=violance-sub1">Sub-link 1</a>
                <a href="index.php?page=violance-sub2">Sub-link 2</a>
            </div>
        </div>
        <a href="index.php?page=Attendance">Attendance</a>
        <a href="index.php?page=Services">Services</a>
        <a href="index.php?page=Rules">Rules</a>
    </div>
    <div class="right-section">
        <div class="profile">
            <div class="info">
                <img src="img/Profile.JPG">
                <div>
                <a href="#" class="profile-link"><?php echo $_SESSION['nama']; ?></a>
                <p><?php echo $Level  ?></p>
                </div>
            </div>
            <i class='bx bx-chevron-down'></i>
        </div>
    </div>
</div>
