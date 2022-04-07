<?php 
include("frontheader.php");
include("classes.php");
// include("searchbox.php");
include("search2.php");
?>

<!-- container -->
<div class="container">
    <?php 

        if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty('POST')){
            $objartisan = new Artisan;
            $output = $objartisan->searchByParams($_POST['service'], $_POST['lga']);
        }
    ?>
    <div class ="row">
        <!-- <div class="input-group col-md-8 offset-md-2">
            <input type="text" class="form-control" placeholder="Category">
            <input type="text" class="form-control" placeholder="LGA">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
            </div>
        </div> -->
    </div>
    <hr>

    <div class="row">
        <?php 
            include("navbar.php"); 
        ?>
        
        
        
        <div class="col-md-9 col-sm-6">
            <h1>
                <small>Registered Artisans/Professionals</small>
            </h1>
            <div id="card-div">
            <?php
    

      if (!empty($output)) {
        foreach ($output as $artisan){
      ?>
            <div class="card mb-3 mt-1">
                <div class="row">
                    <div class="col-md-3">
                        
                            <?php 
                                if(empty($artisan['artisan_photo'])){
                            ?>
                            <img src="images/logo2.png" class="card-img">
                            <?php 
                                }else{
                            ?>
                            
                            <img src="profile/<?php echo $artisan['artisan_photo'] ?>" class="card-img">
                            <?php 
                                }
                            ?>
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h5 class="card-title"><a href="single.php?artisan_id=<?php echo $artisan['artisan_id'];?>"><?php echo $artisan['artisan_fname']." ".$artisan['artisan_lname']?></a></h5>
                            
                            <p class="card-text"><?php echo $artisan["artisan_profile"] ?></p>
                            <p class="card-text">Category: <?php echo $artisan['service_type'] ?></p>
                        </div>
                    </div>
            </div>
        </div>
        <?php 
                    }
                }else{
                    echo "<h3>No record found</h3>";
                }

            ?>
        </div>
    
        </div>
    </div>
    
<!-- container close -->
</div>
    


<!-- footer -->
<?php 
    include("frontfooter.php");
?>