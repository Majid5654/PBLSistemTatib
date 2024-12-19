<?php
// Start the session if it's not already started
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['email'])) {
    header('Location: /PBLTatib/PBLSistemTatib/Frontend/Login.php');
    exit();
}

$nama = $_SESSION['nama']; 
$Level = $_SESSION['level'];// Get the logged-in user's name from session

// Include the database connection
include('../../Backend/connect.php');
?>
<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

.top-container .nav{
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px 20px 14px;
    border-bottom: 2px solid #1e293b;
}

.top-container .nav .logo img{
    display: flex;
    align-items: center;
    gap: 6px;
    width: 105px;  /* Set the width */
    height: auto;  /* Keeps the aspect ratio */
}


.top-container .nav .logo i{
    color: #f1f3f2;
    font-size: 24px;
}

.top-container .nav .logo a{
    font-size: 16px;
}

.top-container .nav .nav-links{
    display: flex;
    gap: 20px;
}

.top-container .nav .nav-links a{
    color: #ccc;
    transition: all 0.3s ease;
}

.top-container .nav .nav-links a:hover{
    color: #fff;
}

.top-container .nav .right-section{
    display: flex;
    align-items: center;
    gap: 10px;
}

.top-container .nav .right-section > i{
    color: #f1f3f2;
    background: #1e293b;
    padding: 12px;
    border-radius: 50%;
    cursor: pointer;
}

.profile {
    display: flex;
    align-items: center;
    background: #1e293b;
    padding: 0 10px;
    border-radius: 50px;
    width: 180px;
    gap: 10px;
    position: relative;
    cursor: pointer;
}

.profile .info {
    display: flex;
    align-items: center;
    gap: 10px;
}

.profile .info img {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    border: 1px solid #f1f3f2;
}

.profile .info a {
    font-size: 13px;
    color: #fff;
    text-decoration: none;
}

.profile .info p {
    font-size: 13px;
    color: #ccc;
}

.profile .dropdown-icon {
    color: #f1f3f2;
    font-size: 22px;
    cursor: pointer;
}

.dropdown-menu {
    position: absolute;
    top: 119%; /* Dropdown appears below the profile section */
    right: 0;
    background: #1e293b;
    border-radius: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    width: 180px;
    display: none; /* Initially hidden */
    flex-direction: column;
    z-index: 1000;
    transition: opacity 0.3s ease, max-height 0.3s ease; 
}

.dropdown-menu a {
    padding: 10px;
    color: #ccc;
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 14px;
}

.dropdown-menu a:hover {
    background: #334155;
    border-radius: 15px;
    color: #fff;
}

.profile:hover .dropdown-menu {
    display: flex; 
}
</style>

<div class="nav">
    <div class="logo">
    <img src="img/logofix.png">
    </div>
    <div class="nav-links">
        <a href="indexMahasiswa.php?page=dashboard">Home</a>
        <a href="indexMahasiswa.php?page=violance">Violance</a>
        <a href="indexMahasiswa.php?page=Service">Services</a>
        <a href="indexMahasiswa.php?page=Rules">Rules</a>
    </div>

    <div class="right-section">
        <div class="profile">
            <div class="info">
                <img src="img/ProfiLe.JPG" alt="Profile Picture">
                <div>
                <a href="#" class="profile-link"><?php echo $_SESSION['nama']; ?></a>
                    <p><?php echo $Level  ?></p>
                </div>
            </div>
            
            <div class="dropdown-menu">
                <a href="indexMahasiswa.php?page=Setting">Change Password</a>
                <a href="../../Backend/Logout.php">Logout</a>
            </div>
        </div>

        </div>
    </div>

<script>
    document.querySelector('.profile').addEventListener('click', function () {
        const dropdownMenu = this.querySelector('.dropdown-menu');
        dropdownMenu.style.display =
            dropdownMenu.style.display === 'flex' ? 'none' : 'flex';
    });

    document.addEventListener('click', function (e) {
        const profile = document.querySelector('.profile');
        if (!profile.contains(e.target)) {
            profile.querySelector('.dropdown-menu').style.display = 'none';
        }
    });
</script>
