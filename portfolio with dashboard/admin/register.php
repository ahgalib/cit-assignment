<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Gymove -Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./dashboardFiles/images/favicon.png">
    <link href="./dashboardFiles/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
					
					<div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="index.html"><img src="./dashboardFiles/images/logo-full.png" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4 text-white">Sign up your account</h4>
                                    <form action="save_register.php" method="post">
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Username</strong></label>
                                            <input type="text" class="form-control" name="name" placeholder="username" value="<?= (isset($_SESSION['name_value']))?$_SESSION["name_value"]:""?>">
                                            <!-- check value empty or not -->
                                            <?php if(isset($_SESSION['empty_name'])){?>  
                                                <div class="text-danger">
                                                    <strong><?=$_SESSION['empty_name'];?></strong>
                                                </div>
                                            <?php }?>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Email</strong></label>
                                            <input type="text" class="form-control" name="email" placeholder="email" value="<?= (isset($_SESSION['email_value']))?$_SESSION['email_value']:''?>">
                                            <!-- check value empty or not -->
                                            <?php if(isset($_SESSION['empty_email'])){?>  
                                                <div class="text-danger">
                                                    <strong><?=$_SESSION['empty_email'];?></strong>
                                                </div>
                                            <?php }?>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Password</strong></label>
                                            <input type="password" class="form-control" name="password">
                                            <!-- check value empty or not -->
                                            <?php if(isset($_SESSION['empty_password'])){?>  
                                                <div class="text-danger">
                                                    <strong><?=$_SESSION['empty_password'];?></strong>
                                                </div>
                                            <?php }?>
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn bg-white text-primary btn-block">Sign me up</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p class="text-white">Already have an account? <a class="text-white" href="page-login.html">Sign in</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
<!-- sweet alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="./dashboardFiles/vendor/global/global.min.js"></script>
<script src="./dashboardFiles/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="./dashboardFiles/js/custom.min.js"></script>
<script src="./dashboardFiles/js/deznav-init.js"></script>

<!-- for error -->
<?php if(isset($_SESSION['error'])){?>  
    <script>
        Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: '<?=$_SESSION["error"]?>',
  footer: '<a href="">Why do I have this issue?</a>'
})
    </script>
<?php }?>

<!-- for success -->
<?php if(isset($_SESSION['success'])){?>  
    <script>
        Swal.fire({
    position: 'top-end',
  icon: 'success',
  title: '<?=$_SESSION["success"]?>',
  showConfirmButton: false,
  timer: 1500
})
    </script>
<?php } ;?>
</body>
</html>

<?php
session_unset();
?>