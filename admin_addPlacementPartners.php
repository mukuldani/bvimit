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
			if(isset($_POST['btnPartner'])){

				// Form Validation
				$errors = array();
				$required_fields = array('partner_name');
				$errors = array_merge($errors, check_required_field_errors($required_fields));

				if (!empty($errors)) {
					display_errors($errors);
				}

				$partner_name = mysql_prep($_POST['partner_name']);

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

							$sql = "Insert into placement_partner (partner_name, partner_logo) values('$partner_name', '')";

							if(mysqli_query($connection, $sql)){
								echo '<script language="javascript"> alert("Partner added Succesfully"); </script>';
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
									<input type="text" required id="partner_name" name="partner_name" />
									<span class="highlight"></span>
									<span class="bar"></span>
									<label>PARTNER NAME</label>
								</div>
							</div>

							<div class="col-md-12">
								<div class="col-md-3">
									<label> PARTNER LOGO </label>
								</div>
								<div class="col-md-9">
									<div class="form-group">
										<input type="file" placeholder="" id="partner_logo" name="partner_logo" />
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<button class="btn btn-primary float-right" name="btnPartner" id="btnPartner"> Add Partner </button>
							</div>
						</div>
					</form>
				</fieldset>
			</div>
		</div>
</div>

<!--Footer Admin-->
<?php require('includes/footer_admin.php'); ?>
