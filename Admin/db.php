<?php
$host = "localhost";
$user = "root";
$pass = "admin123"; 
$dbname = "CROCHET";
$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>