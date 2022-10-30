<?php
session_start();
require('db_conn.php');

 $email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT COUNT(*) as exist FROM students WHERE email = '$email'";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($query);
//echo $row['exist'];
if($row['exist'] == 1){
    $stu_pass = "SELECT * FROM students WHERE email = '$email'";
    $stu_query = mysqli_query($con,$stu_pass);
    $stu_row = mysqli_fetch_assoc($stu_query);
    $password = $_POST['password'];
    
   if(password_verify($password,$stu_row['password'])){
        $_SESSION['sess_check'] = 'session check for the user';
        header('location:user/index.php');
   }else{
        $_SESSION['error'] = 'Incorrect Password!';
        header('location:login.php');
   }
}else{
    $_SESSION['error'] = 'Email does not exist!';
    header('location:login.php');
}
                
?>