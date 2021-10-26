<?php

require_once('config.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>User Registration</title>
    <link rel="stylesheet" type="text/css" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    <div class="container vh-100">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div>
                <div class="d-flex justify-content-center mb-4">
                    <h1>Sign Up</h1>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form action="registration.php" method="post">
                        <label for="username"><b>Username</b></label>
                        <!-- <input class="form-control" id="username" type="text" name="username" required> -->
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text h-100 rounded-0"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="username" id="username" class="form-control rounded-0 input_user" required>
                        </div>
                        <label for="email"><b>Email</b></label>
                        <!-- <input class="form-control" id="email" type="email" name="email" required> -->
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text h-100 rounded-0"><i class="fas fa-at"></i></span>
                            </div>
                            <input type="email" name="email" id="email" class="form-control rounded-0 input_user" required>
                        </div>
                        <label for="password"><b>Password</b></label>
                        <!-- <input class="form-control" id="password" type="password" name="password" required> -->
                        <div class="input-group mb-4">
                            <div class="input-group-append">
                                <span class="input-group-text h-100 rounded-0"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" id="password" class="form-control rounded-0 input_user" required>
                        </div>
                        <input class="btn btn-primary w-100" type="submit" id="signup" name="button" value="Sign Up">
                    </form>
                </div>
            </div>
        </div>

    </div>
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $('#signup').click(function(e) {
                var valid = this.form.checkValidity();
                if (valid) {
                    var username = $('#username').val();
                    var email = $('#email').val();
                    var password = $('#password').val();
                    e.preventDefault();
                    $.ajax({
                        type: 'POST',
                        url: 'newuser.php',
                        data: {
                            username: username,
                            email: email,
                            password: password
                        },
                        success: function(data) {
                            Swal.fire({
                                'title': 'Successful',
                                'text': data,
                                'icon': 'success'
                            })
                        },
                        error: function(data) {
                            Swal.fire({
                                'title': 'Errors',
                                'text': 'There were errors while saving the data.',
                                'icon': 'error'
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
