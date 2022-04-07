<?php 
include ('header.php');
?>

<?php 
    if($_SERVER['REQUEST_METHOD']== "POST"){
        //check if fields are not empty
        $errors = array();
        if(empty($_POST['serviceid'])){
            $error[] = "Service ID is required";
        }

        if(empty($_POST['servicename'])){
            $error[] = "Service name is required";
        }
        //check if there are errors
        if(!empty($errors)){
            echo "<ul class='alert alert-danger'>";
                foreach($errors as $error){
                    echo "<li>$error</li>";
                }
            echo "</ul>";
        }else{
            //create a new instance of user category
            $category = new User;

            //make reference to addCategory method
            $output = $category->addCategory($_POST['serviceid'], $_POST['servicename']);
        }
    }
?>

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Admin
      <small>Add Category</small>
    </h1>

     
    <!-- Content Row -->
    <div class="row">
     
      <!-- Content Column -->
      <div class="col-lg-12 mb-4">
      <div style='text-align:right'>
    </div>

    <div class="col-md-6 offset-md-3" style="min-height: 400px">
        <form method="POST" action="">
            <div>
                <label for="serviceid">Service ID</label>
                <input type="text" name="serviceid" id="serviceid" class="form-control">
            </div>

            <div>
                <label for="servicename">Service Name</label>
                <input type="text" name="servicename" id="servicename" class="form-control">
            </div>
            <br>
            <input type="submit" name="add" value="Add" class="btn-primary btn">
        </form>

    </div>


   



<?php 
include'footer.php';
?>