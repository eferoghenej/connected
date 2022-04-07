<?php 
include("frontheader.php");
include("classes.php");
include("search2.php");
?>

<!-- container -->
<div class="container"  style="min-height: 500px">
    <div class ="row">
        
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
      //create instance of artisan class
      $objartisan = new Artisan;
      $artisans = $objartisan->categoryShopping();

      if (!empty($artisans)) {
        foreach ($artisans as $artisan){
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