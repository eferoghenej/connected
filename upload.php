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
      <small>Profile Picture</small>
    </h1>

    <?php 
      // if ($_SESSION['role_id'] == 1){
      //   $userobj = new User;
      //   $user = $userobj->getUser($_SESSION['id']);
      // }else{
        require_once('classes.php');
        $artisanobj = new Artisan;
        $artisan = $artisanobj->getArtisan($_SESSION['id']);
      // }
      
    
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
       <?php 
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

          // var_dump($_POST);
            // echo "<pre>";
            // print_r($_FILES);
            // echo "</pre>";

          //create instance of artisan class
          $artobj = new Artisan;
          $output = $artobj->uploadPhoto($_SESSION['id']);

          if($output === true){
            echo "<div class='alert alert-dismissible alert-success'>Profile photo successfully uploaded!</div>";
          }else{
            echo "<div class='alert alert-dismissible alert-danger'>$output</div>";
          }
        }
        
       
       ?>

        
	   <form method="post" action="" enctype="multipart/form-data">
	   

      <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
     <input type='text' name='email' id="email" class="form-control" value="<?php echo $_SESSION['username']?>" readonly>
    </div>
  </div>
  
    <div class="form-group row">
    <label for="upload" class="col-sm-2 col-form-label">Upload Picture</label>
    <div class="col-sm-10">
     <input type='file' name='mypix' class="form-control" id="upload">
    </div>
  </div>

  
   
  <hr>
  
  <div class="form-group row">
    <div class="col-sm-12">
      <button type="submit" class="btn btn-info">Update Details</button>
    </div>
  </div>
</form>


      </div>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <?php 
  include('footer.php');
  ?>