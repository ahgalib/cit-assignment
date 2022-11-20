<?php
session_start();
	include('../layouts/header.php');
?>

<?php
	include('../layouts/sidebar.php');
?>

<div class="content-body">
	<!-- row -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-6 col-xxl-12">
				<div class="row">
					<div class="col-sm-6">
						<div class="card avtivity-card">
							<div class="card-body">
								<div class="media align-items-center">
									<h4>Hello <span style="color:red;font-weight:bold;"><?=(isset($_SESSION['id'])?$_SESSION['name']:'')?></span>Welcome to Admin Dashboard</h4>
								</div>
									
							</div>
							<div class="effect bg-success"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php 
	include('../layouts/footer.php');
	
?>

 