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
print_r($_FILES);die();

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

    $insert_row = "INSERT INTO students(name,email,roll,password) VALUES('$name','$email','$roll','$after_hash')";
    $query = mysqli_query($conn,$insert_row);
    if($query){
       $_SESSION['success'] = "Data inserted successfull";
       header('location:students_info.php');
    }else{
        echo "query failed";
    }
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