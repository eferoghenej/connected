<?php 
	include('classes.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
	<title><?php echo MY_APP_NAME; ?></title>
</head>
<body>
	<!-- container -->
	<div class="container">
		<div class="row">
			<div class="col">
				<!-- nav div -->
				
				<nav class="navbar navbar-expand-lg">
  					<a class="navbar-brand" href="index.php"><img src="images/logo.png" width="300px" height="100px"></a>
 					 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    				<span class="navbar-toggler-icon"></span>
  					</button>

  					<div class="collapse navbar-collapse" id="navbarSupportedContent">
    					<ul class="navbar-nav ml-auto">
							<li class="nav-item">
            				<a class="nav-link" href="userdashboard.php">Dashboard</a>
          					</li>

      						<li class="nav-item">
        						<a class="nav-link" href="edit.php?artisan_id=<?php echo $_SESSION['id']?>">Edit Profile <span class="sr-only">(current)</span></a>
      						</li>
      						
                            <li class="nav-item">
        						<a class="nav-link" href="upload.php">Upload Photo</a>
      						</li>

							<li class="nav-item">
        						<a class="nav-link" href="addservice.php">Add Services</a>
      						</li>

      						<li class="nav-item">
        						<a class="nav-link" href="logout.php">Logout</a>
      						</li>
      
  					</div>
				</nav>