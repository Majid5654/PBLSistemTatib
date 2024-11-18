<?php
// Include the database connection
include('connect.php');  // This will include the connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve email and password from POST data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // SQL query to fetch user by email
    $sql = "SELECT * FROM Users WHERE email = ?";
    
    try {
        // Prepare and execute the query
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);

        if ($stmt->rowCount() > 0) {
            // Fetch the user data
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Compare the password directly (since it's plain text)
            if ($password === $user['password']) {
                echo "Login successful! Welcome, " . htmlspecialchars($user['email']);
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
