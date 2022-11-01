<?php
session_start();
require('../db_conn.php');


$file_logo = $_FILES['logo'];
$exp = explode('.',$file_logo['name']);
//print_r($exp);die;
$extn = end($exp);
//echo $extn;
$name = $file_logo['name'];
$alowed_ext = array('jpg','jpeg','png');
if(in_array($extn,$alowed_ext)){
    if($file_logo['size']<1000000){
        $sql = "INSERT INTO logo (logo) VALUES ('$name')";
        $query = mysqli_query($con,$sql);
        $id = mysqli_insert_id($con);
        //echo $id;

        $file_name = $id.'.'.$extn;
        $file_location = 'upload/'.$file_name;
        move_uploaded_file($file_logo['tmp_name'],$file_location);
        $up_sql = "UPDATE logo SET logo='$file_name' WHERE id = '$id'";
        $up_query = mysqli_query($con,$up_sql);
        header('location:logo.php');
    }else{
        echo "file size is too big man";
    }
}else{
    echo "extn is not allowed";
}
?>