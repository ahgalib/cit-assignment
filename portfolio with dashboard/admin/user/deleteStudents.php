<?php
require('../db_conn.php');
$id = $_GET['id'];
//echo $id;

$del_sql = "DELETE FROM students WHERE id = '$id'";
$del_qurry = mysqli_query($con,$del_sql);
header('location:students.php');
?>