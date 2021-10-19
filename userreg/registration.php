<?php

require_once('config.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>User Registration</title>
    <link rel="stylesheet" type="text/css" href="../node_modules/bootstrap/dist/css/bootstrap-grid.min.css">
</head>

<body>

    <div>
        <?php

        ?>
    </div>

    <div>
        <form action="registration.php" method="post">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <h1>Registration</h1>
                        <p>Fill up the form with correct values.</p>
                        <hr class="mb-3">
                        <label for="username"><b>Username</b></label>
                        <input class="form-control" id="username" type="text" name="username" required>
                        <label for="email"><b>Email</b></label>
                        <input class="form-control" id="email" type="email" name="email" required>
                        <label for="password"><b>Password</b></label>
                        <input class="form-control" id="password" type="password" name="password" required>
                        <hr class="mb-3">
                        <input class="btn btn-primary" type="submit" id="register" name="create" value="Sign Up">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $('#register').click(function(e) {
                var valid = this.form.checkValidity();
                if (valid) {
                    var username = $('#username').val();
                    var email = $('#email').val();
                    var password = $('#password').val();
                    e.preventDefault();
                    $.ajax({
                        type: 'POST',
                        url: 'process.php',
                        data: {
                            username: username,
                            email: email,
                            password: password
                        },
                        success: function(data) {
                            Swal.fire({
                                'title': 'Successful',
                                'text': data,
                                'type': 'success'
                            })
                        },
                        error: function(data) {
                            Swal.fire({
                                'title': 'Errors',
                                'text': 'There were errors while saving the data.',
                                'type': 'error'
                            })
                        }
                    });
                } else {

                }
            });
        });
    </script>
</body>

</html>
