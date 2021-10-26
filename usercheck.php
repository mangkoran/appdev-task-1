<?php

session_start();

require_once('config.php');

$username = $_POST['username'];
$password = ($_POST['password']);
$hash = "";

$sql = "SELECT * FROM users WHERE username = ? LIMIT 1";
$sth = $db->prepare($sql);
$sth->execute([$username]);
$users = $sth->fetchAll();

if (count($users) != 0) {
    $user = $users[0];
    $hash = $user["password"];
}

// print_r($resultarr);
// print_r($result);
// if (isset($result->pasword)) {
//     $hash = $result->password;
// }

if (password_verify($password, $hash)) {
    $_SESSION['userlogin'] = $user["username"];
} else {
    header("HTTP/1.1 500 Internal Server Error");
}
