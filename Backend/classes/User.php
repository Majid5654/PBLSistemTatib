<?php
require_once 'Database.php';

class User extends Database {
    public function login($email, $password) {
        try {
            $conn = $this->connect();
            $sql = "SELECT 
                        s.Nama, 
                        s.NIM,
                        s.class,   
                        u.Email, 
                        u.Password, 
                        u.Level,
                        s.UserId AS user_id
                    FROM 
                        Users u
                    INNER JOIN 
                        Students s 
                    ON 
                        u.No = s.UserId
                    WHERE 
                        LOWER(u.Email) = LOWER(:email)";

            $stmt = $conn->prepare($sql);//prepares the SQL query for execution
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);//line binds the PHP variable $email to the placeholder :email in the SQL query. 
            $stmt->execute(); //execute
            $user = $stmt->fetch(PDO::FETCH_ASSOC);//fetches the first row of the result set returned by the query.

            

            if ($user) {
                if (password_verify($password, $user['Password'])) {
                    // Mulai session dan simpan data user ke session
                    session_start();
                    $_SESSION['email'] = $user['Email'];
                    $_SESSION['level'] = $user['Level'];
                    $_SESSION['nama'] = $user['Nama']; 
                    $_SESSION['nim'] = $user['NIM'];
                    $_SESSION['user_id'] = $user['user_id'];
                    $_SESSION['class'] = $user['class']; 
                    
                    
                    // Array untuk menentukan URL redirect berdasarkan level
                    $redirectUrls = [
                        'student' => '../Frontend/Mahasiswa/indexMahasiswa.php',
                        'dosen' => '../Frontend/Dosen/indexDosen.php',
                        'admin' => '../Frontend/Admin/indexAdmin.php',
                        'dpa' => '../Frontend/DPA/indexDPA.php'
                    ];

                    // Cek apakah level ada di array, jika tidak redirect ke halaman default
                    $redirectUrl = $redirectUrls[$user['Level']] ?? '/PBLTatib/PBLSistemTatib/Frontend/Login.php';

                    // Redirect ke halaman sesuai level
                    header("Location: $redirectUrl");
                    exit();
                } else {
                    // Password salah
                    $_SESSION['login_error'] = "Invalid password.";
                    header("Location: /PBLTatib/PBLSistemTatib/Frontend/Login.php");
                    exit();
                    
                }
            } else {
                // User tidak ditemukan
                $_SESSION['login_error'] = "User not found.";
                header("Location: /PBLTatib/PBLSistemTatib/Frontend/Login.php");
                exit();
            }

        } catch (PDOException $e) {
            // Kesalahan server
            $_SESSION['login_error'] = "Server error: " . $e->getMessage();
            header("Location: /PBLTatib/PBLSistemTatib/Frontend/Login.php");
            exit();

            
        }
    }

    public function updatePasswordWithoutHash($email, $newPassword) {
    try {
        $conn = $this->connect(); // Dapatkan koneksi dari kelas Database
        $sql = "UPDATE Users SET Password = :password WHERE Email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':password', $newPassword, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        return $stmt->execute(); // Jalankan query dan kembalikan hasil
    } catch (PDOException $e) {
        // Tangani kesalahan database jika ada
        error_log("Database Error: " . $e->getMessage());
        return false;
    }
}

}
?>
