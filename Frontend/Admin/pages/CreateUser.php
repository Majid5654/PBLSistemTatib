<!-- Button to trigger the first modal -->
<div class="container text-center my-4">
    <button class="btn btn-primary" data-toggle="modal" data-target="#registerModal1">Create User</button>
    <button class="btn btn-primary ml-2" data-toggle="modal" data-target="#registerModal2">Change Password</button>
</div>

<!-- Modal 1 for user registration -->
<div class="modal fade" id="registerModal1" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel1">Create User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for user registration -->
                <form action="../../Frontend/Admin/pages/ProsesCreateUser.php" method="POST">
                    <div class="form-group">
                        <label for="email1">Email:</label>
                        <input type="email" class="form-control" id="email1" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="password1">Password:</label>
                        <input type="password" class="form-control" id="password1" name="password" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Password must be at least 8 characters long and include letters and numbers.">
                        <small class="form-text text-danger" id="passwordError1" style="display:none;">Password must be at least 8 characters and include letters and numbers.</small>
                    </div>

                    <div class="form-group">
                        <label for="level1">Level:</label>
                        <select id="level1" name="level" class="form-control" required>
                            <option value="admin">Admin</option>
                            <option value="student">Student</option>
                            <option value="dosen">Dosen</option>
                            <option value="dpa">dpa</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block mt-3">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal 2 for updating password -->
<div class="modal fade" id="registerModal2" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel2">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form to update user password -->
                <form action="../../Frontend/Admin/pages/ProsesUpdatePassword.php" method="POST" id="passwordChangeForm">
                    <div class="form-group">
                        <label for="email2">Email:</label>
                        <input type="email" class="form-control" id="email2" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="newPassword">New Password</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Password must be at least 8 characters long and include letters and numbers.">
                        <small class="form-text text-danger" id="passwordError" style="display:none;">Password must be at least 8 characters and include letters and numbers.</small>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block mt-3">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Link to Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        $('#newPassword').on('input', function () {
            var password = $(this).val();
            var errorMessage = $('#passwordError');
            if (!password.match(/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/)) {
                errorMessage.show();
            } else {
                errorMessage.hide();
            }
        });

        $('#passwordChangeForm').submit(function (event) {
            var password = $('#newPassword').val();
            if (!password.match(/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/)) {
                event.preventDefault(); // Prevent form submission
                $('#passwordError').show(); // Show error message
            }
        });
    });
</script>
