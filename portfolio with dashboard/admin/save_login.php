<?php
session_start();
require('db_conn.php');

 $email = $_POST['email'];
// echo $password = $_POST['password'];

$sql = "SELECT COUNT(*) as exist FROM students WHERE email = '$email'";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($query);
echo $row['exist'];
                
?>