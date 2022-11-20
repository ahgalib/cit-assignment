<?php
session_start();
require('../db_conn.php');
$id = $_GET['id'];

$sel_img = "SELECT * FROM banar WHERE id='$id'";
$img_query = mysqli_query($con,$sel_img);
$single_image = mysqli_fetch_assoc($img_query);
$file_path = 'upload/'.$single_image['image'];
//echo $file_path;die;
unlink($file_path);

$del_sql = "DELETE FROM banar WHERE id = '$id'";
$del_query = mysqli_query($con,$del_sql);
header('location:banar.php');

?>