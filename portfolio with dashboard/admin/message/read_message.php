<?php
session_start();
	include('../layouts/header.php');
?>

<?php
	include('../layouts/sidebar.php');
    $id = $_GET['id'];
    $sql_message = "SELECT * FROM message WHERE id = $id";
    $query = mysqli_query($con,$sql_message);
    $fetch = mysqli_fetch_assoc($query);

    $message_read = "UPDATE message SET status = 1 WHERE id = $id";
    $mess_query = mysqli_query($con,$message_read);

  

?>

<div class="content-body">
	<!-- row -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-10">
                <h3>Contact</h3>
                <table class="table table-border">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                    </thead>
                  
                    <tr>
                        <td><?=$fetch['name']?></td>
                        <td><?=$fetch['email']?></td>
                        <td>
                            <textarea name="" id="" cols="30" rows="10"> <?=$fetch['message']?></textarea>
                        </td>
                    </tr>
                  
                </table>
            </div>
          
            
        </div>
	</div>
</div>


<?php 
	include('../layouts/footer.php');
	
?>


 