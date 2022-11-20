<?php
session_start();
require('../db_conn.php');

$about_me = $_POST['about_me'];


$file_name = $_FILES['image']['name'];
$rand_nmbe = rand(1111,9999);

$file_size = $_FILES['image']['size'];
$file_tmp = $_FILES['image']['tmp_name'];
$explode = explode('.',$file_name);
//print_r($explode);die;
$extn = end($explode);
//echo $extn;
$file_new_name = $rand_nmbe.".".$extn;

$allow_extn = array('jpg','png','jpeg');
if(in_array($extn,$allow_extn)){
    if($file_size < 5000000){

        $new_location = 'upload/'.$file_new_name;
        move_uploaded_file($file_tmp,$new_location);

        $sql = "INSERT INTO about(about_me,image)VALUES('$about_me','$file_new_name')";
        $query=mysqli_query($con,$sql);
        header('location:about.php');
    }else{
        $_SESSION['img_err'] = 'file size is to long';
    }
}else{
   $_SESSION['img_err'] = 'extension is not allowed';
}

?>