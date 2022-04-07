<?php 
include 'header.php';
?>

	<!-- Page Content -->
  

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Admin
      <small>All Artisans</small>
    </h1>

     
    <!-- Content Row -->
    <div class="row">
     
      <!-- Content Column -->
      <div class="col-lg-12 mb-4">
      <div style='text-align:right'>
    </div>
    
	   <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Address</th>
      <th scope="col">State</th>
	  <th scope="col">LGA</th>
	  <th scope="col">Phone Number</th>
      <th scope="col">Email Address</th>
      <th scope="col">Date Joined</th>
    </tr>
  </thead>
  <tbody>
  <?php 
      //create object of user class
      $objartisan = new Artisan;

      $artisans = $objartisan->getArtisans();

      if(!empty($artisans)){
        $kounter = 0;
        foreach($artisans as $artisan){

    ?>
    <tr>
      <th scope="row"><?php echo ++$kounter; ?></th>
      <td><?php echo $artisan['artisan_fname'];?></td>
      <td><?php echo $artisan['artisan_lname'];?></td>
      <td><?php echo $artisan['artisan_address'];?></td>
      <td><?php echo $artisan['artisan_state'];?></td>
      <td><?php echo $artisan['artisan_lga'];?></td>
      <td><?php echo $artisan['artisan_phone'];?></td>
	  <td><?php echo $artisan['artisan_email'];?></td>
      <td><?php echo date('jS M,Y H:i:s a', strtotime($artisan['artisan_regdate']));?></td>    
      <?php
      }
    }
    ?>
  </tbody>
</table>

<?php include'footer.php';
?>