<?php
session_start();

if (isset($_SESSION['userlogin'])) {
    header("Location: index.php");
}


?>
<!DOCTYPE html>
<html>

<head>
    <title>Programming Knowledge Login</title>
    <link rel="stylesheet" type="text/css" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
    <div class="container vh-100">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center mb-4">
                    <h1>Login</h1>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form>
                        <label for="username"><b>Username</b></label>
                        <!-- <input class="form-control" id="username" type="text" name="username" required> -->
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text h-100 rounded-0"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="username" id="username" class="form-control rounded-0 input_user" required>
                        </div>
                        <label for="password"><b>Password</b></label>
                        <!-- <input class="form-control" id="password" type="password" name="password" required> -->
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text h-100 rounded-0"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" id="password" class="form-control rounded-0 input_user" required>
                        </div>
                        <div class="form-group mb-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="rememberme" class="custom-control-input" id="customControlInline">
                                <label class="custom-control-label" for="customControlInline">Remember me</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="d-flex mb-4 login_container">
                    <button type="button" name="button" id="login" class="btn btn-primary">Login</button>
                </div>
                <div class="mb-4">
                    <div class="d-flex justify-content-center links">
                        <span>Don't have an account?&nbsp;</span><a href="registration.php" class="ml-2">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
        $(function() {
            $('#login').click(function(e) {

                var valid = this.form.checkValidity();

                if (valid) {
                    var username = $('#username').val();
                    var password = $('#password').val();
                }

                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: 'jslogin.php',
                    data: {
                        username: username,
                        password: password
                    },
                    success: function(data) {
                        alert(data);
                        if ($.trim(data) === "1") {
                            setTimeout(' window.location.href =  "index.php"', 1000);
                        }
                    },
                    error: function(data) {
                        alert('there were erros while doing the operation.');
                    }
                });

            });
        });
    </script>
</body>

</html>
