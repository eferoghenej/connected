<?php 
include('frontheader.php');
include('classes.php');
?>
	
	<div class="col-md-6 offset-3 pt-2" style="min-height: 500px;">
				<h5 align="center">Sign Up for or Login to <span style="color: purple;">Connekted!</span></h5>
				<h6 align="center">Get Connected to the best Artisans & Professionals by Signing Up</h6>
				<div id="form1" class="col-sm-12">
				<p align="center" style="font-size: 12px;">By continuing, you agree to Conneckted!’s <a href="#">Terms of Service</a> and acknowledge Conneckted!’s <a href="#">Privacy Policy</a>.</p><br>
				<h6>Register</h6>

<?php
					//validation
					
					if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					// 	validate
					// 	echo "<pre>";
					// 	print_r($_SERVER['REQUEST_METHOD']);
					// 	echo "</pre>";

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

						if (empty($_POST['state'])) {
							$errors[] = "State field is required";
						}

						if (empty($_POST['password'])) {
							$errors[] = "Password field is required";
						}
						if (strlen($_POST['password']) < 8){
              				$errors[] = "Password must be greater than seven characters";
						}
						if ($_POST['password']!==$_POST['confirmpass']){
							$errors[] = "Password does not match";
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
							$objuser = new User;

							//check if email address exists
							if($objuser->checkEmail($_POST['email']) == true){
								echo "<div class='alert alert-danger'>Email Address already taken!</div>";
							}else{
                			// registration
                			
							$output = $objuser->registerUser($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['phone'], $_POST['password'], $_POST['state'], $_POST['lga']);
							
					}
				}
	}
					


					
					
						
				

					


?>
				
				<form method="post" action="" class="form-group pt-2" name="userregform" id="userregform">
					<input type="text" name="fname" class="form-control" placeholder="First Name" value="<?php 
                if(isset($_POST['fname'])){
                  echo $_POST['fname'];
                }
              ?>"><br>
					<input type="text" name="lname" class="form-control" placeholder="Last Name" value="<?php 
                if(isset($_POST['lname'])){
                  echo $_POST['lname'];
                }
              ?>"><br>
          <input type="email" name="email" class="form-control" placeholder="Email" value="<?php 
                if(isset($_POST['email'])){
                  echo $_POST['email'];
                }
              ?>"><br>
					<input type="text" name="phone" class="form-control" placeholder="Phone Number" value="<?php 
                if(isset($_POST['phone'])){
                  echo $_POST['phone'];
                }
              ?>"><br>
					
					<input type="password" name="password" class="form-control" placeholder="Password" id="userPwd"><br>
					<input type="password" name="confirmpass" class="form-control" placeholder="Confirm Password" id="confirmUserpwd"><br>
					<select class="form-control" name="state" id="state-dropdown">
						<option value="">State</option>
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
						<option value="">LGA</option>
					</select><br>
					<p align="right" style="font-size: 12px;"><a href="login.php">Existing User? Login here</a></p>
					<input type="submit" name="register" value="Register" class="btn btn-success">
					
				</form>
				</div>
	</div>


<?php 
include 'footer.php';
?>

<script type="text/javascript">
		function validate(pwd,confirm){
			var pwdInput = document.getElementById(pwd).value;
			var cpwdInput = document.getElementById(confirm).value;
				if (pwdInput != cpwdInput) {
				alert('Passwords do not match')
				}
			}
</script>

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
