<?php
session_start();
	include('../layouts/header.php');
?>

<?php
	include('../layouts/sidebar.php');

    $sel_edu = "SELECT * FROM testimonial";
    $query = mysqli_query($con,$sel_edu);
?>

<div class="content-body">
	<!-- row -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
                <h3>Testimonial</h3>
                <table class="table table-striped">
                    <thead>
                        <th>Sl no</th>
                       
                        <th>Name</th>
                        <th>Rank</th>
                        <th>Openion</th>
                        <td>Image</td>
                        <td>Delete</td>
                    </thead>
                    <?php foreach($query as $edu){?>
                    <tr>
                        <td>1</td>
                       
                        <td><?=$edu['name']?></td>
                        <td><?=$edu['rank']?></td>
                        <td><?=$edu['openion']?></td>
                        <td><img src="upload/<?=$edu['image']?>" alt="" style="width:100px;"></td>
                       
                    
                        <td>
                            <button class="btn btn-danger"><a class="text-light"href="delete_education.php?id=<?=$edu['id']?>">Delete</a></button>
                        </td>  
                        
                    </tr>
                    <?php }?>
                </table>
            </div>
				

            <div class="col-md-8 mt-4">
                <div class="mb-3">
                    <h3>Banar Add</h3>
                    <form action="save_testimonial.php" method="post" enctype="multipart/form-data">
                        

                        <label for="logo">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="name">

                        <label for="logo">rank</label>
                        <input type="text" name="rank" class="form-control" placeholder="rank">

                        <label for="logo">openion</label>
                        <input type="text" name="openion" class="form-control" placeholder="openion">

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

 