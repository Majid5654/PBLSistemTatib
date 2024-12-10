

<style>
        .form {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 87vh;
            margin: 0;
        }

        .card {
            justify-content: center;
            width: 100%;
            max-width: 800px; /* Reduced width for better focus */
            background: #f8f9fa; /* Light gray background for the card */
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 30px; /* Added padding for better spacing */
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
            background-color: #6a11cb;
            border: none;
            color: #fff;
            font-weight: bold;
            padding: 10px 20px;
        }

        .btn-custom:hover {
            background-color: #2575fc;
        }

        a {
            text-decoration: none; /* Remove underline from all links */
            color: inherit; /* Use the same color as text */
        }

        .logo{
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="form">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Contact Customer Service</h3>
                <form action="pages/send_email.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                    </div>
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" placeholder="Enter your NIM" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter a subject" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4" placeholder="Write your message" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="attachment" class="form-label">Add Picture (Optional)</label>
                        <input type="file" class="form-control" id="attachment" name="attachment">
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-custom btn-lg">Submit Ticket</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

=======
<h1>Services Page</h1>

