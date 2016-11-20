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
				$user_id = $_SESSION["editingUserId"];
				$getUserDetails = "Select first_name, second_name, email_id, mobile from user where user_id = $user_id";
				$resultUserDetails = mysqli_query($connection, $getUserDetails);
				if(mysqli_num_rows($resultUserDetails) == 1){
					while($row = mysqli_fetch_array($resultUserDetails)){
						$first_name = $row["first_name"];
						$second_name = $row["second_name"];
						$email_id = $row["email_id"];
						$mobile = $row["mobile"];
					}

					$getRole = "Select role from role where user_id = $user_id";
					$result_role = mysqli_query($connection, $getRole);
					if(mysqli_num_rows($result_role) == 1){
						while($row = mysqli_fetch_array($result_role)){
							$role = $row["role"];
						}
					}else{
						echo mysqli_error($connection);
					}
				}else{
					echo mysqli_error($connection);
				}
?>

<?php
			if(isset($_POST['btnEditUser'])){

				// Form Validation
				$errors = array();
				$required_fields = array('first_name', 'second_name', 'email_id', 'password', 'mobile', 'role');
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
				$role = mysql_prep($_POST['role']);

				if(empty($errors)){
					$updateUser = "Update user SET first_name = '$first_name', second_name = '$second_name', email_id = '$email_id', mobile = '$mobile', role = '$role' where user_id = '$user_id'";
					if(mysqli_query($connection, $updateUser)){
						echo '<script language="javascript"> alert("User details updated"); </script>';
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
								Edit User
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
									<div class="col-md-6">
										<div class="group">
											<select type="text" required id="role" name="role" value="<?php echo $role; ?>">
												<option class="default"></option>
												<option>Super Admin</option>
												<option>Admin Admissions</option>
												<option>Admin Examination</option>
												<option>Admin Placements</option>
												<option>Faculty</option>
											</select>
											<span class="highlight"></span>
											<span class="bar"></span>
											<label>ROLE</label>
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
