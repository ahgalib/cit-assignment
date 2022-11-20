<?php
session_start();
require('../db_conn.php');


$title = $_POST['title'];
$description = $_POST['description'];
$icon = $_POST['icon'];



$sql = "INSERT INTO services(title,description,icon)VALUES('$title','$description','$icon')";
$query=mysqli_query($con,$sql);
header('location:service.php');


?>