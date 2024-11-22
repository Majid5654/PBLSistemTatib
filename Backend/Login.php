<?php
// Include the database connection
include('connect.php');  // This will include the connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve email and password from POST data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // SQL query to fetch user by email
    $sql = "SELECT * FROM dbo.Users WHERE LOWER(email) = LOWER(?)";

    try {
        // Prepare the query
        $stmt = $conn->prepare($sql);

        // Bind the email parameter to the query
        $stmt->bindParam(1, $email, PDO::PARAM_STR);

        // Execute the query
        $stmt->execute();

        // Fetch the user data
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if a user record exists
        if ($user) {
            // Compare the password directly (since it's plain text)
            if ($password === $user['password']) {
                header("Location: ../Frontend/index.php");
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
