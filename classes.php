<?php
	#include constants file
	include("constants.php");

	#begin user class
	class User {
		//member variables and properties
		public $firstname;
		public $lastname;
		public $email;
		public $conn;//database connection handler

		public function __construct(){
			$this->conn = new MySQli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);
				if ($this->conn->connect_error) {
					die("Connection failed ".$this->conn->connect->error);
				}
		}

		//method to register user
		public function registerUser($fname, $lname, $phone, $email, $password, $state, $lga){
		$pwd = md5($password);
		
		//write sql query
		$sql = "INSERT INTO users(user_fname, user_lname, user_email, user_phone, user_password, user_state, user_lga) VALUES (?,?,?,?,?,?,?)";
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param("sssssss", $fname, $lname, $phone, $email, $pwd, $state, $lga);
		//run the query
		$stmt->execute();
		
		if ($this->conn->affected_rows== 1) {
				echo "<div class='alert alert-success'>User was successfully registered! You will be automatically be redirected to the landing page!</div>";
				header('Refresh: 10; URL=http://localhost/connected/landing.php');
			}else{
				echo "<div class='alert alert-danger'>Could not add user!</div>";
			}
		

		}

		public function login($email, $password){
				$password = md5($password);
				//write the query
				$sql = "SELECT * FROM users WHERE user_email=? AND user_password=?";
				mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
				//run the query
				$stmt = $this->conn->prepare($sql);
				$stmt->bind_param("ss", $email, $password);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				if ($result->num_rows ==1) {
					return $row;
				}else{
					return $row;
				}

			}

			

		

		//check if email address isn't taken
		public function checkEmail($email){
				//write query
				$sql = "SELECT user_email FROM users WHERE user_email=?";
				$stmt = $this->conn->prepare($sql);
				$stmt->bind_param("s", $email);
				//run the query
				$stmt->execute();
				$result = $stmt->get_result();
				//fetch result
				$row = $result->fetch_assoc();

				if($this->conn->affected_rows == 1){
					return true;
				}else{
					return false;
				}

			}

		

		public function getStates(){
			//write query
			$sql = "SELECT * FROM state";
			$result = $this->conn->query($sql);

			$state =[];
			if ($this->conn->affected_rows > 0) {
				while ($row = $result->fetch_assoc()) {
				$state[] = $row;
			}
			return $state;
			}else{
				return $state;
			}
		}



		 public function getLga($state_id){
		 	//write query
        	$sql = "SELECT * FROM `lga` JOIN state ON lga.state_id = state.state_id WHERE state.state_id='$state_id'";
        	$result = $this->conn->query($sql);
 			$row = "";
 			$rows = [];
        	if ($this->conn->affected_rows > 0){
        		while($row = $result->fetch_assoc()){
        		$rows[] = $row;
        	}
        	return $rows;
        	}else{
        		return $row;
        	}
       }

		public function getCategories(){
			//write sql
			$sql = "SELECT * FROM services";
			$result = $this->conn->query($sql);

			$category = [];
			if ($this->conn->affected_rows > 0){
				while ($row = $result->fetch_assoc()){
					$category[] = $row;
				}
				return $category;
			}else{
				return $category;
			}
		}

		public function getCategory($category_id){
			//write sql
			$sql = "SELECT * FROM services WHERE service_id=$category_id";
			$result = $this->conn->query($sql);

			$category = [];
			if ($this->conn->affected_rows > 0){
				while ($row = $result->fetch_assoc()){
					$category[] = $row;
				}
				return $category;
			}else{
				return $category;
			}
		}

		// fetch all users
			public function getUsers(){
				//write the query
				$sql = "SELECT * FROM users WHERE role_id='2'";
				//run the query
				$result = $this->conn->query($sql); 

				$rows = array();
				if ($this->conn->affected_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						$rows[] = $row;
					}
					return $rows;
				}else{
					return $rows;
				}

			}

			//fetch a specific user based on the artisan_id
			public function getUser($user_id){
				//wtite the query
				$sql = "SELECT * FROM users WHERE user_id=?";
				mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
				$stmt = $this->conn->prepare($sql);
				$stmt->bind_param("i", $artisan_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$rows = $result->fetch_assoc();
				//fetch the row
				if($this->conn->affected_rows ==1){
					return $rows;
				}else{
					return $rows;
				}
				
			}


			public function addCategory($id, $name){
				//write sql
				$sql = "INSERT INTO services(service_id, service_type) VALUES(?,?)";
				mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
				$stmt = $this->conn->prepare($sql);
				$stmt->bind_param("is", $id, $name);
				$stmt->execute();
				
				if ($this->conn->affected_rows== 1) {
					echo "<div class='alert alert-success'>Category was successfully added!</div>";
				}else{
					echo "<div class='alert alert-danger'>Could not add Category!</div>";
				}
			
			}
			









	}
	#end user class

	#begin artisan class

	class Artisan extends User{
		
		//method to register artisan
		public function registerArtisan($fname, $lname, $phone, $email, $password, $address, $service, $state, $lga){
			$pwd = md5($password);
			
			//write sql query
			$query = "INSERT INTO artisans(artisan_fname, artisan_lname, artisan_email, artisan_phone, artisan_password, artisan_address, artisan_service, artisan_state, artisan_lga) VALUES (?,?,?,?,?,?,?,?,?)";
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			$stmt = $this->conn->prepare($query);
			$stmt->bind_param("sssssssss", $fname, $lname, $phone, $email, $pwd, $address, $service, $state, $lga);
			//run the query
			$stmt->execute();
	
			
			if ($this->conn->affected_rows== 1) {
				echo "<div class='alert alert-success'>User was successfully registered! You will be automatically be redirected to the landing page!</div>";
				header('Refresh: 10; URL=http://localhost/connected/landing.php');
				}else{
					echo "<div class='alert alert-danger'>Could not add user!</div>";
				}
			}

			public function artLogin($email, $password){
				$password = md5($password);
				//write the query
				$sql = "SELECT * FROM artisans WHERE artisan_email=? AND artisan_password=?";
				mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
				//run the query
				$stmt = $this->conn->prepare($sql);
				$stmt->bind_param("ss", $email, $password);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				if ($result->num_rows ==1) {
					return $row;
				}else{
					return $row;
				}

			}

			//fetch all artisans
			public function getArtisans(){
				//write the query
				$sql = "SELECT * FROM artisans";
				mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
				//run the query
				$result = $this->conn->query($sql); 

				$rows = array();
				if ($this->conn->affected_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						$rows[] = $row;
					}
					return $rows;
				}else{
					return $rows;
				}

			}

			//fetch a specific artisan based on the artisan_id
			public function getArtisan($artisan_id){
				//wtite the query
				$sql = "SELECT * FROM artisans WHERE artisan_id=?";
				mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
				$stmt = $this->conn->prepare($sql);
				$stmt->bind_param("i", $artisan_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$rows = $result->fetch_assoc();
				//fetch the row
				if($this->conn->affected_rows ==1){
					return $rows;
				}else{
					return $rows;
				}
				
			}

			//update artisan
			public function updateArtisan($fname, $lname, $phone, $email, $address, $service, $state, $lga,  $profile,  $artisan_id){
				//write update query
				$sql = "UPDATE artisans SET artisan_fname=?, artisan_lname=?, artisan_phone=?, artisan_email=?, artisan_address=?, artisan_service=?, artisan_state=?, artisan_lga=?, artisan_profile=? WHERE artisan_id=?";
				mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
				$stmt = $this->conn->prepare($sql);
				$stmt->bind_param("ssssssssss", $fname, $lname, $phone, $email, $address, $service, $state, $lga, $profile, $artisan_id );
				$stmt->execute();

				$output = array();
				if ($this->conn->affected_rows==1){
					$output['success'] = "Member details was successfully updated!";
				}elseif($this->conn->affected_rows==0){
					$output['success'] = "No changes made!";
				}else{
					$output['error'] = "Oops! Something happened!".$this->conn->error;
				}
				return $output;
			}
			
			public function uploadPhoto($artisan_id){

				//file variables
				$filename = $_FILES['mypix']['name'];
				$filesize = $_FILES['mypix']['size'];
				$filetype = $_FILES['mypix']['type'];
				$file_error = $_FILES['mypix']['error'];
				$file_tmp_name = $_FILES['mypix']['tmp_name'];

				//validation 
				$errors = array();
				//check if file is selected
				if($file_error > 0){
					$error = "You have not selected any file for upload";
					return $error;
				}

				//check if file size is greater than 2mb
				if($filesize > 2097152){
					$error = "File size should not exceed 2MB";
					return $error;
				}

				$extensions = array("gif", "png", "jpg", "jpeg", "svg");
				$file_ext = explode(".", $filename);
				$file_ext = end($file_ext);

				if(!in_array(strtolower($file_ext), $extensions)){
					$error = $file_ext." file format is not supported";
					return $error;
				}

				//upload image
				$folder = "profile/";
				$newfilename = time().rand().".".$file_ext;
				$destination = $folder.$newfilename;

				if(move_uploaded_file($file_tmp_name, $destination)){
					//write sql
					$sql = "UPDATE artisans SET artisan_photo='$newfilename' WHERE artisan_id ='$artisan_id'";
					mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
					
					//run the query
					$result = $this->conn->query($sql);

					if ($this->conn->affected_rows ==1){
						return true;
					}else{
						return "Oops! something happened ".$this->conn->error;
					}
				}
			}

			//check if password is correct
		public function checkPassword($email, $password){
			$password = md5($password);
			//write query
			$sql = "SELECT * FROM artisans WHERE artisan_email=? AND artisan_password=?";
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param("ss", $email, $password);
			//run the query
			$stmt->execute();
			$result = $stmt->get_result();
			//fetch result
			$row = $result->fetch_assoc();

			if($this->conn->affected_rows == 1){
				return true;
			}else{
				return false;
			}

		}

		//update artisan
		public function updatePassword($password, $email){
			$password = md5($password);
			//write update query
			$sql = "UPDATE artisans SET artisan_password=? WHERE artisan_email=?";
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param("ss", $password, $email);
			$stmt->execute();

			$output = array();
			if ($this->conn->affected_rows==1){
				$output['success'] = "Member details was successfully updated!";
			}else{
				$output['error'] = "Oops! Something happened!".$this->conn->error;
			}
			return $output;
		}

		//fetch featured users
		public function getFeaturedArtisans(){
			$sql = "SELECT artisans.*, services.* FROM services JOIN artisans ON artisans.artisan_service=services.service_id ORDER BY rand()";
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			$result = $this->conn->query($sql);
			$rows = array();
			if ($this->conn->affected_rows > 0){
				while($row = $result->fetch_assoc()) {
					$rows[] = $row;
				}
				return $rows;
			}else{
				return $rows;
			}
		}

		public function addService($id, $service){
			//write sql
			$sql = "INSERT INTO artisans_services(artisan_id, service_id) VALUES(?,?)";
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param("ii", $id, $service);
			$stmt->execute();
			
			if ($this->conn->affected_rows== 1) {
				echo "<div class='alert alert-dismissible alert-success'>Service was successfully added!</div>";
			}else{
				echo "<div class='alert alert-dismissible alert-danger'>Could not add Service!</div>";
			}
		
		}


		public function categoryHomeServices(){
			$sql = "SELECT artisans.*, services.* FROM services JOIN artisans ON artisans.artisan_service=services.service_id WHERE service_id = 1 ORDER BY rand()";
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			$result = $this->conn->query($sql);
			$rows = array();
			if ($this->conn->affected_rows > 0){
				while($row = $result->fetch_assoc()) {
					$rows[] = $row;
				}
				return $rows;
			}else{
				return $rows;
			}
		}

		public function categoryShopping(){
			$sql = "SELECT artisans.*, services.* FROM services JOIN artisans ON artisans.artisan_service=services.service_id WHERE service_id = 2 ORDER BY rand()";
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			$result = $this->conn->query($sql);
			$rows = array();
			if ($this->conn->affected_rows > 0){
				while($row = $result->fetch_assoc()) {
					$rows[] = $row;
				}
				return $rows;
			}else{
				return $rows;
			}
		}

		public function categoryAutomotive(){
			$sql = "SELECT artisans.*, services.* FROM services JOIN artisans ON artisans.artisan_service=services.service_id WHERE service_id = 3 ORDER BY rand()";
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			$result = $this->conn->query($sql);
			$rows = array();
			if ($this->conn->affected_rows > 0){
				while($row = $result->fetch_assoc()) {
					$rows[] = $row;
				}
				return $rows;
			}else{
				return $rows;
			}
		}

		public function categoryBars(){
			$sql = "SELECT artisans.*, services.* FROM services JOIN artisans ON artisans.artisan_service=services.service_id WHERE service_id = 4 ORDER BY rand()";
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			$result = $this->conn->query($sql);
			$rows = array();
			if ($this->conn->affected_rows > 0){
				while($row = $result->fetch_assoc()) {
					$rows[] = $row;
				}
				return $rows;
			}else{
				return $rows;
			}
		}

		public function categoryResturants(){
			$sql = "SELECT artisans.*, services.* FROM services JOIN artisans ON artisans.artisan_service=services.service_id WHERE service_id = 5 ORDER BY rand()";
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			$result = $this->conn->query($sql);
			$rows = array();
			if ($this->conn->affected_rows > 0){
				while($row = $result->fetch_assoc()) {
					$rows[] = $row;
				}
				return $rows;
			}else{
				return $rows;
			}
		}

		public function categoryActivities(){
			$sql = "SELECT artisans.*, services.* FROM services JOIN artisans ON artisans.artisan_service=services.service_id WHERE service_id = 6 ORDER BY rand()";
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			$result = $this->conn->query($sql);
			$rows = array();
			if ($this->conn->affected_rows > 0){
				while($row = $result->fetch_assoc()) {
					$rows[] = $row;
				}
				return $rows;
			}else{
				return $rows;
			}
		}

		public function categoryBeauty(){
			$sql = "SELECT artisans.*, services.* FROM services JOIN artisans ON artisans.artisan_service=services.service_id WHERE service_id = 7 ORDER BY rand()";
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			$result = $this->conn->query($sql);
			$rows = array();
			if ($this->conn->affected_rows > 0){
				while($row = $result->fetch_assoc()) {
					$rows[] = $row;
				}
				return $rows;
			}else{
				return $rows;
			}
		}

		public function categoryGadgets(){
			$sql = "SELECT artisans.*, services.* FROM services JOIN artisans ON artisans.artisan_service=services.service_id WHERE service_id = 8 ORDER BY rand()";
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			$result = $this->conn->query($sql);
			$rows = array();
			if ($this->conn->affected_rows > 0){
				while($row = $result->fetch_assoc()) {
					$rows[] = $row;
				}
				return $rows;
			}else{
				return $rows;
			}
		}

		public function categoryDental(){
			$sql = "SELECT artisans.*, services.* FROM services JOIN artisans ON artisans.artisan_service=services.service_id WHERE service_id = 9 ORDER BY rand()";
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			$result = $this->conn->query($sql);
			$rows = array();
			if ($this->conn->affected_rows > 0){
				while($row = $result->fetch_assoc()) {
					$rows[] = $row;
				}
				return $rows;
			}else{
				return $rows;
			}
		}

		public function search($searchdata){
			$searchdata = stripslashes(strip_tags(htmlspecialchars($searchdata)));
			//write sql
			$sql = "SELECT artisans.*, lga.*, services.* FROM services JOIN artisans ON artisan_service=service_id JOIN lga ON artisan_lga=lga_id WHERE lga_name LIKE '%$searchdata%' or service_type LIKE '%$searchdata%'";
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			//run the query
			$result = $this->conn->query($sql);
			$rows = array();

			if($this->conn->affected_rows > 0){
				while($row = $result->fetch_assoc()){
					$rows[] = $row;
				}	
					return $rows;
				}else{
					return $rows;
				}
		}

		public function searchByParams($service_id, $lga_name){
			$lga_name = stripslashes(strip_tags(htmlspecialchars($lga_name)));
			//write sql
			$sql = "SELECT artisans.*, lga.*, services.* FROM services JOIN artisans ON artisan_service=service_id JOIN lga ON artisan_lga=lga_id WHERE service_id=$service_id AND lga_name='$lga_name'";
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			//run the query
			$result = $this->conn->query($sql);
			$rows = array();

			if($this->conn->affected_rows > 0){
				while($row = $result->fetch_assoc()){
					$rows[] = $row;
				}	
					return $rows;
				}else{
					echo "<h3>No records found!</h3>";
				}
		}























































































































	}
	#end artisan class
?>



