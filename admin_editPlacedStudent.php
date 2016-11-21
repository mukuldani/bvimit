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
				$placement_students_id = $_SESSION["editingPlacedStudentId"];
				$getPlacedStudentDetails = "Select * from placement_student where placement_students_id = $placement_students_id";
				$resultPlacedStudentDetails = mysqli_query($connection, $getPlacedStudentDetails);
				if(mysqli_num_rows($resultPlacedStudentDetails) == 1){
					while($row = mysqli_fetch_array($resultPlacedStudentDetails)){
						$first_name = $row["first_name"];
						$second_name = $row["second_name"];
						$company_placed = $row["company_placed"];
						$package_amt = $row["package_amt"];
					}
				}else{
					echo mysqli_error($connection);
				}
?>

<?php
			if(isset($_POST['btnEditStudent'])){

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
					$updatePlacedStudent = "Update placement_student SET first_name = '$first_name', second_name = '$second_name', company_placed = '$company_placed', package_amt = '$package_amt', date = '$date' where placement_students_id = $placement_students_id";
					if(mysqli_query($connection, $updatePlacedStudent)){
						echo '<script language="javascript"> alert("Student details Updated"); </script>';
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
						Edit Placed Student Details
					</legend>
					<form name="Form" class="padding-10" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
						<div class="row">
							<div class="col-md-6">
								<div class="group">
									<input type="text" required id="first_name" name="first_name" value="<?php echo $first_name; ?>" />
									<span class="highlight"></span>
									<span class="bar"></span>
									<label>FIRST NAME</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="group">
									<input type="text" required id="second_name" name="second_name" value="<?php echo $second_name; ?>" />
									<span class="highlight"></span>
									<span class="bar"></span>
									<label>SECOND NAME</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="group">
									<input type="text" required id="company_placed" name="company_placed" value="<?php echo $company_placed; ?>" />
									<span class="highlight"></span>
									<span class="bar"></span>
									<label>COMPANY</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="group">
									<input type="text" required id="package_amt" name="package_amt" value="<?php echo $package_amt; ?>" />
									<span class="highlight"></span>
									<span class="bar"></span>
									<label>PACKAGE AMOUNT</label>
								</div>
							</div>
							<div class="col-md-12">
								<button class="btn btn-primary float-right" name="btnEditStudent" id="btnEditStudent"> Edit Student </button>
							</div>
						</div>
					</form>
				</fieldset>
			</div>
		</div>
	</div>

<!--Footer Admin-->
<?php require('includes/footer_admin.php'); ?>
