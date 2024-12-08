<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <title>Login | TatibSystem</title>
</head>

<body>
    <div class="container" id="container">
        
        <div class="form-container sign-up">
            
            <form action="../Backend/forgotPassword.php" method="POST">
            <h1>Forgot Password</h1>
            <span>Enter your email to receive a verification code</span>
            <input type="email" id="forgot-email" name="forgot-email" placeholder="Email" required>
            <button type="submit">Send Code</button>
        </form>
        </div>


        <div class="form-container sign-in">
            <form action="../Backend/ProcessLogin.php" method="POST">
                <h1>Sign In</h1>
                
                <input type="email" id="email" name="email" placeholder="Email" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
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
        $(document).ready(function() {
    const container = $('#container');
    const signInButton = $('#login');
    const forgotButton = $('#forgot');

    // Event untuk tombol forgot password
    forgotButton.on('click', function() {
        container.addClass('active'); // Tambahkan kelas active untuk transisi ke Sign Up
    });

    // Event untuk tombol Sign In
    signInButton.on('click', function() {
        container.removeClass('active'); // Hapus kelas active untuk kembali ke forgot password
    });
});
</script>

    <script>
        $(document).ready(function() {
            // Elemen-elemen form
            const signInForm = $('.sign-in');
            const forgotPasswordForm = $('.forgot-password');
            const forgotPasswordLink = $('#forgot-password-link');
            const backToLoginLink = $('#back-to-login');
            
            // Show Forgot Password Form when "Forgot Password?" is clicked
            forgotPasswordLink.on('click', function(e) {
                e.preventDefault();  // Prevent default link behavior
                signInForm.hide();  // Sembunyikan form login
                forgotPasswordForm.show();  // Tampilkan form forgot password
            });
            
            // Back to Login Form when "Back to Sign In" is clicked
            backToLoginLink.on('click', function(e) {
                e.preventDefault();  // Prevent default link behavior
                forgotPasswordForm.hide();  // Sembunyikan form forgot password
                signInForm.show();  // Tampilkan form login
            });
        });
    </script>
    
    <script src="./Mahasiswa/assets/js/forgotPassword.js"></script>
    <script src="./assets/js/scriptlogin.js"></script>

</body>

</html>