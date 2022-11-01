<?php
session_start();
require('../db_conn.php');
$id = $_GET['id'];

$update_sql_first = "UPDATE logo SET status = 0";
$update_query_first = mysqli_query($con,$update_sql_first);

$update_sql = "UPDATE logo SET status = 1 where id = '$id'";
$update_query = mysqli_query($con,$update_sql);
header('location:logo.php');
?>