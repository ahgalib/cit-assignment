<?php 
require 'db_con.php';
session_start();

// $name = $_POST['name'];
// $email = $_POST['email'];
// $roll = $_POST['roll'];
// $password = $_POST['password'];
// $after_hash = password_hash($password, PASSWORD_DEFAULT);


// $upper = preg_match('@[A-Z]@', $password);
// $lower = preg_match('@[a-z]@', $password);
// $number = preg_match('@[0-9]@', $password);
// $spsl = preg_match('@[$,&,*,#]@', $password);

// $flag = true;

// if(empty($name)){
//     $_SESSION['nam_err'] = 'Please Enter Your Name';
//     $flag = false;
// }

// if(empty($email)){
//     $_SESSION['eml_err'] = 'Please Enter Your Email';
//     $flag = false;
// }
// else{
//     if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
//         $_SESSION['eml_err'] = 'Please Enter Valid Email';
//         $flag = false;
//     }
// }

// if(empty($password)){
//     $_SESSION['pass_err'] = 'Please Enter Your Password';
//     $flag = false;
// }

// else{
//     if(!$upper || !$lower || !$number || !$spsl || strlen($password) < 8){
//         $_SESSION['pass_err'] = 'Password contain 1 UpperCase, 1 Lowercase. 1 number and 1 Symbol & min 8 char';
//         $flag = false;
//     }
// }

// if($flag){


//         $insert = "INSERT INTO students(name, email,roll, password)VALUES('$name', '$email','$roll','$after_hash')";
//         $query = mysqli_query($conn, $insert);
//         if($query){
//              $_SESSION['success'] = 'data inserted successfully';
//         }

// }


// else{
//     $_SESSION['nam_val'] = $name;
//     $_SESSION['eml_val'] = $email;
//     header('location:register.php');
// }




//$img = $_FILES['image'];
// print_r($_FILES);die();

$name = $_POST['name'];
$email = $_POST['email'];
$roll = $_POST['roll'];
$password = $_POST['password'];
$flag = true;

$upper = preg_match('@[A-Z]@', $password);
$lower = preg_match('@[a-z]@', $password);
$number = preg_match('@[0-9]@', $password);
$spsl = preg_match('@[$,&,*,#]@', $password);
$after_hash = password_hash($password,PASSWORD_DEFAULT);

$file_name = $_FILES['image']['name'];
$explod = explode('.',$file_name);
$extension = end($explod);
$size = $_FILES['image']['size'];
$allowed_ext = array('jpg','png','jpeg');

$rend_name = rand(11111,888888);
//echo ($rend_name);die;
//echo ($extension);die;
$new_name = $rend_name.".".$extension;
//echo $new_name;
$file_tmp = $_FILES['image']['tmp_name'];
//print_r($file_tmp);die;

if(empty($name)){
    $_SESSION['nam_err'] = 'Please Enter Your Name';
    $flag = false;
}

if(empty($email)){
    $_SESSION['eml_err'] = 'Please Enter Your Email';
    $flag = false;
}
else{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['eml_err'] = 'Please Enter Valid Email';
        $flag = false;
    }
}
if(empty($roll)){
    $_SESSION['roll_err'] = 'Please Enter Your roll';
    $flag = false;
}

if(empty($password)){
    $_SESSION['pass_err'] = 'Please Enter Your Password';
    $flag = false;
}

else{
    if(!$upper || !$lower || !$number || !$spsl || strlen($password) < 8){
        $_SESSION['pass_err'] = 'Password contain 1 UpperCase, 1 Lowercase. 1 number and 1 Symbol & min 8 char';
        $flag = false;
    }
}

if($flag){
    // echo $name;
    // echo $email;
    // echo $roll;
    // echo $password;
    if(in_array($extension,$allowed_ext)){
        if($size<512000){
            $insert_row = "INSERT INTO students(name,email,roll,password) VALUES('$name','$email','$roll','$after_hash')";
            $query = mysqli_query($conn,$insert_row);
            $user_id = mysqli_insert_id($conn);
            $file_new_locatiion = 'images/'.$new_name;
            move_uploaded_file($file_tmp,$file_new_locatiion);
            $update_user = "UPDATE students SET image='$new_name'WHERE id='$user_id'";
            mysqli_query($conn,$update_user);
            if($query){
               $_SESSION['success'] = "Data inserted successfull";
               header('location:students_info.php');
            }else{
                echo "query failed";
            }
        }else{
            echo "size is too big";
        }
        echo "allowed";
    
    
    
        
    }else{
        echo "not allowed";
    }die;

   
    //$insert = "INSERT INTO students(name, email,roll, password)VALUES('$name', '$email','$roll','$after_hash')";
    //         $query = mysqli_query($conn, $insert);
    //         if($query){
    //              $_SESSION['success'] = 'data inserted successfully';
    //         }
}else{
    $_SESSION['nam_val'] = $name;
    $_SESSION['eml_val'] = $email;
    $_SESSION['roll_val'] = $roll;
    $_SESSION['pass_val'] = $password;
    header('location:form_index.php');
}

?>