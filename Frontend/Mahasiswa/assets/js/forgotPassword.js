$(document).ready(function () {
    // Elemen-elemen form
    const signInForm = $('.sign-in');
    const forgotPasswordForm = $('.forgot-password');
    const forgotPasswordLink = $('#forgot-password-link');
    const backToLoginLink = $('#back-to-login');
    const container = $('.container'); // Kontainer utama
    
    // Show Forgot Password Form when "Forgot Password?" is clicked
    forgotPasswordLink.on('click', function (e) {
        e.preventDefault(); // Prevent default link behavior
        signInForm.hide(); // Sembunyikan form login
        forgotPasswordForm.show(); // Tampilkan form forgot password
        container.addClass('forgot-active'); // Tambahkan class untuk efek
    });

    // Back to Login Form when "Back to Sign In" is clicked
    backToLoginLink.on('click', function (e) {
        e.preventDefault(); // Prevent default link behavior
        forgotPasswordForm.hide(); // Sembunyikan form forgot password
        signInForm.show(); // Tampilkan form login
        container.removeClass('forgot-active'); // Hapus class efek
    });
});
