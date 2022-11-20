<?php
session_start();
	include('../layouts/header.php');
?>

<?php
	include('../layouts/sidebar.php');

    $sel_edu = "SELECT * FROM about";
    $query = mysqli_query($con,$sel_edu);
?>

<div class="content-body">
	<!-- row -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
                <h3>All logo are here</h3>
                <table class="table table-striped">
                    <thead>
                        <th>Sl no</th>
                        <th>About me</th>
                        <th>image</th>
                        <td>status</td>
                        <td>Delete</td>
                    </thead>
                    <?php foreach($query as $edu){?>
                    <tr>
                        <td>1</td>
                        <td><?=$edu['about_me']?></td>
                       
                        <td><img style="width:100px;"src="upload/<?=$edu['image']?>" alt=""></td>
                       
                        <td>
                            <?php 
                                if($edu['status'] == 1){
                            ?>
                            <button class="btn btn-primary"><a href="update_education_status.php?id=<?=$edu['id']?>" class="text-light">Active</a></button>
                            <?php }else{?>
                                <button class="btn btn-dark"><a href="update_education_status.php?id=<?=$edu['id']?>" class="text-light">Deactive</a></button>
                            <?php }?>
                        </td>
                        
                        <td>
                            <button class="btn btn-danger"><a class="text-light"href="delete_edu.php?id=<?=$edu['id']?>">Delete</a></button>
                        </td>  
                        
                    </tr>
                    <?php }?>
                </table>
            </div>
				

            <div class="col-md-8 mt-4">
                <div class="mb-3">
                    <h3>Banar Add</h3>
                    <form action="save_about.php" method="post" enctype="multipart/form-data">
                        <label for="logo">about me</label>
                        <input type="text" name="about_me" class="form-control" placeholder="about your self">

                        <label for="logo">Image</label>
                        <input type="file" name="image" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            <br>
                            <img id="blah" width="200" src="" alt="">
                      
                        
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

 