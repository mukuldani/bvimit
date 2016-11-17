<!--Start Session-->
<?php require_once('includes/session.php'); ?>
<!--Database Connection-->
<?php require_once('includes/connection.php'); ?>
<!--Include Functions-->
<?php require_once('includes/functions.php'); ?>
<!--Check if logged in-->
<?php confirm_logged_in(); ?>
<!--Header Admin-->
<?php include('includes/header_admin.php'); ?>
<?php
			if(isset($_POST['btnStudent'])){

				// Form Validation
				$errors = array();
				$required_fields = array('first_name', 'second_name', 'company_placed','package_amt');
				$errors = array_merge($errors, check_required_field_errors($required_fields));

				if (!empty($errors)) {
					display_errors($errors);
				}

				$first_name = mysql_prep($_POST['first_name']);
				$second_name = mysql_prep($_POST['second_name']);
				$company_placed = mysql_prep($_POST['company_placed']);
				$package_amt = mysql_prep($_POST['package_amt']);

				$date = date("Y-m-d");

				if(empty($errors)){
					$query = "Insert into placement_student (first_name, second_name, company_placed, package_amt, date) values ('$first_name', '$second_name', '$company_placed', '$package_amt', '$date')";

					if(mysqli_query($connection, $query)){
						echo '<script language="javascript"> alert("Record Inserted"); </script>';
					}else{
						echo mysqli_error($connection);
					}
				}
			}
?>

	<div class="col-md-9">
		<div class="row padding-top-20">
			<div class="col-md-8 col-md-offset-2">
				<fieldset>
					<legend>
						Add Placed Students
					</legend>
					<form name="Form" class="padding-10" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
						<div class="row">
							<div class="col-md-6">
								<div class="group">
									<input type="text" required id="first_name" name="first_name" />
									<span class="highlight"></span>
									<span class="bar"></span>
									<label>FIRST NAME</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="group">
									<input type="text" required id="second_name" name="second_name" />
									<span class="highlight"></span>
									<span class="bar"></span>
									<label>SECOND NAME</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="group">
									<input type="text" required id="company_placed" name="company_placed" />
									<span class="highlight"></span>
									<span class="bar"></span>
									<label>COMPANY</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="group">
									<input type="text" required id="package_amt" name="package_amt" />
									<span class="highlight"></span>
									<span class="bar"></span>
									<label>PACKAGE AMOUNT</label>
								</div>
							</div>
							<div class="col-md-12">
								<button class="btn btn-primary float-right" name="btnStudent" id="btnStudent"> Add Student </button>
							</div>
						</div>
					</form>
				</fieldset>
			</div>
		</div>
	</div>

<!--Footer Admin-->
<?php require('includes/footer_admin.php'); ?>
