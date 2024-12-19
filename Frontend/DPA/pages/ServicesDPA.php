<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Customer Service</title>
    <link href="/vendor/bootstrap/bootstrap-icons.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <style>
        .form {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 87vh;
            margin: 0;
            margin-top: 200px;
            margin-bottom: 200px;
        }

        .card {
            justify-content: center;
            width: 100%;
            max-width: 800px;
            background: #f8f9fa;
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .card-title {
            font-size: 1.8rem;
            font-weight: bold;
            color: #333;
        }

        .form-label {
            color: #555;
        }

        .btn-custom {
            background-color: #1e293b;
            border: none;
            color: #fff;
            padding: 10px 20px;
        }

        .btn-custom:hover {
            background-color: #2575fc;
        }

        .error-message {
            font-size: 0.9em;
            color: red;
            margin-top: 5px;
            display: block;
        }
    </style>
</head>

<body>
    <div class="form">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Contact Customer Service</h3>
                <form id="contactForm" action="pages/send_email.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                    </div>
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" placeholder="Enter your NIM">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter your Email">
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter a subject">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4" placeholder="Write your message"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="attachment" class="form-label">Add Picture (Optional)</label>
                        <input type="file" class="form-control" id="attachment" name="attachment">
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-custom btn-lg">Submit Ticket</button>
                    </div>
                </form>
                <div id="responseMessage" class="mt-3"></div> <!-- Feedback message area -->
            </div>
        </div>
    </div>

    <script src="/vendor/bootstrap/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#contactForm').on('submit', function (e) {
                e.preventDefault(); // Prevent default form submission

                let isValid = true;

                // Clear previous error messages
                $('.error-message').remove();

                // Validate each field
                if (!$('#name').val()) {
                    $('#name').after('<span class="error-message">Fill the name</span>');
                    isValid = false;
                }
                if (!$('#nim').val()) {
                    $('#nim').after('<span class="error-message">Fill the NIM</span>');
                    isValid = false;
                }
                if (!$('#email').val()) {
                    $('#email').after('<span class="error-message">Fill the email</span>');
                    isValid = false;
                }
                if (!$('#subject').val()) {
                    $('#subject').after('<span class="error-message">Fill the subject</span>');
                    isValid = false;
                }
                if (!$('#message').val()) {
                    $('#message').after('<span class="error-message">Fill the message</span>');
                    isValid = false;
                }

                // Validate file size
                if ($('#attachment')[0].files.length > 0) {
                    let fileSize = $('#attachment')[0].files[0].size; // Get file size in bytes
                    if (fileSize > 500 * 1024) { // 500 KB = 500 * 1024 bytes
                        $('#attachment').after('<span class="error-message">File size must not exceed 500KB</span>');
                        isValid = false;
                    }
                }

                // If the form is not valid, stop here
                if (!isValid) {
                    return;
                }

                // Proceed with form submission if valid
                let formData = new FormData(this);

                $.ajax({
                    url: 'pages/send_email.php', // URL to send the form data to PHP
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        try {
                            const jsonResponse = typeof response === 'string' ? JSON.parse(response) : response;

                            // Check the response status and display appropriate message
                            if (jsonResponse.status === 'success') {
                                $('#responseMessage')
                                    .removeClass('alert-danger')
                                    .addClass('alert alert-success')
                                    .html('<strong>Success:</strong> ' + jsonResponse.message);

                                // Clear the form fields including file input
                                $('#name, #nim, #subject, #message, #email').val('');
                                $('#attachment').val(''); // Clear file input
                            } else {
                                $('#responseMessage')
                                    .removeClass('alert-success')
                                    .addClass('alert alert-danger')
                                    .html('<strong>Error:</strong> ' + jsonResponse.message);
                            }
                        } catch (error) {
                            $('#responseMessage')
                                .removeClass('alert-success')
                                .addClass('alert alert-danger')
                                .html('<strong>Error:</strong> Invalid response format.');
                        }
                    },
                    error: function (xhr, status, error) {
                        $('#responseMessage')
                            .removeClass('alert-success')
                            .addClass('alert alert-danger')
                            .html('<strong>Error:</strong> An error occurred: ' + error);
                    },
                });
            });
        });
    </script>
</body>

</html>