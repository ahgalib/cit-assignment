<?php
require('../db_conn.php');
$id = $_GET['id'];
//echo $id;
$sel_img = "SELECT * FROM sponser WHERE id = $id";
$img_query = mysqli_query($con,$sel_img);
$img_fetch = mysqli_fetch_assoc($img_query);

$img_path = 'upload/'.$img_fetch['image'];
unlink($img_path);

$del_sql = "DELETE FROM sponser WHERE id = '$id'";
$del_qurry = mysqli_query($con,$del_sql);
header('location:sponser.php');
?>