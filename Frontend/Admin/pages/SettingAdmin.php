

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
<!-- Assuming you're using Bootstrap for modals and styles -->

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Updated Form with jQuery validation -->
<div class="hero">
    <div class="left-section">
        <div class="top">
            <h2>Change Your Password</h2>
            <p>
                Design and code beautifully simple projects without overwhelming yourself with complexity. Enjoy
                your
                passion for creating with ease and love.
            </p>

           
            <form action="/PBLTatib/PBLSistemTatib/Frontend/Admin/pages/changeAdmin.php" method="post" class="contact-form" id="passwordChangeForm">
                <input type="text" name="password" placeholder="New Password" required id="newPassword">
                <span id="passwordError" class="text-danger" style="display: none;">Password must be at least 8 characters and include letters and numbers.</span>
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

    <img src="img/Desk.png">
</div>

<script>
    $(document).ready(function() {
        $('#passwordChangeForm').submit(function(event) {
            // Prevent form submission
            event.preventDefault();
            
            // Validate password
            var password = $('#newPassword').val();
            var regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

            if (!regex.test(password)) {
                $('#passwordError').show();
            } else {
                $('#passwordError').hide();
                // Submit form via AJAX or regular form submission
                this.submit();
            }
        });
    });
</script>
