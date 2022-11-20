<?php
session_start();
require('../db_conn.php');

$s_logo = $_POST['icon'];
$s_link = $_POST['link'];
// echo $s_logo;die;
 $sql = "INSERT INTO social (s_logo,link) VALUES ('$s_logo','$s_link')";
 $query = mysqli_query($con,$sql);
 header('location:social.php');

?>