<?php include('classes.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="animate.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
	<title>Connekted Login Page</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col">
				<!-- nav div -->
				
				<nav class="navbar navbar-expand-lg">
  					<a class="navbar-brand" href="index.php"><img src="images/logo.png" width="300px" height="100px"></a>
 					 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    				<span class="navbar-toggler-icon"></span>
  					</button>

  					<div class="collapse navbar-collapse" id="navbarSupportedContent">
    					<ul class="navbar-nav ml-auto">
      						<li class="nav-item active">
        						<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      						</li>
      						<li class="nav-item">
        						<a class="nav-link" href="login.php">Login</a>
      						</li>
      						<li class="nav-item">
        						<a class="nav-link" href="userregister.php">User Registration</a>
      						</li>
      						<li class="nav-item">
        						<a class="nav-link" href="artregister.php">Artisan Registration</a>
      						</li>
      
  					</div>
				</nav>
			<div class="col-md-6 offset-3 pt-2" style="min-height: 500px;">
				<h5 align="center">Sign Up <span style="color: purple;">Connekted!</span></h5>
				<h6 align="center">Get Connected to the best Artisans & Professionals by Signing Up</h6>
				<p align="center" style="font-size: 12px;">By continuing, you agree to Conneckted!’s <a href="#">Terms of Service</a> and acknowledge Conneckted!’s <a href="#">Privacy Policy</a>.</p><br>
				<h6>Register</h6>

				<?php
					//validation
					if ($_SERVER['REQUEST_METHOD'] == 'POST') {
						//validate

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
							$output = $objuser->registerUser($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['phone'], $_POST['lga'], $_POST['password']);
							var_dump($output);
					}
}


				//load states in dropdown
					$objuser = new User;
					$output = $objuser->getStates();

				// //load lga in dropdown
				// 	$objuser = new User;
				// 	$output = $objuser->getLGA($stateid);
				// 	var_dump($output);

				?>
				
				<form method="post" action="" class="form-group pt-2" name="userregform" id="userregform">
					<input type="text" name="fname" class="form-control" placeholder="First Name"><br>
					<input type="text" name="lname" class="form-control" placeholder="Last Name"><br>
					<input type="text" name="phone" class="form-control" placeholder="Phone Number"><br>
					<input type="email" name="email" class="form-control" placeholder="Email"><br>
					<input type="password" name="password" class="form-control" placeholder="Password" id="userPwd"><br>
					<input type="password" name="confirmpass" class="form-control" placeholder="Confirm Password" id="confirmUserpwd"><br>
					
					<select class="form-control" name="state" id="state-dropdown">
						<option value="0">State</option>
						<?php 
						foreach ($output as $key => $value){ 
							
						?>
						 <option value="<?php echo $value['state_id'] ?>"><?php echo $value['state_name'] ?></option>;
						<?php } ?>
						
					</select><br>
					
					<select class="form-control" name="lga" id="lga-dropdown">
						<option value="">LGA(Select State First)</option>
					</select><br>
					<input type="submit" name="register" value="Register" class="btn btn-success">
					
				</form>
				</div>

				
				

				
			</div>
		</div>

	</div>
	 
	 <!-- footer -->
<?php include 'footer.php';
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

<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('#state-dropdown').on('change', function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxdata2.php',
                data:{state_id: state_id}
                success:function(html){
                    $('#lga-dropdown').html(html);
                }
            }); 
        }else{
            $('#lga-dropdown').html('<option value="">Select state first</option>'); 
        }
    });