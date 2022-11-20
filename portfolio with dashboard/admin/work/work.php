<?php
session_start();
	include('../layouts/header.php');
?>

<?php
	include('../layouts/sidebar.php');

    $sel_work = "SELECT * FROM works";
    $query = mysqli_query($con,$sel_work);
?>

<div class="content-body">
	<!-- row -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
                <h3>All work are here</h3>
                <table class="table table-striped">
                    <thead>
                        <th>Sl no</th>
                        <th>Category</th>
                        <th>title</th>
                        <th>sub_title</th>
                        <th>description</th>
                        <td>image</td>
                        <td>Delete</td>
                    </thead>
                    <?php foreach($query as $work){?>
                    <tr>
                        <td>1</td>
                        <td><?=$work['category']?></td>
                        <td><?=$work['title']?></td>
                        <td><?=$work['sub_title']?></td>
                        <td><?=substr($work['description'],0,40)."..more"?></td>
                     
                       
                        <td><img src="upload/<?=$work['image']?>" style="width:200px;" alt=""></td>
                        
                        <td>
                            <button class="btn btn-danger"><a class="text-light"href="delete_work.php?id=<?=$work['id']?>">Delete</a></button>
                        </td>  
                        
                    </tr>
                    <?php }?>
                </table>
            </div>
				

            <div class="col-md-8 mt-4">
                <div class="mb-3">
                    <h3>Banar Add</h3>
                    <form action="save_work.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="logo">category</label>
                            <input type="text" name="category" class="form-control" placeholder="category">
                        </div>

                        <div class="mb-3">
                            <label for="logo">title</label>
                            <input type="text" name="title" class="form-control" placeholder="title">
                        </div>

                        <div class="mb-3">
                            <label for="logo">sub title</label>
                            <input type="text" name="sub_title" class="form-control" placeholder="sub_title">
                        </div>

                        <div class="mb-3">
                        <label for="logo">Description</label>
                        <textarea name="description" id="" cols="30" rows="4"></textarea>
                        </div>
                        
                        <div class="mb-3"></div>
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            <img id="blah" width="200" src="" alt="">
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

 