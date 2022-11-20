<?php
session_start();
	include('../layouts/header.php');
?>

<?php
	include('../layouts/sidebar.php');

    $sel_logo = "SELECT * FROM services";
    $query = mysqli_query($con,$sel_logo);
  

?>

<div class="content-body">
	<!-- row -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-10">
                <h3>All logo are here</h3>
                <table class="table table-striped">
                    <thead>
                        <th>Sl no</th>
                        <th>title</th>
                        <th>description</th>
                        <th>Logo</th>
                       
                        <th>status</th>
                        <td>Delete</td>
                    </thead>
                    <?php foreach($query as $logo){?>
                    <tr>
                        <td>1</td>
                        <td><?=$logo['title']?></td>
                        <td><?=$logo['description']?></td>
                        <td><i class="<?=$logo['icon']?>" style="font-family:fontawesome;font-size:22px;"></i></td>
                        <td>
                            <?php 
                                if($logo['status'] == 1){
                            ?>
                            <button class="btn btn-primary"><a href="service_status.php?id=<?=$logo['id']?>" class="text-light">Active</a></button>
                            <?php }else{?>
                                <button class="btn btn-dark"><a href="service_status.php?id=<?=$logo['id']?>" class="text-light">Deactive</a></button>
                            <?php }?>
                        </td>
                        <td>
                            <button class="btn btn-danger"><a class="text-light"href="delete_service.php?id=<?=$logo['id']?>">Delete</a></button>
                        </td> 
                        
                    </tr>
                    <?php }?>
                </table>
            </div>
            <!-- all icon start-->
            <?php 
            $fonts =array(
                "fab fa-facebook",
                "fab fa-facebook-f",
                "fa fa-react-r",
                "fab fa-instagram",
                "fab fa-twitter",
                "fab fa-github",
                "fal fa-desktop",
                "fab fa-linkedin",
                "fab fa-free-code-camp",
                "fal fa-lightbulb-on",
                "fal fa-edit",
                "fal fa-headset"
                
            )
            ?>

<!-- all icon end -->

            <div class="col-md-6 p-4">
                <div>
                    <h3>Add your logo</h3>
                    <form action="save_service.php" method="post">
                        <div class="mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title"  class="form-control" placeholder="title">
                        </div>
                        <div class="mb-3">
                            <label for="">Description</label>
                            <input type="text" name="description" class="form-control" placeholder="description">
                        </div>
                        <div class="mb-3">
                        <label for="">choose your icon</label>
                        </div>
                        <div class="mb-3">
                           
                            <?php foreach($fonts as $font){?>
                            <i data="<?php echo $font?>" class="<?php echo $font?> icon_class" style="font-family:fontawesome;font-size:30px;margin:15px;"></i>
                            <?php } ?>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="icon" readonly id="icon" class="form-control" placeholder="icon name">
                        </div>
                        <div class="mb-3">
                            <label for="">Link</label>
                            <input type="text" name="link"  class="form-control" placeholder="link">
                        </div>
                        <button class="btn btn-info">Submit</button>
                    </form>
                </div>
            </div>
        </div>
	</div>
</div>


<?php 
	include('../layouts/footer.php');
	
?>

<script>
    $('.icon_class').click(function(){
        let icon_val = $(this).attr("data");
        //alert(icon_val);
       $("#icon").attr('value',icon_val);
    })
</script>

 