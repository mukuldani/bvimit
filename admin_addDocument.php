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
			if(isset($_POST['btnDocument'])){

				// Form Validation
				$errors = array();
				$required_fields = array('document_title','document_type');
				$errors = array_merge($errors, check_required_field_errors($required_fields));

				if (!empty($errors)) {
					display_errors($errors);
				}

				$document_title = mysql_prep($_POST['document_title']);
				$document_type = mysql_prep($_POST['document_type']);
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
							$sql = "Insert into document (document_title, document_file, document_type, document_date) values('$document_title','','$document_type','$date')";

							if(mysqli_query($connection, $sql)){
								echo '<script language="javascript"> alert("Docuement added Succesfully"); </script>';
							}else{
								echo mysqli_error($connection);
							}
					//}
				//}
				}
			}
?>

	<div class="col-md-9">
		<div class="row padding-top-20">
			<div class="col-md-8 col-md-offset-2">
				<fieldset>
					<legend>
						Placement Partners
					</legend>
					<form name="Form" class="padding-10" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
						<div class="row">
							<div class="col-md-12">
								<div class="group">
									<input type="text" required id="document_title" name="document_title" />
									<span class="highlight"></span>
									<span class="bar"></span>
									<label>DOCUMENT TITLE</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="group">
									<select type="text" required id="document_type" name="document_type">
										<option class="default"></option>
										<option>Admissions</option>
										<option>Examination</option>
										<option>Placements</option>
										<option>Events</option>
										<option>General Document</option>
									</select>
									<span class="highlight"></span>
									<span class="bar"></span>
									<label>DOCUMENT TYPE</label>
								</div>
							</div>

							<div class="col-md-12">
								<div class="col-md-3">
									<label> DOCUMENT FILE </label>
								</div>
								<div class="col-md-9">
									<div class="form-group">
										<input type="file" placeholder="" id="document_file" name="document_file" />
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<button class="btn btn-primary float-right" name="btnDocument" id="btnDocument"> Add Document </button>
							</div>
						</div>
					</form>
				</fieldset>
			</div>
		</div>
	</div>

<!--Footer Admin-->
<?php require('includes/footer_admin.php'); ?>
