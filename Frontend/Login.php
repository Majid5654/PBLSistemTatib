<?php
session_start();
require_once '../Backend/classes/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['email'];
    $password = $_POST['password'];

    $user = new User();
    $userData = $user->login($username, $password);

    if ($userData) {
        $_SESSION['user'] = $userData;
        exit;
    } else {
        $_SESSION['login_error'] = "Invalid username or password!";
        header("Location: /PBLTatib/PBLSistemTatib/Frontend/Login.php");
        exit;
    }
}
?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Montserrat', sans-serif;
}

body{
    background-color: #fefefe;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    height: 100vh;
}

.container{
    background-color: #fff;
    border-radius: 30px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
    position: relative;
    overflow: hidden;
    width: 1000px; 
    max-width: 100%;
    min-height: 600px; 
}

.container p{
    font-size: 16px; 
    line-height: 24px;
    letter-spacing: 0.4px;
    margin: 30px 0; 
}

.container span{
    font-size: 14px; 
}

.container a{
    color: #333;
    font-size: 15px; 
    text-decoration: none;
    margin: 20px 0 15px; 
}

.container button{
    background-color: #031224;
    color: #fff;
    font-size: 14px; 
    padding: 15px 60px; 
    border: 1px solid transparent;
    border-radius: 8px;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    margin-top: 15px;
    cursor: pointer;
}

.container button.hidden{
    background-color: transparent;
    border-color: #fff;
}

.container form{
    background-color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 50px; 
    height: 100%;
}

.container input{
    background-color: #eee;
    border: none;
    margin: 12px 0; 
    padding: 12px 20px; 
    font-size: 15px; 
    border-radius: 8px;
    width: 100%;
    outline: none;
}

.form-container{
    position: absolute;
    top: 0;
    height: 100%;
    transition: all 0.6s ease-in-out;
}

.sign-in{
    left: 0;
    width: 50%;
    z-index: 2;
}

.container.active .sign-in{
    transform: translateX(100%);
}

.sign-up{
    left: 0;
    width: 50%;
    opacity: 0;
    z-index: 1;
}

.container.active .sign-up{
    transform: translateX(100%);
    opacity: 1;
    z-index: 5;
    animation: move 0.6s;
}

@keyframes move{
    0%, 49.99%{
        opacity: 0;
        z-index: 1;
    }
    50%, 100%{
        opacity: 1;
        z-index: 5;
    }
}

.social-icons{
    margin: 30px 0; 
}

.social-icons a{
    border: 1px solid #ccc;
    border-radius: 20%;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    margin: 0 5px; 
    width: 50px; 
    height: 50px; 
}

.social-icons :hover{
    background-color: #bcbcbc; 
    color: #e0e0ff; 
    transform: scale(1.1); 
    transition: all 0.3s ease;
}

.toggle-container{
    position: absolute;
    top: 0;
    left: 50%;
    width: 50%;
    height: 100%;
    overflow: hidden;
    transition: all 0.6s ease-in-out;
    border-radius: 150px 0 0 150px;
    z-index: 1000;
}

.container.active .toggle-container{
    transform: translateX(-100%);
    border-radius: 0 100px 100px 0;
}

