<?php include('classes.php');
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
            				<a class="nav-link" href="admin.php">Dashboard</a>
          					</li>

      						<li class="nav-item">
        						<a class="nav-link" href="artisans.php">View Artisans <span class="sr-only">(current)</span></a>
      						</li>
      						<li class="nav-item">
        						<a class="nav-link" href="users.php">View Users</a>
      						</li>

      						<li class="nav-item">
        						<a class="nav-link" href="addcategory.php">Add Category</a>
      						</li>

							<li class="nav-item">
        						<a class="nav-link" href="viewservice.php">View Category</a>
      						</li>
							
							<!-- <li class="nav-item">
        						<a class="nav-link" href="upload.php">Upload Photo</a>
      						</li> -->

      						<li class="nav-item">
        						<a class="nav-link" href="logout.php">Logout</a>
      						</li>
      
  					</div>
				</nav>
