<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pengguna</title>
</head>
<body>
    <h2>Form Registrasi Pengguna</h2>
    
    <!-- Form untuk menginputkan data username, email, dan level -->
    <form action="ProsesCreateUser.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="level">Level:</label>
        <select id="level" name="level" required>
            <option value="admin">Admin</option>
            <option value="student">Student</option>
            <option value="dosen">Dosen</option>
        </select><br><br>
        
        <button type="submit">Daftar</button>
    </form>
</body>
</html>
