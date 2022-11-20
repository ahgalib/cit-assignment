<?php
session_start();
	include('../layouts/header.php');
?>

<?php
	include('../layouts/sidebar.php');

    $sql_message = "SELECT * FROM message";
    $query = mysqli_query($con,$sql_message);
  

?>

<div class="content-body">
	<!-- row -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-10">
                <h3>Contact</h3>
                <table class="table table-border">
                    <thead>
                        <th>Sl no</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <td>Action</td>
                    </thead>
                    <?php foreach($query as $key=>$message){?>
                    <tr style="background-color:<?php echo ($message['status']==1?'#f3eaea':'silver')?>">
                        <td><?=$key+1?></td>
                        <td><?=$message['name']?></td>
                        <td><?=$message['email']?></td>
                        <td><?=substr($message['message'],0,40)."...more"?></td>
                       
                        
                        <td class="d-flex">
                            <button class="btn btn-info"><a class="text-light" href="read_message.php?id=<?=$message['id']?>">View</a></button>
                            <button class="btn btn-danger"><a class="text-light"href="delete_message.php?id=<?=$message['id']?>">Delete</a></button>
                        </td> 
                        
                    </tr>
                    <?php }?>
                </table>
            </div>
          
            
        </div>
	</div>
</div>


<?php 
	include('../layouts/footer.php');
	
?>


 