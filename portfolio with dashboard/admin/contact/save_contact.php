<?php
session_start();
require('../db_conn.php');

$description = mysqli_real_escape_string($con,$_POST['description']);
$city = $_POST['city'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];



$sql = "INSERT INTO contact(description,city,address,phone,email)VALUES('$description','$city','$address','$phone','$email')";
$query=mysqli_query($con,$sql);

header('location:contact.php');


?>