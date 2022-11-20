<?php
session_start();
require('../db_conn.php');
$id = $_GET['id'];

$select_status = "SELECT * FROM education WHERE id=$id";
$select_status_res = mysqli_query($con, $select_status);
$after_assoc = mysqli_fetch_assoc($select_status_res);

if($after_assoc['status'] == 1){
    $select_status = "SELECT COUNT(*)as total_active FROM education WHERE status=1";
    $select_status_res = mysqli_query($con, $select_status);
    $after_assoc = mysqli_fetch_assoc($select_status_res);

    if($after_assoc['total_active'] == 3){
        $_SESSION['limit'] = 'Minimum 3 Icon Have to active';
        header('location:education.php');
    }
    else{
        $update_status2 = "UPDATE education SET status=0 WHERE id=$id";
        mysqli_query($con, $update_status2);

        header('location:education.php');
    }


}
else{
    $select_status = "SELECT COUNT(*)as total_deactive FROM education WHERE status=1";
    $select_status_res = mysqli_query($con, $select_status);
    $after_assoc = mysqli_fetch_assoc($select_status_res);

    if($after_assoc['total_deactive'] >= 8){
        $_SESSION['limit'] = 'Maxmimum 5 Icon can be active';
        header('location:education.php');
    }
    else{
        $update_status2 = "UPDATE education SET status=1 WHERE id=$id";
        mysqli_query($con, $update_status2);

        header('location:education.php');
    }
}


?>