<?php 
session_start();

include ('header.php');
?>
<div class="container bg-white mt-4" style='min-height:500px'>
	<div class="row">
		<div class="col-md-3 shadow" style="padding: 10px">
			<h5 style="text-align: center">
				<small>Admin Dashboard</small>
			</h5>
			<p><img src="images/logo1.png" style="min-height: 100px"></p>
			<br>
			<!-- <a href="upload.php" class="btn btn-info" style="text-align: center">Update Profile Photo</a> -->
			<a href="logout.php" class="btn btn-danger" style="text-align: center">Logout</a>
		</div>

		<div class="col-md-9 shadow" style="padding: 25px;">
				<h4>
					<small>Welcome Super Admin</small>
				</h4>
				<br><br><br><br><br>
				
				<a href="" class="btn btn-info"><b>CHANGE PASSWORD</b></a>
		</div>
	</div>
</div>

	
<?php include'footer.php';
?>

