<?php
  include 'frontheader.php';
  include 'classes.php';
?>

<div class="container" style="min-height: 500px;">

<?php 
  $artisan_id = $_GET['artisan_id'];
  $objartisan = new Artisan;
  $output = $objartisan->getArtisan($artisan_id);
  // if(!empty($output)){

?>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Home</a>
      </li>
      <li class="breadcrumb-item">
        <a href="landing.php">Artisans</a>
      </li>
      <li class="breadcrumb-item active"><?php echo $output['artisan_fname']." "." ".$output['artisan_lname']  ?></li>
    </ol>


    <!-- Portfolio Item Row -->
    <div class="row">

      <div class="col-md-8">
        <?php 
            if(empty($output['artisan_photo'])){
        ?>
        <img class="img-fluid" src="images/logo1.png" alt="sample image">
        <?php 
            }else{
        ?>
        <img src="profile/<?php echo $artisan['artisan_photo'] ?>" class="img-fluid" alt="sample image">
        <?php 
            }
        ?>

      </div>

      <div class="col-md-4">
        <h3 class="my-3">Profile</h3>
        <p><?php echo $output['artisan_profile'] ?></p>
        <h3 class="my-3">Details</h3>
        <ul>
          <li>Email: <?php echo $output['artisan_email'] ?></li>
          <li>Phone Number: <?php echo $output['artisan_phone'] ?></li>
          
        </ul>
      </div>

    </div>
</div>
    <!-- /.row -->
 <!-- <div class='row' style='height:60px;'></div> -->

<!-- footer -->
<?php
  include 'footer.php'
?>