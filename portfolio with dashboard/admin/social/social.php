<?php
session_start();
	include('../layouts/header.php');
?>

<?php
	include('../layouts/sidebar.php');

    $sel_logo = "SELECT * FROM social ";
    $query = mysqli_query($con,$sel_logo);
  

?>

<div class="content-body">
	<!-- row -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
                <h3>All Social icon are here</h3>
                <table class="table table-striped">
                    <thead>
                        <th>Sl no</th>
                        <th>Logo</th>
                        <th>Link</th>
                        <th>Status</th>
                        <td>Delete</td>
                    </thead>
                    <?php foreach($query as $logo){?>
                    <tr>
                        <td>1</td>
                        <td><i class="<?=$logo['s_logo']?>" style="font-family:fontawesome;font-size:20px;margin:15px;"></i></td>
                        <td><a href="<?=$logo['link']?>"><?=$logo['link']?></a></td>
                        <td>
                            <?php 
                                if($logo['status'] == 1){
                            ?>
                            <button class="btn btn-primary"><a href="update_social_status.php?id=<?=$logo['id']?>" class="text-light">Active</a></button>
                            <?php }else{?>
                                <button class="btn btn-dark"><a href="update_social_status.php?id=<?=$logo['id']?>" class="text-light">Deactive</a></button>
                            <?php }?>
                        </td>
                        <td>
                            <button class="btn btn-danger"><a class="text-light"href="delete_social.php?id=<?=$logo['id']?>">Delete</a></button>
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
      
  "fab fa-instagram",
 "fab fa-twitter",
   "fab fa-github",
  "fab fa-snapchat",
    "fab fa-linkedin",
     
      "fa-pinterest"
)
?>

<!-- all icon end -->
            <div class="col-lg-12 p-4">
                <div>
                    <h3>Add your logo</h3>
                    <form action="save_social.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <?php foreach($fonts as $font){?>
                            <i data="<?php echo $font?>" class="<?php echo $font?> icon_class" style="font-family:fontawesome;font-size:30px;margin:15px;"></i>
                            <?php } ?>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="icon" id="icon" class="form-control" placeholder="icon name">
                        </div>
                        <div class="mb-3">
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
        let icon_val = $(this).attr('data');
        //alert(icon_val);
        $("#icon").attr('value',icon_val);
    })
</script>

 