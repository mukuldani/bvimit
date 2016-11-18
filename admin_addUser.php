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
			if(isset($_POST['btnAddUser'])){

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
				$password = mysql_prep($_POST['password']);
				$password_hash = hash("sha256",$password);
				$mobile = mysql_prep($_POST['mobile']);
				$role = mysql_prep($_POST['role']);

				if(empty($errors)){
					$sql = "Insert into user (first_name, second_name, email_id, password, mobile) values ('$first_name', '$second_name', '$email_id', '$password_hash', '$mobile')";

					if(mysqli_query($connection, $sql)){
						$sqlSelectUser = "Select user_id from user where email_id = '$email_id' LIMIT 1";
						$getUserId = mysqli_query($connection, $sqlSelectUser);
						if(mysqli_num_rows($getUserId) == 1){
							while($row = mysqli_fetch_array($getUserId, MYSQLI_ASSOC)){
								$currentUserId = $row["user_id"];
							}
							$sqlRoleInsert = "Insert into role (user_id, role) values ($currentUserId, '$role')";
							if(mysqli_query($connection, $sqlRoleInsert)){
								if($role === "Faculty"){
									$sqlInsertFaculty = "Insert into faculty (user_id) values ($currentUserId)";
									if(mysqli_query($connection, $sqlInsertFaculty)){
										//Get the faculty ID from the table
										$getFacultyId = "Select faculty_id, user_id from faculty where user_id = $currentUserId LIMIT 1";
										$result_row = mysqli_query($connection, $getFacultyId);
										if(mysqli_num_rows($result_row) == 1){
											while($row = mysqli_fetch_array($result_row, MYSQLI_ASSOC)){
												$faculty_id = $row["faculty_id"];
												$user_id = $row["user_id"];
											}
											if($currentUserId === $user_id){
												$updateUser = "Update user set faculty_id =  $faculty_id where user_id = $user_id";
												if(mysqli_query($connection, $updateUser)){
													echo '<script language="javascript"> alert("User account created"); </script>';
												}else{
													echo mysqli_error($connection);
												}
											}
										}else{
											echo mysqli_error($connection);
										}
									}else{
										echo mysqli_error($connection);
									}
								}else{
									echo '<script language="javascript"> alert("User account created"); </script>';
								}
							}else{
								echo mysqli_error($connection);
							}
						}else{
							echo "<script language='javascript'> alert(Error in fetching the data '.$connection' ); </script>";
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
								New User
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
											<input type="email" required id="email_id" name="email_id" />
											<span class="highlight"></span>
											<span class="bar"></span>
											<label>EMAIL ID</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="group">
											<input type="password" required id="password" name="password" />
											<span class="highlight"></span>
											<span class="bar"></span>
											<label>PASSWORD</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="group">
											<input type="text" required id="mobile" name="mobile" />
											<span class="highlight"></span>
											<span class="bar"></span>
											<label>MOBILE</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="group">
											<select type="text" required id="role" name="role">
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
										<button class="btn btn-primary float-right" name="btnAddUser" id="btnAddUser"> Add User </button>
									</div>
								</div>
							</form>
						</fieldset>
					</div>
				</div>
			</div>
<!--Footer Admin-->
<?php require('includes/footer_admin.php'); ?>
