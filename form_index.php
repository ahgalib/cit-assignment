<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .pass_field{
            position:relative;
        }
        .pass_field i{
            position: absolute;
            top:40px;
            right:20px;
            font-size:20px;
            
        }
    </style>
</head>
<body>
    <h3>PHP Form Handling</h3>
    <dic class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4">
                    <form action="save_form.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter email" value="<?=(isset($_SESSION['nam_val']))?$_SESSION['nam_val']:''?>">
                           <?php if(isset($_SESSION['nam_err'])){?>
                            <div class="alert alert-danger"><?=$_SESSION['nam_err'];?></div>
                            <?php }?>
                        </div>
                        <div class="form-group">
                            <label for="">Email address</label>
                            <input type="text" class="form-control" name="email" placeholder="Enter email" value="<?=(isset($_SESSION['eml_val']))?$_SESSION['eml_val']:''?>">
                            <?php if(isset($_SESSION['eml_err'])){?>
                            <div class="alert alert-danger"><?=$_SESSION['eml_err'];?></div>
                            <?php }?>
                        </div>

                        <div class="form-group">
                            <label for="">Roll</label>
                            <input type="number" class="form-control" name="roll" placeholder="Enter roll" value="<?=(isset($_SESSION['roll_val']))?$_SESSION['roll_val']:''?>">
                            <?php if(isset($_SESSION['roll_err'])){?>
                            <div class="alert alert-danger"><?=$_SESSION['roll_err'];?></div>
                            <?php }?>
                        </div>

                        <div class="form-group pass_field">
                            <label for="">Password</label>
                            <input type="password" id="passEye" class="form-control" name="password" placeholder="Password" value="<?=(isset($_SESSION['pass_val']))?$_SESSION['pass_val']:''?>">
                            <i class="fa fa-eye"  onclick="showFun()"></i>
                            <?php if(isset($_SESSION['pass_err'])){?>
                                <div class="alert alert-danger"><?=$_SESSION['pass_err']?></div>
                            <?php }?>
                        </div>
                       
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </dic>
</body>
</html>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function showFun(){
        let showId = document.querySelector("#passEye");
        if(showId.type === "password"){
            showId.type = "text";
        }
    }
</script>

<?php if(isset($_SESSION['success'])){?>
<script>
    Swal.fire(
  'Good job!',
  'You clicked the button!',
  'success'
)
</script>
<?php }?>

<?php
session_unset();
?>