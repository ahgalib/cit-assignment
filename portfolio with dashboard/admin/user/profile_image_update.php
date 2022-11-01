<?php
session_start();
require('../db_conn.php');
$ren_nmbr = rand(1111,9999);
//echo $ren_nmbr;die;
$id = $_POST['id'];
$file_name = $_FILES['image'];
$explode = explode('.',$file_name['name']);
//print_r($explode);
$extension = end($explode);
//echo $extension;

$allow_ext = array('jpg','png','jpeg');
if(in_array($extension,$allow_ext)){
    if($file_name['size']<100000){
        
        $sel_img = "SELECT * FROM students WHERE id = '$id'";
        $img_query = mysqli_query($con,$sel_img);
        $fetch_img = mysqli_fetch_assoc($img_query);
        $del_image = 'upload/'.$fetch_img['image'];
        unlink($del_image);

        $file_new_name = $ren_nmbr.'.'.$extension;
        $file_location = 'upload/'.$file_new_name;
        move_uploaded_file($file_name['tmp_name'],$file_location);
        $img_update_sql = "UPDATE students SET image = '$file_new_name' WHERE id = '$id'";
        $img_query = mysqli_query($con,$img_update_sql);
        header('location:profile.php');
    }else{
        $_SESSION['img_err'] = "please select the jpg,png or jpeg extension images";  
    }
}else{
    $_SESSION['img_err'] = "please select the jpg,png or jpeg extension images";
}

?>