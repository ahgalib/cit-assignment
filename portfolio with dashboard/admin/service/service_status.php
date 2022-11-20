<?php
session_start();
require('../db_conn.php');
$id = $_GET['id'];

$select_status = "SELECT * FROM services WHERE id=$id";
$select_status_res = mysqli_query($con, $select_status);
$after_assoc = mysqli_fetch_assoc($select_status_res);

if($after_assoc['status'] == 1){
    $select_status = "SELECT COUNT(*)as total_active FROM services WHERE status=1";
    $select_status_res = mysqli_query($con, $select_status);
    $after_assoc = mysqli_fetch_assoc($select_status_res);

    if($after_assoc['total_active'] == 3){
        $_SESSION['limit'] = 'Minimum 3 Icon Have to active';
        header('location:service.php');
    }
    else{
        $update_status2 = "UPDATE services SET status=0 WHERE id=$id";
        mysqli_query($con, $update_status2);

        header('location:service.php');
    }


}
else{
    $select_status = "SELECT COUNT(*)as total_deactive FROM services WHERE status=1";
    $select_status_res = mysqli_query($con, $select_status);
    $after_assoc = mysqli_fetch_assoc($select_status_res);

    if($after_assoc['total_deactive'] >= 6){
        $_SESSION['limit'] = 'Maxmimum 6 Icon can be active';
        header('location:service.php');
    }
    else{
        $update_status2 = "UPDATE services SET status=1 WHERE id=$id";
        mysqli_query($con, $update_status2);

        header('location:service.php');
    }
}


?>