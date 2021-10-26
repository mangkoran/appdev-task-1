<?php

$db_host = "db";
$db_port = "3306";
$db_name = "useraccount";
$db_user = "root";
$db_pass = "password";
$dsn = "mysql:host=$db_host;port=$db_port;dbname=$db_name;charset=utf8";

$db = new PDO($dsn, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// sql statement
// CREATE TABLE `users` (
//   `username` varchar(16) NOT NULL,
//   `email` varchar(16) NOT NULL,
//   `password` varchar(255) NOT NULL,
//   PRIMARY KEY (`username`)
// ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
