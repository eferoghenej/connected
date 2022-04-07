<?php 
session_start();
// $_SESSION['id'];
include 'artheader.php';
?>

	<div class="col-md-6 offset-3 pt-2">
		<h1>
			<small>Edit Profile</small>
		</h1>

		<?php

		  $artobj = new Artisan;
          $artisan = $artobj->getArtisan($_REQUEST['artisan_id']);

		//   if(!empty($artisan)){
		// 	echo "<pre>";
		// 	print_r($artisan);
		// 	echo "</pre>";
		// }else{
		// 	echo "nothing";
		// }
					

					//validation
					if ($_SERVER['REQUEST_METHOD'] == 'POST') {

						$errors = array();
						if (empty($_POST['fname'])) {
							$errors[] = "Firstname field is required";
						}

						if (empty($_POST['lname'])) {
							$errors[] = "Lastname field is required";
						}

						if (empty($_POST['email'])) {
							$errors[] = "Email field is required";
						}

						if (empty($_POST['phone'])) {
							$errors[] = "Phone number field is required";
						}

						if (empty($_POST['lga'])) {
							$errors[] = "LGA field is required";
						}

						if (empty($_POST['lga'])) {
							$errors[] = "State field is required";
						}

						if(empty($_POST['profile'])){
              				$errors[] = "Short Profile field is required";
            			}

						if (empty($_POST['address'])) {
							$errors[] = "Address field is required";
						}

						if (empty($_POST['service'])) {
							$errors[] = "Service field is required";
						}

						//check if there are errors
						if (!empty($errors)) {
							echo "<ul class = 'alert alert-danger'>";
							foreach ($errors as $key => $value) {
								echo "<li>$value</li>";
							}
							echo "</ul>";
						}else{
							//create object of user class
							$objart = new Artisan;

							//check if email address exists
							if($objart->checkEmail($_POST['email']) == true){
								echo "<div class='alert alert-danger'>Email Address already taken!</div>";
							}else{
                			// registration
                			
							$output = $objart->updateArtisan($_POST['fname'], $_POST['lname'], $_POST['phone'], $_POST['email'], $_POST['address'], $_POST['service'], $_POST['state'], $_POST['lga'], $_POST['profile'], $_POST['artisan_id']);
							
							if(key($output)=='success'){
								//redirect to members page
								$message = $output['success'];
								echo $message;
								header("Location: userdashboard.php?msg=$message");
							  }else{
								echo "<div class='alert alert-danger alert-dismissible'>".$output['error']."</div>";
							  }
					}
				}
	}
					


					//load category in dropdown
					$user = new User;
					$outcome = $user->getCategories();
?>
		<form method="post" action="" class="form-group pt-2" name="artregform" id="artregform">
					<input type="text" name="fname" class="form-control" placeholder="First Name" value="<?php 
                if(isset($artisan['artisan_fname'])){
                  echo $artisan['artisan_fname'];
                }
              ?>"><br>
					<input type="text" name="lname" class="form-control" placeholder="Last Name" value="<?php 
                if(isset($artisan['artisan_lname'])){
                  echo $artisan['artisan_lname'];
                }
              ?>"><br>
					<input type="email" name="email" class="form-control" placeholder="Email" value="<?php 
                if(isset($artisan['artisan_email'])){
                  echo $artisan['artisan_email'];
                }
              ?>"><br>
					<input type="text" name="phone" class="form-control" placeholder="Phone Number" value="<?php 
                if(isset($artisan['artisan_phone'])){
                  echo $artisan['artisan_phone'];
                }
              ?>"><br>
					<input type="text" name="address" class="form-control" placeholder="Address" value="<?php 
                if(isset($artisan['artisan_address'])){
                  echo $artisan['artisan_address'];
                }
              ?>"><br>
					<label>Profile (short):</label>
              		<textarea rows="5" cols="50" name='profile' class="form-control" id="profile"  maxlength="300" style="resize:none" value="<?php
					  if(isset($artisan['artisan_profile'])){
						  echo $artisan['artisan_profile'];
					  }
					  ?>"></textarea><br>
					<input type="text" name="bizname" class="form-control" placeholder="Business Name(Optional)"><br>
					
					<select class="form-control" name="service">
						<option value="0">Service Category</option>
						<?php 
							foreach ($outcome as $key){
						?>
						<option value="<?php echo $key['service_id'] ?>"><?php echo $key['service_type'] ?></option>
						<?php } ?>
					</select><br>
					<!-- <label for="profilepic">Upload Photo</label><br>
					<input type="file" name="profilepic" id="profilepic" accept="image/*"><br><br> -->
					<select class="form-control" name="state" id="state-dropdown">
						<option value="0">State</option>
						<?php
							require_once "db.php";
							$result = mysqli_query($conn,"SELECT * FROM state");
							while($row = mysqli_fetch_array($result)) {
							?>
							<option value="<?php echo $row['state_id'];?>"><?php echo $row["state_name"];?></option>
							<?php
							}
						?>
					</select><br>
					<select class="form-control" name="lga" id="lga-dropdown">
						<option value="0">LGA</option>
					</select><br>
					<!-- <p align="right" style="font-size: 12px;"><a href="login.php">Registered? Login Here</a></p>
					<input type="submit" name="update" value="Update" class="btn btn-success"> -->
					<input type="hidden" name="artisan_id" value="<?php echo $_REQUEST['artisan_id'];?> ">
          			<input type="submit" name="updateuser" class="btn btn-primary" id="sendMessageButton" value="Save Changes">

				</form>
			</div>
<?php include 'footer.php';
?>

<script>
	$(document).ready(function() {
	$('#state-dropdown').on('change', function() {
	var state_id = this.value;
		$.ajax({
			url: "ajaxdata.php",
			type: "POST",
			data: {state_id: state_id},
		cache: false,
		success: function(result){
		$("#lga-dropdown").html(result); 
		}
	});
	});
});    
</script>