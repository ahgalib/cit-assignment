<?php
session_start();
require('db_conn.php');
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$image = "";
$flag = true;
//password validation
$validate = preg_match("@[A-Z]@",$password);
$validate = preg_match("@[a-z]@",$password);
$validate = preg_match("@[0-9]@",$password);
$validate = preg_match("@[$,&,*]@",$password);

$after_hash = password_hash($password,PASSWORD_DEFAULT);

if(empty($name)){
    $_SESSION['empty_name'] = 'please fil the name field';
    $flag = false;
}
if(empty($email)){
    $_SESSION['empty_email'] = 'please fil the email field';
    $flag = false;
}else{
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $_SESSION['error'] = 'invalide email formet';
        $flag = false;
    }
}
if(empty($password)){
    $_SESSION['empty_password'] = 'please fil the password field';
    $flag = false;
}else{
    if(!$validate){
        $_SESSION['error'] = 'password must contain 1 number 1 upper and 1 lower case and also 1 special charectar';
        $flag = false;
    }
}

if($flag){
    // echo $name = $_POST['name'];
    // echo $email = $_POST['email'];
    // echo $password = $_POST['password'];

    $sql = "INSERT INTO students(name,email,password,image) VALUES ('$name','$email','$after_hash','$image')";
    $query = mysqli_query($con,$sql);
    $_SESSION['success'] = "Successfully registered";
    $_SESSION['name'] = $name;
    //echo "<pre>";print_r($name);die;
    // $_SESSION['success'] = "Successfully registered";
    header('location:index.php');
    //echo "done";
}else{
    $_SESSION['name_value'] = $name;
    $_SESSION['email_value'] = $email;
    $_SESSION['password_value'] = $password;
    header('location:register.php');
}
?>