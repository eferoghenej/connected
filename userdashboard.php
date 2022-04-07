<?php 
session_start();
// $_SESSION['id'];

include ('artheader.php');
?>

<?php 
    //   create object of artisan class;
      $objartisan = new Artisan;

      $artisan = $objartisan->getArtisan($_SESSION['id']);
	//   if(!empty($_SESSION)){
	// 	  echo "<pre>";
	// 	  print_r($_SESSION);
	// 	  echo "</pre>";
	//   }else{
	// 	  echo "nothing";
	//   }
	  
?> 

<?php 
      if(isset($_REQUEST['msg'])){
        echo "<div class='alert alert-danger'>".$_REQUEST['msg']."</div>";
      }
    ?>
<div class="container bg-white mt-4" style='min-height:500px'>
	<div class="row">
		<div class="col-md-3 shadow" style="padding: 10px">
			<h5 style="text-align: center">
				<small>Artisan Dashboard</small>
			</h5>
			<?php 
				if(empty($artisan['artisan_photo'])){
			?>
			<p><img src="images/logo2.png" class="img-fluid"></p>
			<?php 
				}else{
			?>
			<p></p><img src="profile/<?php echo $artsian['artisan_photo']?>" class='img-fluid'></p>
			<?php 
				}
			?>
			<br>
			<a href="upload.php" class="btn btn-info" style="text-align: center">Update Profile Photo</a>
		</div>

		<div class="col-md-9 shadow" style="padding: 25px">
				<h4>
					<small>Welcome <?php echo $_SESSION['artisan_fname']." ". $_SESSION['artisan_lname']; ?></small>
				</h4>
				<br><br><br><br><br><br>
				
				<a href="changepassword.php?artisan_id=<?php echo $_SESSION['id'];?>" class='btn btn-info'>Change Password</a>
				
				<a href="edit.php?artisan_id=<?php echo $_SESSION['id']?>" class='btn btn-info'>Edit Profile</a>

				<a href="addservice.php?artisan_id=<?php echo $_SESSION['id']?>" class='btn btn-info'>Add Service</a>
				
		</div>
	</div>
</div>

	
<?php include'footer.php';
?>









