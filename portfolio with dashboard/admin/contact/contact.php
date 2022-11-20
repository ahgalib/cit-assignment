<?php
session_start();
	include('../layouts/header.php');
?>

<?php
	include('../layouts/sidebar.php');

    $sql_contact = "SELECT * FROM contact";
    $query = mysqli_query($con,$sql_contact);
  

?>

<div class="content-body">
	<!-- row -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-10">
                <h3>Contact</h3>
                <table class="table table-striped">
                    <thead>
                        <th>Sl no</th>
                        <th>description</th>
                        <th>City</th>
                        <th>address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <td>Delete</td>
                    </thead>
                    <?php foreach($query as $contact){?>
                    <tr>
                        <td>1</td>
                        <td><?=substr($contact['description'],0,40)."...more"?></td>
                        <td><?=$contact['city']?></td>
                        <td><?=$contact['address']?></td>
                        <td><?=$contact['phone']?></td>
                        <td><?=$contact['email']?></td>
                        <td>
                            <button class="btn btn-danger"><a class="text-light"href="delete_contact.php?id=<?=$contact['id']?>">Delete</a></button>
                        </td> 
                        
                    </tr>
                    <?php }?>
                </table>
            </div>
          
            <div class="col-md-6 p-4">
                <div>
                    <h3>Add your logo</h3>
                    <form action="save_contact.php" method="post">
                    <div class="mb-3">
                            <label for="">Description</label>
                            <input type="text" name="description"  class="form-control" placeholder="description">
                        </div>
                        <div class="mb-3">
                            <label for="">City</label>
                            <input type="text" name="city"  class="form-control" placeholder="city">
                        </div>
                        <div class="mb-3">
                            <label for="">address</label>
                            <input type="text" name="address" class="form-control" placeholder="address">
                        </div>
                        
                        <div class="mb-3">
                            <label for="">phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="phone">
                        </div>
                        <div class="mb-3">
                            <label for="">Link</label>
                            <input type="text" name="email"  class="form-control" placeholder="email">
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

 