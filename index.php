<?php

session_start();

if (!isset($_SESSION['userlogin'])) {
    header("Location: login.php");
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION);
    header("Location: login.php");
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    <div class="container vh-100">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div>
                <div class="d-flex justify-content-center mb-4">
                    <?php
                        echo "<h1>Hello, " . $_SESSION["userlogin"] . "!</h1>"
                    ?>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="index.php?logout=true" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