.toggle{
    background-color: #031224;
    height: 100%;
    background: linear-gradient(to right, #1b1b54, #031224);
    color: #fff;
    position: relative;
    left: -100%;
    height: 100%;
    width: 200%;
    transform: translateX(0);
    transition: all 0.6s ease-in-out;
}

.container.active .toggle{
    transform: translateX(50%);
}

.toggle-panel{
    position: absolute;
    width: 50%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 40px; 
    text-align: center;
    top: 0;
    transform: translateX(0);
    transition: all 0.6s ease-in-out;
}

.toggle-panel.toggle-right h1,
.toggle-panel.toggle-right p {
    text-align: center;
}

.toggle-left{
    transform: translateX(-200%);
}

.container.active .toggle-left{
    transform: translateX(0);
}

.toggle-right{
    right: 0;
    transform: translateX(0);
}

.container.active .toggle-right{
    transform: translateX(200%);
}

.container button:hover {
    background-color: #3333cc; 
    color: #e0e0ff; 
    transform: scale(1.1); 
    transition: all 0.3s ease;
}

.forgot-password {
    display: none; 
    background-color: #fff;
    padding: 30px 60px; 
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
    width: 100%;
    text-align: center;
    animation: fadeIn 0.5s ease-in-out;
}

.forgot-password h1 {
    font-size: 28px; 
    margin-bottom: 30px; 
}

.forgot-password span {
    font-size: 16px; 
    display: block;
    margin-bottom: 25px; 
    color: #666;
}

.forgot-password input {
    width: 85%; 
    padding: 12px;
    margin: 15px 0; 
    font-size: 16px; 
    border: 1px solid #ccc;
    border-radius: 8px;
    outline: none;
    background-color: #f9f9f9;
}

.forgot-password button {
    margin-top: 30px; 
}

.forgot-password a {
    color: #007bff;
    text-decoration: underline;
    cursor: pointer;
    font-size: 16px; 
    margin-top: 20px; 
    display: inline-block;
}

.sign-in {
    display: block;  
}

.container.forgot-active .toggle-container {
    display: none; 
}

.container.forgot-active .toggle-container {
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.5s ease, visibility 0.5s ease;
}

.forgot-password {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 2000; 
    background-color: #fff;
    padding: 30px 60px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
    width: 80%;
    text-align: center;
    display: none; 
    animation: fadeIn 0.5s ease-in-out;
}

/* Sliding animations for the forgot-password form */
.container.forgot-active .form-container.sign-in {
    transform: translateX(-100%);
    opacity: 0;
    visibility: hidden;
    transition: all 0.5s ease-in-out;
}

.container.forgot-active .form-container.sign-up {
    transform: translateX(0%);
    opacity: 1;
    visibility: visible;
    transition: all 0.5s ease-in-out;
}

.container.forgot-active .toggle {
    transform: translateX(-50%);
}

.forgot-password {
    display: block; /* Ensure it's visible when activated */
}

</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Login | TatibSystem</title>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form id="forgot-password-form" action="../Backend/forgotPassword.php" method="POST">
                <h1>Forgot Password</h1>
                <span>Enter your email to receive a verification code</span>
                
                <!-- Peringatan ditempatkan di sini -->
                <p id="error-message" style="color: red; display: none;"></p>
                
                <input type="email" id="forgot-email" name="forgot-email" placeholder="Email" required>
                <button type="submit">Send Code</button>
            </form>
        </div>

        <div class="form-container sign-in">



        <form method="POST" action=" Login.php">
    <h1>Sign In</h1>
    <input type="email" id="email" name="email" placeholder="Email" required>
    <input type="password" id="password" name="password" placeholder="Password" required>
    <p id="login-error-message" style="color: red; display: none;"></p>
    <button type="submit">Sign In</button>
</form>


</div>

        
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello !!!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="forgot">Forgot Password</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Load jQuery before the custom script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
       $(document).ready(function () {
    const container = $('#container');

    // Show Forgot Password form
    $('#forgot').on('click', function () {
        container.addClass('active');
    });

    // Show Sign In form
    $('#login').on('click', function () {
        container.removeClass('active');
    });

    // Handle Forgot Password Form Submission
    $('#forgot-password-form').on('submit', function (e) {
        e.preventDefault();

        const email = $('#forgot-email').val();
        const errorMessage = $('#error-message');

        errorMessage.hide().text("");

        if (!email) {
            errorMessage.text('Email is required.').show();
            return;
        }

        $.ajax({
            url: '../Backend/forgotPassword.php',
            type: 'POST',
            data: { 'forgot-email': email },
            success: function (response) {
                const data = JSON.parse(response);
                if (data.success) {
                    alert('Verification code sent to your email.');
                } else {
                    errorMessage.text(data.message).show();
                }
            },
            error: function () {
                errorMessage.text('An error occurred. Please try again.').show();
            }
        });
    });

    // Show Login Error Message if any (from PHP session)
    const loginError = '<?php echo $_SESSION["login_error"] ?? ""; ?>';
    if (loginError) {
        // Display login error message
        $('#login-error-message').text(loginError).show();
        <?php unset($_SESSION['login_error']); ?>
    }

    // Additional check for invalid email
    const emailError = '<?php echo $_SESSION["email_error"] ?? ""; ?>';
    if (emailError) {
        $('#login-error-message').text(emailError).show();
        <?php unset($_SESSION['email_error']); ?>
    }
});

    </script>
    