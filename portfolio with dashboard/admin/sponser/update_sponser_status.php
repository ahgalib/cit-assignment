<?php
session_start();
require('../db_conn.php');
$id = $_GET['id'];
$up_sel = "SELECT * FROM sponser WHERE id = $id";
$up_query = mysqli_query($con,$up_sel);
$status_fetch = mysqli_fetch_assoc($up_query);

if($status_fetch['status'] == 0){
    // $sel_deac = "SELECT COUNT(*) as total_deactive FROM sponser WHERE status = 0";
    // $dea_query = mysqli_query($con,$sel_deac);
    // $status_fetch_deactive = mysqli_fetch_assoc($dea_query);
    //echo $status_fetch_deactive['total_deactive'];die;

    $up_status = "UPDATE sponser SET status = 1 WHERE id = $id";
    $query =  mysqli_query($con,$up_status); 
}else{
    $sel_deac = "SELECT COUNT(*) as total_active FROM sponser WHERE status = 1";
    $dea_query = mysqli_query($con,$sel_deac);
    $status_fetch_deactive = mysqli_fetch_assoc($dea_query);

    if($status_fetch_deactive['total_active'] > 5 ){
    $up_status = "UPDATE sponser SET status = 0 WHERE id = $id";
    $query =  mysqli_query($con,$up_status); 
     }else{
        header('location:sponser.php');
     }
}
header('location:sponser.php');


?>