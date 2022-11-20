<?php
session_start();
require('admin/db_conn.php');

$name = $_POST['name'];
$email = $_POST['email'];
$message = mysqli_real_escape_string($con,$_POST['message']);





$sql = "INSERT INTO message(name,email,message)VALUES('$name','$email','$message')";
$query=mysqli_query($con,$sql);

header('location:index.php');


?>