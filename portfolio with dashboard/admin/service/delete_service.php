<?php
session_start();
require('../db_conn.php');
$id = $_GET['id'];



$del_sql = "DELETE FROM services WHERE id = '$id'";
$del_query = mysqli_query($con,$del_sql);
header('location:service.php');

?>