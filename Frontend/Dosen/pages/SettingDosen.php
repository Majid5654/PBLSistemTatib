<style>
    .hero{
    margin-top: 80px;
    height: calc(100vh - 80px);
    padding: 0 60px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 30px;
}

.hero > img{
    max-width: 520px;
    width: 44%;
    border-radius: 26px;
}

.hero .left-section{
    display: flex;
    flex-direction: column;
    gap: 100px;
}

.hero .left-section .top h2{
    font-size: 44px;
    margin-bottom: 24px;
}

.hero .left-section .top p{
    color: #606060;
    font-size: 18px;
    margin-bottom: 24px;
    text-align: justify;
}

.hero .left-section .top .buttons{
    display: flex;
    gap: 8px;
}

.hero .left-section .top .buttons button,
.projects .inner > button,
.contact .items .item button{
    font-size: 16px;
    border: none;
    padding: 5px 20px;
    background: #fff;
    border: 1px solid #dedede;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.hero .left-section .top .buttons button i{
    font-size: 26px;
}

.hero .left-section .top .buttons button.doc,
.contact .items .item button{
    background: #000;
    color: #fff;
}

.hero .left-section .top .buttons button.git:hover{
    background: #000;
    color: #fff;
    border-color: transparent;
}

.hero .left-section .bottom p{
    font-size: 14px;
    color: #606060;
    margin-bottom: 10px;
}

.hero .left-section .bottom .icons{
    margin-left: 10px;
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 20px;
    cursor: pointer;
    width: fit-content;
}
.contact-form {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-bottom: 20px; /* Space below the form */
}

.contact-form input,
.contact-form textarea {
    font-size: 16px;
    padding: 10px;
    border: 1px solid #dedede;
    border-radius: 8px;
    width: 100%;
    box-sizing: border-box;
}

.contact-form textarea {
    resize: none; /* Prevent resizing */
}

.contact-form .form-submit {
    font-size: 16px;
    background-color: #031224;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s ease;
}

.contact-form .form-submit:hover {
    background-color: #1e293b;
}

</style>
    <div class="hero">
        <div class="left-section">
            <div class="top">
                <h2>Change Your Password</h2>
                <p>
                    Design and code beautifully simple projects without overwhelming yourself with complexity. Enjoy
                    your passion for creating with ease and love.
                </p>

                <!-- New Form Section -->
                <form action="pages/changeDosen.php" method="post" class="contact-form" onsubmit="return validatePassword()">
                    <input type="text" id="password" name="Password" placeholder="New Password" required>
                    <span id="error-message" style="color: red; font-size: 14px;"></span>
                    <button type="submit" class="form-submit">Submit</button>
                </form>

            </div>
            <div class="bottom">
                <div class="icons">
                    <i class="ri-youtube-line"></i>
                    <i class="ri-twitter-x-line"></i>
                    <i class="ri-linkedin-box-line"></i>
                    <i class="ri-instagram-line"></i>
                </div>
            </div>
        </div>

        <img src="img/Desk.png" alt="Desk">
    </div>

    <script>
        function validatePassword() {
            const passwordInput = document.getElementById('password').value;
            const errorMessage = document.getElementById('error-message');

            // Check if password is at least 8 characters long
            if (passwordInput.length < 8) {
                errorMessage.textContent = "Password must be at least 8 characters long.";
                return false; // Prevent form submission
            }

            // Check if password contains at least one number
            if (!/\d/.test(passwordInput)) {
                errorMessage.textContent = "Password must contain numbers.";
                return false; // Prevent form submission
            }

            errorMessage.textContent = ""; // Clear error message
            return true; // Allow form submission
        }
    </script>

