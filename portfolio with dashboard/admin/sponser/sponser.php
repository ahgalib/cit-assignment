<?php
session_start();
	include('../layouts/header.php');
?>

<?php
	include('../layouts/sidebar.php');

    $sel_logo = "SELECT * FROM sponser ";
    $query = mysqli_query($con,$sel_logo);
  

?>

<div class="content-body">
	<!-- row -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
                <h3>Sponser</h3>
                <table class="table table-striped">
                    <thead>
                        <th>Sl no</th>
                        <th>Image</th>
                        <th>Status</th>
                        <td>Delete</td>
                    </thead>
                    <?php foreach($query as $key=>$logo){?>
                    <tr>
                        <td><?=$key+1?></td>
                        <td><img style="width:100px;"src="upload/<?=$logo['image']?>" alt=""></td>
                        <td>
                            <?php 
                                if($logo['status'] == 1){
                            ?>
                            <button class="btn btn-primary"><a href="update_sponser_status.php?id=<?=$logo['id']?>" class="text-light">Active</a></button>
                            <?php }else{?>
                                <button class="btn btn-dark"><a href="update_sponser_status.php?id=<?=$logo['id']?>" class="text-light">Deactive</a></button>
                            <?php }?>
                        </td>
                        <td>
                            <button class="btn btn-danger"><a class="text-light"href="deleteSponser.php?id=<?=$logo['id']?>">Delete</a></button>
                        </td> 
                        
                    </tr>
                    <?php }?>
                </table>
            </div>
				

            <div class="col-md-6 p-4">
                <div>
                    <h3>Add your logo</h3>
                    <form action="save_sponser.php" method="post" enctype="multipart/form-data">
                        <label for="logo">Logo</label>
                        <input type="file" name="image" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            <br>
                            <img id="blah" width="200" src="" alt="">
                        <!-- <img id="blah" width="200" src="upload/<?=$single_fetch['image']?>" alt=""> -->
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

 