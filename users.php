<?php 
include 'header.php';
?>

	<!-- Page Content -->
  

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Admin
      <small>All Users</small>
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
      $objuser = new User;

      $users = $objuser->getUsers();

      if(!empty($users)){
        $kounter = 0;
        foreach($users as $user){

    ?>
    <tr>
      <th scope="row"><?php echo ++$kounter; ?></th>
      <td><?php echo $user['user_fname'];?></td>
      <td><?php echo $user['user_lname'];?></td>
      <td><?php echo $user['user_state'];?></td>
      <td><?php echo $user['user_lga'];?></td>
      <td><?php echo $user['user_phone'];?></td>
	  <td><?php echo $user['user_email'];?></td>
      <td><?php echo date('jS M,Y H:i:s a', strtotime($user['user_regdate']));?></td>    
      <?php
      }
    }
    ?>
  </tbody>
</table>

<?php include'footer.php';
?>