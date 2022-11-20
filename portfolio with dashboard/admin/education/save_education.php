<?php
session_start();
require('../db_conn.php');


$title = $_POST['title'];
$skill = $_POST['skill'];
$percentage = $_POST['percentage'];


$sql = "INSERT INTO education(title,skill,percentage)VALUES('$title','$skill','$percentage')";
$query=mysqli_query($con,$sql);
header('location:education.php');


?>