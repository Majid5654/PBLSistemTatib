<?php
include('connect.php');  // This will include the connection file
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Users WHERE LOWER(Email) = LOWER(?)";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user) {
            if ($password === $user['Password']) {
                $Level = $user['Level'];

                if($Level === 'student') {
                    header("Location: ../Frontend/index.php");
                    $_SESSION['username'] = $username;
                }
                elseif ($Level === 'admin'){
                    header("Location: ../Backend/index.php");
                }

            } else {
                echo "Invalid password.";
            }
        } else {
            echo "User not found.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
