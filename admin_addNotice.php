<!--Start Session-->
<?php require_once('includes/session.php'); ?>
<!--Database Connection-->
<?php require_once('includes/connection.php'); ?>
<!--Include Functions-->
<?php require_once('includes/functions.php'); ?>
<!--Check if logged in-->
<?php confirm_logged_in(); ?>

<?php
			if(isset($_POST['btnNotice'])){

				// Form Validation
				$errors = array();
				$required_fields = array('notice_words', 'notice_category');
				$errors = array_merge($errors, check_required_field_errors($required_fields));

				if (!empty($errors)) {
					display_errors($errors);
				}

				$notice_words = mysql_prep($_POST['notice_words']);
				$notice_category = mysql_prep($_POST['notice_category']);

				$date = date("Y-m-d");

				if(empty($errors)){
//				$allowedExts = array("pdf", "doc");
//				$temp = explode(".", $_FILES["notice_file"]["name"]);
//				$extension = end($temp);

//				if (($_FILES["notice_file"]["type"] == "application/pdf")
//					&& ($_FILES["notice_file"]["size"] < 200000)
//					&& in_array($extension, $allowedExts)){
//
//					if ($_FILES["notice_file"]["error"] > 0){
//
//						echo "Return Code: " . $_FILES["notice_file"]["error"] . "<br>";
//					}else{
							//$data = real_escape_string(file_get_contents($_FILES['notice_file']['tmp_name']));
							$sql = "Insert into notice (notice_category, notice_words, date_uploaded) values('$notice_category', '$notice_words', '$date')";

							if(mysqli_query($connection, $sql)){
								echo '<script language="javascript"> alert("Record added Succesfully"); </script>';
							}else{
								echo mysqli_error($connection);
							}
					//}
				//}
				}
			}
?>
<!--Header Admin-->
<?php include('includes/header_admin.php'); ?>

	<div class="col-md-9">
		<div class="row padding-top-20">
			<div class="col-md-8 col-md-offset-2">
				<fieldset>
					<legend>
						New Notice
					</legend>
					<form name="Form" class="padding-10" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
						<div class="row">
							<div class="col-md-12">
								<div class="group">
									<input type="text" required id="notice_words" name="notice_words" />
									<span class="highlight"></span>
									<span class="bar"></span>
									<label>NOTICE WORDS</label>
								</div>
							</div>
							<div class="col-md-6">
								<label> UPOLOAD FILE </label>
								<br>
								<div class="form-group">
									<input type="file" placeholder="Upload File" id="notice_file" name="notice_file" />
								</div>
							</div>
							<div class="col-md-6">
								<br>
								<div class="group">
									<select type="text" required id="notice_category" name="notice_category">
										<option class="default"></option>
										<option>General Notice</option>
										<option>AdmissionsNotice</option>
										<option>Examinations &amp; Results Notice</option>
									</select>
									<span class="highlight"></span>
									<span class="bar"></span>
									<label>NOTICE CATEGORY</label>
								</div>
							</div>
							<div class="col-md-12">
								<button class="btn btn-primary float-right" name="btnNotice" id="btnNotice"> Add Notice </button>
							</div>
						</div>
					</form>
				</fieldset>
			</div>
		</div>
	</div>

<!--Footer Admin-->
<?php require('includes/footer_admin.php'); ?>
