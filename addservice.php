<?php 
session_start();
    include('artheader.php');
?>

  <!-- Page Content -->
  <div class="container" style="min-height: 500px">
       
    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Add 
      <small>Service</small>
    </h1>

    <?php 
   
        $artisanobj = new Artisan;
        $artisan = $artisanobj->getArtisan($_REQUEST['artisan_id']);
    
      
       //validation
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $errors = array();
          
          if(empty($_POST['service'])){
            $error[] = "Service is required";
          }
          //check if there are $errors
          if(!empty($errors)){
            echo "<ul class='alert alert-danger'>";
              foreach($errors as $errror){
                echo "<li>$error</li>";
              }
            echo "</ul>";
          }else{
            //create instance of artisan class
            $service = new Artisan;
            
            //make reference to addService method
            $output = $service->addService($_POST['artisan_id'], $_POST['service']);
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
  
    <div>
        <select class="form-control" name="service" id="service">
			<option value="0">Service Category</option>
				<?php 
                    //load category in dropdown
					$user = new User;
					$outcome = $user->getCategories();
					foreach ($outcome as $key){
				?>
			<option value="<?php echo $key['service_id'] ?>"><?php echo $key['service_type'] ?></option>
				<?php 
                    } 
                ?>
		</select><br>
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