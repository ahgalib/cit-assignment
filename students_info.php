<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student table</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>All students info here</h3>
               <button class="btn btn-warning"><a href="form_index.php">Add Student</a></button>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Ser No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Roll</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                <tbody>
                <?php 
                require('db_con.php');
                $sql = "SELECT * FROM students";
                $query = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($query);
                //  "<pre>";
                // echo print_r($row);
                // "<pre/>";die();
                if($row>0){
                    foreach($query as $key=>$info){
                ?>
                    <tr>
                    <th scope="row"><?= $key+1?></th>
                    <td><?= $info['name']?></td>
                    <td><?= $info['email']?></td>
                    <td><?= $info['roll']?></td>
                    <td><img src="images/<?= $info['image']?>" alt="" style="width:100px;"></td>
                       
                    </tr>
                <?php }}else{?>
                    <th scope="row" colspan="5">No data here</th>
                    <?php }?>
                </table>
            </div>
        </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if(isset($_SESSION['success'])){?>
        <script>
            Swal.fire(
        'Good job!',
        '<?=$_SESSION['success']?>',
        'success'
        )
        </script>
<?php }?>

<?php session_unset();?>

</body>
</html>