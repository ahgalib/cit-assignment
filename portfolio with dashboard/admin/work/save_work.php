<?php
session_start();
require('../db_conn.php');

$category = $_POST['category'];
$title = $_POST['title'];
$sub_title = $_POST['sub_title'];

$description = $_POST['description'];
$user_id =  $_SESSION['id'];

$file_logo = $_FILES['image'];
$exp = explode('.',$file_logo['name']);
//print_r($exp);die;
$extn = end($exp);
//echo $extn;
$rand_nmbr = rand(1111,9999);
$file_name = $rand_nmbr.'.'.$extn;
$file_location = 'upload/'.$file_name;
move_uploaded_file($file_logo['tmp_name'],$file_location);

$alowed_ext = array('jpg','jpeg','png','JPEG','JPG','PNG');
if(in_array($extn,$alowed_ext)){
    if($file_logo['size']<6000000){
        $sql = "INSERT INTO works(user_id,category,title,sub_title,description,image) VALUES ('$user_id','$category','$title','$sub_title','$description','$file_name')";
        $query = mysqli_query($con,$sql);
       
        header('location:work.php');
    }else{
        echo "file size is too big man";
    }
}else{
    echo "extn is not allowed";
}


?>