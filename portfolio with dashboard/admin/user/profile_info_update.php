<?php
session_start();
require('../db_conn.php');

$id = $_POST['id'];
$name = $_POST['name'];
$old_password = $_POST['old_password'];
$password = $_POST['password'];
$after_hash = password_hash($password, PASSWORD_DEFAULT);
if(empty($password)){
    $update = "UPDATE students SET name = '$name' WHERE id = $id";
    $sql = mysqli_query($con,$update);
    header('location:profile.php');
}else{
    $pass_sql = "SELECT * FROM students WHERE id=$id";
    $pass_query = mysqli_query($con, $pass_sql);
    $single_assoc = mysqli_fetch_assoc($pass_query);
    if(password_verify($old_password, $single_assoc['password'])){
        $update = "UPDATE students SET name='$name', password='$after_hash' WHERE id=$id";
        $update_result = mysqli_query($con, $update);
        header('location:profile.php');
        }
    else{
        $_SESSION['wrong'] = "Old Password does not match!";
        header('location:profile.php');
    }
}
?>