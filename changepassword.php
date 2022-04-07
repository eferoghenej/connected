<?php 
session_start();
if ($_SESSION['role_id'] == 1){
  include('header.php');
}else if($_SESSION['role_id'] ==3){
  include('artheader.php');
}

?>

  <!-- Page Content -->
  <div class="container" style="min-height: 500px">
       
    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Update
      <small>Password</small>
    </h1>

    <?php 
    //   if ($_SESSION['role_id'] == 1){
    //     $userobj = new User;
    //     $user = $userobj->getUser($_REQUEST['user_id']);
    //   }else{
        // require_once('classes.php');
        $artisanobj = new Artisan;
        $artisan = $artisanobj->getArtisan($_REQUEST['artisan_id']);
    //   }
      
       //validation
       if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $errors = array();

        if(empty($_POST['password'])){
            $errors[] = "Current password is required";
        }

        if(empty($_POST['newpass'])){
            $errors[] = "New password is required";
        }

        if(empty($_POST['confirm'])){
            $errors[] = "Please confirm your new password";
        }

        if (strlen($_POST['newpass']) < 8){
          $errors[] = "Password must be greater than seven characters";
        }

        // if(strlen($_POST['newpass']) !== strlen($_POST['confirm'])){
        //   $errors[] = "Password does not match";
        // }
  
        if ($_POST['newpass']!== $_POST['confirm']){
          $errors[] = "Password does not match";
        }

      

       //check if there are $errors

       if(!empty($errors)){
         echo "<ul class='alert alert-danger'>";
           foreach ($errors as $error){
             echo "<li>$error</li>";
           }
         echo "</ul>";
       }else{
         //create object of artisan class
         $objartisan = new Artisan;

         //check password
         if($objartisan->checkPassword($_POST['email'], $_POST['password']) == false){
        echo "<div class='alert alert-danger'>Details don't match what is on file</div>";
      }else{
        //update password
        $output = $objartisan->updatePassword($_POST['newpass'], $_POST['email']);

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

    
    ?>

   

    <!-- Content Row -->
    <div class="row">
      <!-- Sidebar Column -->
      <div class="col-lg-3 mb-4">
	  <div>
      <?php 
        if(empty($artisan['artisan_photo'])){
      ?>
      <img src="images/logo2.png" class="img-fluid">
      <?php 
      }else{
      ?>    
      <img src="profile/<?php echo $artsian['artisan_photo']?>" class='img-fluid'>
      <?php 
        }
      ?>

	  </div>
        <div class="list-group">
          <a href="index.php" class="list-group-item">Home</a>
          <a href="edit.php?artisan_id=<?php echo $_SESSION['id']?>" class="list-group-item">Edit Profile</a>
          <a href="logout.php" class="list-group-item">Logout</a>
        </div>
    </div>
      <!-- Content Column -->
      <div class="col-lg-9 mb-4">
       <h4><?php echo $_SESSION['artisan_fname']." ". $_SESSION['artisan_lname']?> </h4> 
      
        
	   <form method="post" action="">
	   

      <div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
     <input type='text' name='email' id="email" class="form-control" value="<?php echo $_SESSION['username']?>" readonly>
    </div>
  </div>
  
    <div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label">Current Password</label>
    <div class="col-sm-10">
     <input type='password' name='password' id="password" class="form-control">
    </div>
  </div>

  <div class="form-group row">
    <label for="pwd" class="col-sm-2 col-form-label">New Password</label>
    <div class="col-sm-10">
     <input type='password' name='newpass' id="newpwd" class="form-control">
    </div>
  </div>

  <div class="form-group row">
    <label for="confirm" class="col-sm-2 col-form-label">Confirm Password</label>
    <div class="col-sm-10">
     <input type='password' name='confirm' id="confirm" class="form-control">
    </div>
  </div>
    
    
    <input type="hidden" name="artisan_id" value="<?php echo $_REQUEST['artisan_id'];?>">
    <input type="submit" name="updateuser" class="btn btn-primary" id="sendMessageButton" value="Save Changes">

</form>


      </div>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <?php 
  include('footer.php');
  ?>

<script type="text/javascript">
		function validate(newpwd,confirm){
			var pwdInput = document.getElementById(newpwd).value;
			var cpwdInput = document.getElementById(confirm).value;
				if (pwdInput != cpwdInput) {
				alert('Passwords do not match')
				}
			}
</script>