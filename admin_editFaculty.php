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
				$faculty_id = $_SESSION["editingFacultyId"];
				$getFacultyDetails = "Select user.first_name, user.second_name, user.email_id, user.mobile, faculty.designation, faculty.qualification, faculty.specialization, faculty.research_work, faculty.achievements from user, faculty where faculty.faculty_id = user.faculty_id and faculty.faculty_id = $faculty_id";
				$resultFacultyDetails = mysqli_query($connection, $getFacultyDetails);
				if(mysqli_num_rows($resultFacultyDetails) == 1){
					while($row = mysqli_fetch_array($resultFacultyDetails)){
						$first_name = $row["first_name"];
						$second_name = $row["second_name"];
						$email_id = $row["email_id"];
						$mobile = $row["mobile"];
						$designation = $row["designation"];
						$qualification = $row["qualification"];
						$specialization = $row["specialization"];
						$research_work = $row["research_work"];
						$achievements = $row["achievements"];
					}
				}else{
					echo mysqli_error($connection);
				}
?>

<?php
			if(isset($_POST['btnEditUser'])){

				// Form Validation
				$errors = array();
				$required_fields = array('first_name', 'second_name', 'email_id', 'mobile');
				$errors = array_merge($errors, check_required_field_errors($required_fields));

				//$fiels_with_length = array('mobile' => 10);
				//$errors = array_merge($errors, check_max_field_lengths($required_fields));

				if (!empty($errors)) {
					display_errors($errors);
				}

				$first_name = mysql_prep($_POST['first_name']);
				$second_name = mysql_prep($_POST['second_name']);
				$email_id = mysql_prep($_POST['email_id']);
				$mobile = mysql_prep($_POST['mobile']);

				$designation = mysql_prep($_POST['designation']);
				$qualification = mysql_prep($_POST['qualification']);
				$specialization = mysql_prep($_POST['specialization']);
				$research_work = mysql_prep($_POST['research_work']);
				$achievements = mysql_prep($_POST['research_work']);

				if($_POST['designation'] == ""){
					$designation = "";
				}
				if($_POST['qualification'] == ""){
					$qualification = "";
				}
				if($_POST['specialization'] == ""){
					$specialization = "";
				}
				if($_POST['research_work'] == ""){
					$research_work = "";
				}
				if($_POST['achievements'] == ""){
					$achievements = "";
				}

				if(empty($errors)){
					$updateUserDetails = "UPDATE user SET first_name = '$first_name', second_name = '$second_name', email_id = '$email_id', mobile = $mobile where faculty_id = $faculty_id";
					if(mysqli_query($connection, $updateUserDetails)){
						$updateFacultyDetails = "UPDATE faculty SET designation = '$designation', qualification = '$qualification', specialization = '$specialization', research_work = '$research_work', achievements = '$achievements'  where faculty_id = $faculty_id";
						if(mysqli_query($connection, $updateFacultyDetails)){
							echo '<script language="javascript"> alert("Faculty details Updated"); </script>';
						}else{
							echo mysqli_error($connection);
						}
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
								Edit Details
							</legend>
							<form name="Form" class="padding-10" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
								<div class="row">
									<div class="col-md-6">
										<div class="group">
											<input type="text" required id="first_name" name="first_name" value="<?php echo $first_name; ?>"/>
											<span class="highlight"></span>
											<span class="bar"></span>
											<label>FIRST NAME</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="group">
											<input type="text" required id="second_name" name="second_name" value="<?php echo $second_name; ?>"/>
											<span class="highlight"></span>
											<span class="bar"></span>
											<label>SECOND NAME</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="group">
											<input type="email" required id="email_id" name="email_id" value="<?php echo $email_id; ?>"/>
											<span class="highlight"></span>
											<span class="bar"></span>
											<label>EMAIL ID</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="group">
											<input type="text" required id="mobile" name="mobile" value="<?php echo $mobile; ?>"/>
											<span class="highlight"></span>
											<span class="bar"></span>
											<label>MOBILE</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="group">
											<input type="text" id="designation" name="designation" value="<?php echo $designation; ?>"/>
											<span class="highlight"></span>
											<span class="bar"></span>
											<label>DESIGNATION</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="group">
											<input type="text" id="qualification" name="qualification" value="<?php echo $qualification; ?>"/>
											<span class="highlight"></span>
											<span class="bar"></span>
											<label>QUALIFICATION</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="group">
											<input type="text" id="specialization" name="specialization" value="<?php echo $specialization; ?>"/>
											<span class="highlight"></span>
											<span class="bar"></span>
											<label>SPECIALIZATION</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="group">
											<input type="text" id="research_work" name="research_work" value="<?php echo $research_work; ?>"/>
											<span class="highlight"></span>
											<span class="bar"></span>
											<label>RESEARCH WORK</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="group">
											<input type="text" id="achievements" name="achievements" value="<?php echo $achievements; ?>"/>
											<span class="highlight"></span>
											<span class="bar"></span>
											<label>ACHIEVEMENTS</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label> UPOLOAD FILE </label>
										</div>
										<br>
										<div class="form-group">
											<input type="file" placeholder="Upload File" id="notice_file" name="notice_file" />
										</div>
									</div>
									<div class="col-md-12">
										<button class="btn btn-primary float-right" name="btnEditUser" id="btnEditUser"> Edit User </button>
									</div>
								</div>
							</form>
						</fieldset>
					</div>
				</div>
			</div>
<!--Footer Admin-->
<?php require('includes/footer_admin.php'); ?>
