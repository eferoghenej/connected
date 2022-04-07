<?php 
	ob_start(); //Turn on output buffering
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="icons/css/all.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<title>Conneckted</title>
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
      						<li class="nav-item active">
        						<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      						</li>
      						<li class="nav-item">
        						<a class="nav-link" href="register.php">Sign Up</a>
      						</li>
      						<li class="nav-item">
        						<a class="nav-link" href="login.php">Login</a>
      						</li>
      						<li class="nav-item">
        						<a class="nav-link" href="artisansreg.php">For Artisans</a>
      						</li>
      
  					</div>
				</nav>

				<!-- <div class="row">
					<div class="input-group col-md-8 offset-md-2">
    				<input type="text" class="form-control" placeholder="Category" name="search" id="search">
    				<!-- <input type="text" class="form-control" placeholder="LGA" name="search1" id="search1"> -->
					<!-- </div>
    				<div id="showresult" class="col-md-8 offset-md-2"></div> -->
        <!-- <div class="input-group-append">
            <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
        </div> -->
				<!-- </div> -->
<!-- </div> -->