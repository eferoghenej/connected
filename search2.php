<div class="row">
                <div class="input-group col-md-8 offset-md-3">
                    <form method="POST" action="searchresult.php" class="form-inline">
                    <?php
                    //load category in dropdown
					$user = new User;
					$outcome = $user->getCategories();
                    ?>
    				<select class="form-control" name="service">
                    <option value="0">Service Category</option>
						<?php 
							foreach ($outcome as $key){
						?>
						<option value="<?php echo $key['service_id'] ?>"><?php echo $key['service_type'] ?></option>
						<?php } ?>
					</select>
    				<input type="text" class="form-control" placeholder="LGA" name="lga" id="lga">
                    <input type="hidden" name="category_id" value="<?php echo $key['service_id'];?>">
                    <a href="searchresult.php?service_id=<?php echo $key['service_id']; ?>"><button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button></a>
					</div>
    				<!-- <div id="showresult" class="col-md-8 offset-md-2"></div> -->
        <!-- <div class="input-group-append"> -->
            
        <!-- </div> -->
        </form>
				</div>
                