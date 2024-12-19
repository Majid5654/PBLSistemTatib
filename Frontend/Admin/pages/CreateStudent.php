<?php
include('../../../Backend/connect.php');

// Ambil ID dari URL
$userId = isset($_GET['id']) ? $_GET['id'] : null;
if (!$userId) {
    die("ID pengguna tidak ditemukan!");
}

// Query untuk mengambil data user berdasarkan ID
$stmt = $conn->prepare("SELECT Email FROM Users WHERE No = :userId");
$stmt->bindParam(':userId', $userId);
$stmt->execute();
$user = $stmt->fetch();

if (!$user) {
    die("User tidak ditemukan!");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengisian Data User</title>
</head>
<style>
     body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    background-color: #f9f9f9;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    display: flex;
    max-width: 880px; /* Reduced width */
    width: 100%;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    overflow: hidden;
}

.form-section {
    flex: 1;
    padding: 40px; /* Reduced padding */
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.form-section h1 {
    font-size: 1.5rem; /* Reduced font size */
    margin-bottom: 10px; /* Reduced spacing */
    color: #222;
}

.form-section p {
    color: #666;
    font-size: 0.8rem; /* Smaller text */
    margin-bottom: 20px; /* Reduced spacing */
}

.form-group {
    margin-bottom: 10px; /* Reduced spacing between form groups */
}

label {
    display: block;
    margin-bottom: 4px; /* Smaller spacing for labels */
    font-size: 0.8rem; /* Smaller font size */
    color: #333;
}

input[type="text"],
input[type="email"] {
    width: 100%;
    padding: 8px; /* Reduced padding */
    font-size: 0.9rem; /* Slightly smaller font */
    border: 1px solid #ccc;
    border-radius: 4px;
    outline: none;
}

input[readonly] {
    background-color: #e9ecef;
    cursor: not-allowed;
}

button {
    width: 104.3%;
    padding: 10px; /* Slightly smaller padding */
    font-size: 0.9rem; /* Smaller button text */
    background-color: #031224;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}

.image-section {
    flex: 1;
    background-color: #fbfbfb;
    display: flex;
    align-items: center;
    justify-content: center;
}

.image-section img {
    width: 90%; /* Slightly smaller image */
    height: auto;
    object-fit: cover;
}


</style>
<body>
    <div class="form">
        <div class="card">
            <h2 class="card-title">Form Pengisian Data User</h2>
            <form action="process_student.php" method="POST">
                <div class="form-group">
                    <label for="nim">NIM / NIP :</label>
                    <input type="text" name="nim" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nama">Name:</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="jurusan">Major:</label>
                    <input type="text" name="jurusan" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="prodi">Study Program:</label>
                    <input type="text" name="prodi" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="semester">Semester:</label>
                    <input type="text" name="semester" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="class">class:</label>
                    <input type="text" name="class" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($user['Email']); ?>" readonly>
                </div>
                
                <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($userId); ?>"> <!-- Menyimpan UserId -->
                <button type="submit" class="btn btn-custom btn-block">Save Data User</button>
            </form>
        </div>
    </div>
</body>
</html>
