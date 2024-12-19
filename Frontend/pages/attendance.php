<style>
        body {
            background-color: #f8f9fc;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        .btn-primary {
            background-color: #4c6ef5;
            border-color: #4c6ef5;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Form Section -->
    <div class="card p-4 mb-4">
        <div class="row g-3">
            <div class="col-md-4">
                <label for="subject" class="form-label">Subject</label>
                <select class="form-select" id="subject">
                    <option selected>Advance Java</option>
                    <option>Database Systems</option>
                    <option>Web Development</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="section" class="form-label">Section</label>
                <select class="form-select" id="section">
                    <option selected>A</option>
                    <option>B</option>
                    <option>C</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" value="2023-03-15">
            </div>
        </div>
        <div class="mt-3 text-end">
        <button type="button" class="btn btn-dark">Generate Sheet</button>
        </div>
    </div>

    <!-- Attendance Table -->
    <div class="card p-4">
        <h4 class="mb-3">Attendance Sheet</h4>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox">
                        </th>
                        <th>#</th>
                        <th>Student Name</th>
                        <th>Student ID</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>1</td>
                        <td>Erwan Majid</td>
                        <td>#2123123</td>
                        <td>Present</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>2</td>
                        <td>Erwan Majid</td>
                        <td>#2123123</td>
                        <td>Present</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>3</td>
                        <td>Erwan Majid</td>
                        <td>#2123123</td>
                        <td>Present</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-3 text-end">
        <button type="button" class="btn btn-dark">Submit</button>
        </div>
    </div>

</div>