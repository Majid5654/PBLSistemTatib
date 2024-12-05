<?php
    include "../Backend/connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="login.css">
    <title>Modern Login Page | AsmrProg</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            
            
        </div>
        <div class="form-container sign-in">
            <form action="../Backend/ProcessLogin.php" method="POST">
                <h1>Sign In</h1>
                <span>or use your email password</span>
                <input type="email" id="email" name="email" placeholder="Email" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <a href="#">Forget Your Password?</a>
                <button type="submit">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome to PBLTatibSystem!</h1>
                    <p>Enter your personal details to use all of the site's features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Students!</h1>
                    <p>Enter your personal details to use all of the site's features</p>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>
