<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> BVIMIT College</title>
	<!-- Bootstrap CSS -->
	<link href="vendor/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="vendor/bootstrap-3.3.6-dist/css/bootstrap-theme.min.css" rel="stylesheet">
	<!-- jQuery -->
	<script src="vendor/jquery/jquery-1.11.3.min.js" type="text/javascript"></script>
	<!-- Bootstrap jQury -->
	<script src="vendor/bootstrap-3.3.6-dist/js/bootstrap.min.js" type="text/javascript"></script>
	<!--Fontawesome-->
	<link rel="stylesheet" href="vendor/font-awesome-4.6.3/css/font-awesome.min.css">
	<!--Thimify Icons-->
	<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
	<!--Custom Css-->
	<link href="assets/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>

	<!--Navigation Bar-->
	<nav class="navbar navbar-default navbar-fixed-top navbar-shrink">
		<div class="container" style="width:100%; margin:0;">
			<div class="navbar-hearder pull-left">
				<a class="navbar-brand page-scroll" href="index.php">
					<img src="assets/images/bvimit_logo.png" class="navbar-logo img-responsive" />
				</a>

				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation-fields">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="navbar-collapse collapse pull-right" id="navigation-fields">
				<img src="assets/images/bvimit_name.png" class="bvimit_name img-responsive" />
				<div class="bvimit_name_text navbar-text">
					<span>
					Institute of Management and Information Technology, Navi Mumbai
						</span>
				</div>
				<div>
					<button href="#" class="btn btn-login" data-toggle="modal" data-target=".bs-example-modal-sm"> Login </button>
				</div>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li> <a href="index.php"> HOME </a> </li>
					<li> <a href="aboutus.php"> ABOUT US </a> </li>
					<li> <a href="adimissions.php"> ADMISSIONS </a> </li>
					<li> <a href="academics.php"> ACADEMICS </a> </li>
					<li> <a href="placements.php"> PLACEMENTS </a> </li>
					<li> <a href="faculty.php"> FACULTY </a> </li>
					<li> <a href="#"> CAMPUS </a> </li>
					<li> <a href="conatctus.php"> CONTACT US </a> </li>
				</ul>
			</div>
		</div>
	</nav>

	<!--Modal Login : start-->
	<div class="modal fade bs-example-modal-sm" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<div class="row padding-5">
						<div class="col-md-3 padding-left-0">
							<img src="assets/images/bvimit_logo.png" class="img-responsive">
						</div>
						<div class="col-md-8 padding-left-0">
							<h3 class="text-black text-center">
								Member Login
							</h3>
						</div>
						<div class="col-md-1 padding-left-0">
							<a class="pull-right no-underline pointer-cursur" data-dismiss="modal" target="_blank" data-toggle="tooltip" data-placement="right" title="Close">
								<i class="ti-close text-black text-small"></i>
							</a>
						</div>
					</div>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<form class="contactus-text padding-15" action="login.php" method="post" autocomplete="off" style="padding:15px;">

								<div class="group">
									<input type="email" required id="emailid" name="emailid" />
									<span class="highlight"></span>
									<span class="bar"></span>
									<label>Email Id</label>
								</div>

								<div class="group">
									<input type="password" required id="password" name="password" />
									<span class="highlight"></span>
									<span class="bar"></span>
									<label>Password</label>
								</div>

								<div class="form-group" style="display:flex;justify-content:center;">
									<button class="btn btn-primary" name="btnSubmit" id="btnSubmit">SUBMIT</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Modal Login : end-->
