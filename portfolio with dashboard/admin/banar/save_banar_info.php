<?php
session_start();
require('../db_conn.php');
$greeting = $_POST['greeting'];
$short_description = $_POST['short_description'];

$file_logo = $_FILES['logo'];
$exp = explode('.',$file_logo['name']);
//print_r($exp);die;
$extn = end($exp);
//echo $extn;
$rand_nmbr = rand(1111,9999);
$file_name = $rand_nmbr.'.'.$extn;
$file_location = 'upload/'.$file_name;
move_uploaded_file($file_logo['tmp_name'],$file_location);

$alowed_ext = array('jpg','jpeg','png');
if(in_array($extn,$alowed_ext)){
    if($file_logo['size']<1000000){
        $sql = "INSERT INTO banar (greeting,short_description,image) VALUES ('$greeting','$short_description','$file_name')";
        $query = mysqli_query($con,$sql);
       
        header('location:banar.php');
    }else{
        echo "file size is too big man";
    }
}else{
    echo "extn is not allowed";
}


?>