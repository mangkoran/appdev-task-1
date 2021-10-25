<?php

session_start();
require_once('config.php');

$username = $_POST['username'];
$password = ($_POST['password']);

$sql = "SELECT * FROM users WHERE username = ? LIMIT 1";
$stmtselect  = $db->prepare($sql);
$result = $stmtselect->execute([$username]);
$result = $stmtselect->fetch(PDO::FETCH_OBJ);

// echo $result->password;
$hash = $result->password;
// echo password_verify($password, $result);

if (password_verify($password, $hash)) {
    $user = $stmtselect->fetch(PDO::FETCH_ASSOC);
    if ($stmtselect->rowCount() > 0) {
        $_SESSION['userlogin'] = $user;
        echo '1';
    } else {
        echo 'User not found';
    }
} else {
    echo 'There were errors while connecting to database.';
}
