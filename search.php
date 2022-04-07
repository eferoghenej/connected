<?php 
    // var_dump($_REQUEST);
    include("classes.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST');

    //create instance of search call
    $artisan = new Artisan;
    $result = $artisan->search($_REQUEST['data']);
    if(!empty($result)){
        // echo "<pre>";
	    // var_dump($result);
	    // echo "</pre>";
            foreach($result as $key => $value){
                if(empty($value['artisan_photo'])){
				    $imageurl = "images/logo2.png";
			    }else{
				    $imageurl = "profile/".$value['artisan_photo'];
                }
?>
    <div>
		<a href="single.php?artisan_id=<?php echo $value['artisan_id'];?>"><img src="<?php echo $imageurl ?>" alt="member" class="searchimg"></a>
		<?php echo $value['artisan_fname']." ".$value['artisan_lname']." "." ".$value['service_type']." ".$value['lga_name']; ?>
	</div>

<?php	

        }   
    }



?>