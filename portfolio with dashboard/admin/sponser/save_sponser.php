<?php
session_start();
require('../db_conn.php');



$file_customer = $_FILES['image'];
$exp = explode('.',$file_customer['name']);
//print_r($exp);die;
$extn = end($exp);
//echo $extn;
$rand_nmbr = rand(1111,9999);
$file_name = $rand_nmbr.'.'.$extn;
$file_location = 'upload/'.$file_name;
move_uploaded_file($file_customer['tmp_name'],$file_location);

$alowed_ext = array('jpg','jpeg','png','JPEG','JPG');
if(in_array($extn,$alowed_ext)){
    if($file_customer['size']<6000000){
        $sql = "INSERT INTO sponser(image) VALUES ('$file_name')";
        $query = mysqli_query($con,$sql);
       
        header('location:sponser.php');
    }else{
        echo "file size is too big man";
    }
}else{
    echo "extn is not allowed";
}


?>