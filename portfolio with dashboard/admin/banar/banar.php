<?php
session_start();
	include('../layouts/header.php');
?>

<?php
	include('../layouts/sidebar.php');

    $sel_logo = "SELECT * FROM banar";
    $query = mysqli_query($con,$sel_logo);
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
                        <th>Sub title</th>
                        <th>title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <td>Delete</td>
                    </thead>
                    <?php foreach($query as $banar){?>
                    <tr>
                        <td>1</td>
                        <td><?=$banar['sub_title']?></td>
                        <td><?=$banar['title']?></td>
                        <td><?=$banar['description']?></td>
                        <td><img style="width:100px;"src="upload/<?=$banar['image']?>" alt=""></td>
                       
                        <td>
                            <button class="btn btn-danger"><a class="text-light"href="delete_banar.php?id=<?=$banar['id']?>">Delete</a></button>
                        </td> 
                        
                    </tr>
                    <?php }?>
                </table>
            </div>
				

            <div class="col-md-8 mt-4">
                <div class="mb-3">
                    <h3>Banar Add</h3>
                    <form action="save_banar_info.php" method="post" enctype="multipart/form-data">
                        <label for="logo">Sub title</label>
                        <input type="text" name="sub_title" class="form-control" placeholder="sub title">
                        <label for="logo">title</label>
                        <input type="text" name="title" class="form-control" placeholder="title">
                        <label for="logo">description</label>
                        <input type="text" name="description" class="form-control" placeholder="description">
                        <label for="logo">Banar Image</label>
                        <input type="file" name="logo" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
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

 