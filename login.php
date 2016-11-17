<!--Start Session-->
<?php require_once('includes/session.php'); ?>
<!--Database Connection-->
<?php require_once('includes/connection.php'); ?>
<!--Include Functions-->
<?php require_once('includes/functions.php'); ?>
<?php
			// Form Validation
			$errors = array();
			$required_fields = array('emailid', 'password');
			$errors = array_merge($errors, check_required_field_errors($required_fields));

			if (!empty($errors)) {
				display_errors($errors);
			}

			$username = mysql_prep($_POST['emailid']);
			$password = mysql_prep($_POST['password']);
			$password_hash = hash("sha256",$password);

			if(empty($errors)){
				$sql = "Select user_id, first_name from user where email_id = '$username' and password = '$password_hash' LIMIT 1";
				$result = mysqli_query($connection, $sql);
				if(mysqli_num_rows($result) == 1){
					while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
						$_SESSION["currentUserId"] = $row["user_id"];
						$_SESSION["first_name"] = $row["first_name"];
					}
					echo '<script language="javascript"> alert("Login Succesfull"); </script>';
					redirect_to("admin_addUser.php");
				}else{
					echo mysqli_error($connection);
					echo '<script language="javascript"> alert("Please check your username and password"); </script>';
					redirect_to("index.php");
				}
			}
	?>
