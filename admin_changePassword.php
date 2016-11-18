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
			if(isset($_POST['btnChangePassword'])){

				// Form Validation
				$errors = array();
				$required_fields = array('email_id', 'old_password', 'password', 'confirm_password');
				$errors = array_merge($errors, check_required_field_errors($required_fields));


				if (!empty($errors)) {
					display_errors($errors);
				}

				if(strcmp($_POST['password'], $_POST['confirm_password']) !== 0){
					echo '<script language="javascript"> alert("New Password and Confirm Password are not same."); </script>';
				}

				$email_id = mysql_prep($_POST['email_id']);
				$old_password = mysql_prep($_POST['old_password']);
				$old_password_hash = hash("sha256", $old_password);
				$password = mysql_prep($_POST['password']);
				$password_hash = hash("sha256", $password);
				$confirm_password = mysql_prep($_POST['confirm_password']);



				$query = "Select user_id from user where email_id = '$email_id' and password = '$old_password_hash' LIMIT 1";
				$result = mysqli_query($connection, $query);
				if(mysqli_num_rows($result) == 1){
					while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
						$userId = $row["user_id"];
					}
					if($currentUserId === $userId){
						$queryUpdate = "Update user SET password = '$password_hash' where user_id = '$userId'";
						if(mysqli_query($connection, $queryUpdate)){
							echo '<script language="javascript"> alert("Password Updated"); </script>';
						}else{
							echo mysqli_error($connection);
						}
					}else{
						echo '<script language="javascript"> alert("Logged in user does not match with the updating user."); </script>';
					}
				}else{
					echo mysqli_error($connection);
				}

			}
		?>

	<div class="col-md-9">
		<div class="row padding-top-20">
			<div class="col-md-8 col-md-offset-2">
				<fieldset>
					<legend>
						Change Password
					</legend>
					<form name="Form" class="padding-10" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
						<div class="row">
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
									<input type="password" required id="old_password" name="old_password" />
									<span class="highlight"></span>
									<span class="bar"></span>
									<label>OLD PASSWORD</label>
								</div>
							</div>

							<div class="col-md-6">
								<div class="group">
									<input type="password" required id="password" name="password" />
									<span class="highlight"></span>
									<span class="bar"></span>
									<label>NEW PASSWORD</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="group">
									<input type="password" required id="confirm_password" name="confirm_password" />
									<span class="highlight"></span>
									<span class="bar"></span>
									<label>CONFIRM PASSWORD</label>
								</div>
							</div>

							<div class="col-md-12">
								<button class="btn btn-primary float-right" name="btnChangePassword" id="btnChangePassword"> Confirm </button>
							</div>
						</div>
					</form>
				</fieldset>
			</div>
		</div>
	</div>

<!--Footer Admin-->
<?php require('includes/footer_admin.php'); ?>
