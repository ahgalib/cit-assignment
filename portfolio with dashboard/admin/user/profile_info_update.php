<?php
session_start();
require('../db_conn.php');
 $id = $_POST['id']; 
 $name = $_POST['name'];
 $old_password = $_POST['old_password'];
 $password = $_POST['password'];
 $after_hash = password_hash($password,PASSWORD_DEFAULT);

if(empty($old_password)){
    $update_sql = "UPDATE students SET name='$name' WHERE id = '$id'";
    $query = mysqli_query($con,$update_sql);
    header('location:profile.php');
}else{
    $old_pass_sql = "SELECT * FROM students WHERE id = '$id'";
    $old_pass_query = mysqli_query($con,$old_pass_sql);
    $old_pass_fetch = mysqli_fetch_assoc($old_pass_query);
    if(password_verify($old_password,$old_pass_fetch['password'])){
        $update_pass = "UPDATE students SET name='$name',password = '$after_hash' WHERE id = '$id'";
        $pass_query = mysqli_query($con,$update_pass);
        header('location:profile.php');
    }else{
        $_SESSION['wrong'] = "your old password are not currect";
        header('location:profile.php');
    }
}


?>