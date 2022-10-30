<?php

require ('../db_conn.php');
	include('../layouts/header.php');
    $sql = "SELECT * FROM students";
    $query = mysqli_query($con,$sql);

?>

<?php
	include('../layouts/sidebar.php');
?>

<div class="content-body">
	<!-- row -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="card-body">
								
                    <table class="table table-striped">
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach($query as $key=>$user){ ?>
                            <tr>
                                <td><td><?=$key + 1?></td></td>
                                <td><?=$user['name']?></td>
                                <td><?=$user['email']?></td>
                                <td><img width="50" src="" alt=""></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                            <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php }?>
                    </table>
                </div>
			</div>
		</div>
	</div>
</div>


<?php 
	include('../layouts/footer.php');
?>