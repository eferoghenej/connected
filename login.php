<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
	session_destroy();
    header("location: index.php");
    exit;
}
 
// Include config file
include('frontheader.php');
include('classes.php');
?>

<?php 

							
							if ($_SERVER['REQUEST_METHOD']== 'POST') {
								//check if fields are not empty
								$errors = array();
								if (empty(trim($_POST['username']))) {
									$error[] = "Username is required to login!";
								}

								if (empty(trim($_POST['pwd']))) {
									$error[] = "Password is required to login!";
								}

								// check if there are errors
								if (empty($errors)) {
									//create instance of User class
          							$userobj = new User;

          						//make reference to login method
						          $output = $userobj->login($_POST['username'], $_POST['pwd']);
						          if(!empty($output)){
						            //var_dump($output);
								
			                            session_start();
			                            // Store data in session variables
			                            $_SESSION['loggedin'] = true;
			                            $_SESSION['id'] = $output['user_id'];
			                            $_SESSION['username'] = $output['user_email'];
										$_SESSION['role_id'] = $output['role_id'];
										$_SESSION['user_fname'] = $output['user_fname'];
						// check if session is set and give access. this is your personal key known only to you.
										$_SESSION['yekdetcennoc'] = "__23cc99asspro";
			                            if($_SESSION['role_id']==1){
			                            // Redirect user to welcome page
			                            header("Location: http://localhost/connected/admin.php");
										}else{
											header("Location: http://localhost/connected/landing.php");
										}
										exit;
			                   }else if (empty($errors)) {
								//create instance of artisan class
								  $artobj = new Artisan;

							  //make reference to login method
							  $output = $artobj->artLogin($_POST['username'], $_POST['pwd']);
							  if(!empty($output)){
								//var_dump($output);
								if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
									session_destroy();
								}
									session_start();
									
									// Store data in session variables
									$_SESSION['loggedin'] = true;
									$_SESSION['id'] = $output['artisan_id'];
									$_SESSION['username'] = $output['artisan_email'];
									$_SESSION['role_id'] = $output['role_id'];
									$_SESSION['artisan_fname'] = $output['artisan_fname'];
									$_SESSION['artisan_lname'] = $output['artisan_lname'];
					// check if session is set and give access. this is your personal key known only to you.
									$_SESSION['yekdetcennoc'] = "__23cc99asspro";
									if($_SESSION['role_id']==3){
			                            // Redirect user to welcome page
			                            header("Location: http://localhost/connected/userdashboard.php");
										}
								exit;
							  }else{
										 echo "<div class='alert alert-danger'>Invalid username or password!</div>";
								}
							}	
						}
					}

			

			
?>
		<div class="container" style='min-height:500px'>
				<div class="row">
					<div class="col-md-6 offset-3">		
							<form class="form-group" method="POST" action="" name="loginform">
									<p align="center" style="font-size: 12px;">By logging in, you agree to Conneckted!’s <a href="#">Terms of Service</a> and acknowledge Conneckted!’s <a href="#">Privacy Policy</a></p><br>
									<h6>Login</h6>
									<input type="text" name="username" placeholder="Email address" class="form-control"><br>
									<input type="password" name="pwd" placeholder="Password" class="form-control">
									<p align="right" style="font-size: 12px;"><a href="#">Forgot Password</a></p>
									<input type="submit" name="login" value="Login" class="btn-primary btn">
							</form>
					</div>
				

			</div>
		</div>

	<?php include 'footer.php';
?>
	 
	 <!-- footer -->





