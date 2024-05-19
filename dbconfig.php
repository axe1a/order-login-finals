<?php 
// parameters
$host = "localhost";
$user = "root";
$password = "";
$dbname = "setup";
// connection string
$dsn = "mysql:host={$host};dbname={$dbname}";
// Create a new PDO (PHP Data Objects) instance for database connection
$conn = new PDO($dsn, $user, $password);
// timezone for data connection
$conn->exec("SET time_zone = '+08:00';");
