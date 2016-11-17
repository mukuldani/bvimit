<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> BVIMIT College </title>
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
				<a class="navbar-brand page-scroll" href="index.html" style="height:0;">
					<img src="assets/images/bvimit_logo.png" style="height:96px;" class="navbar-logo img-responsive" />
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
<!--
				<div class="float-right">
					<h4>
						Hello, <?php //session_start(); echo $_SESSION["first_name"];?>
					</h4>
				</div>
-->
			</div>
		</div>
	</nav>

	<div class="container-fluid admin-page" style="padding-top:118px;">
		<div class="row">
			<div class="col-md-3" style="padding-left: 0;">
				<ul class="list-unstyled list-nav">
					<li><a href="admin_addUser.php"> Add User </a></li>
					<li><a href="#"> Show User </a></li>

					<li><a href="admin_addNotice.php"> Add Notice </a></li>
					<li><a href="#"> Show Notices </a></li>

					<!--
					<li><a href="#"> Add Faculty Details </a></li>
					<li><a href="#"> Show Faculty Details </a></li>
-->

					<li><a href="admin_admissions.php"> Admissions &amp; Eligibility </a></li>

					<li><a href="admin_addPlacedStudents.php"> Add Placed Students </a></li>
					<li><a href="#"> Show Placed Students </a></li>
					<li><a href="admin_addPlacementPartners.php"> Add Placement Partners </a></li>
					<li><a href="#"> Show Placement Partners </a></li>

					<li><a href="admin_addDocument.php"> Add Documents </a></li>
					<li><a href="#"> Show Documents </a></li>

					<li><a href="admin_changePassword.php"> Change Password </a></li>

					<li><a href="logout.php"> Log out </a></li>
				</ul>
			</div>
