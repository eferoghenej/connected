<?php 
include 'header.php';
?>

	<!-- Page Content -->
  

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Admin
      <small>All Services</small>
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
      <th scope="col">Service ID</th>
      <th scope="col">Service Name</th>
    </tr>
  </thead>
  <tbody>
  <?php 
      //create object of user class
      $objuser = new User;

      $users = $objuser->getCategories();

      if(!empty($users)){
        $kounter = 0;
        foreach($users as $user){

    ?>
    <tr>
      <th scope="row"><?php echo ++$kounter; ?></th>
      <td><?php echo $user['service_id'];?></td>
      <td><?php echo $user['service_type'];?></td>
    </tr>  
      <?php
      }
    }
    ?>
  </tbody>
</table>

<?php include'footer.php';
?>