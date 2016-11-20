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
				$placement_partner_id = $_SESSION["editingPlacementPartnerId"];
				$getPlacementPartnerDetails = "Select * from placement_partner where placement_partner_id = $placement_partner_id";
				$resultPlacementPartnerDetails = mysqli_query($connection, $getPlacementPartnerDetails);
				if(mysqli_num_rows($resultPlacementPartnerDetails) == 1){
					while($row = mysqli_fetch_array($resultPlacementPartnerDetails)){
						$partner_name = $row["partner_name"];
					}
				}else{
					echo mysqli_error($connection);
				}
?>

<?php
			if(isset($_POST['btnEditPartner'])){

				// Form Validation
				$errors = array();
				$required_fields = array('partner_name');
				$errors = array_merge($errors, check_required_field_errors($required_fields));

				if (!empty($errors)) {
					display_errors($errors);
				}

				$partner_name = mysql_prep($_POST['partner_name']);

				if(empty($errors)){
					$updatePlacementPartner = "Update placement_partner SET first_name = '$partner_name' where placement_partner_id = $placement_partner_id";
					if(mysqli_query($connection, $updatePlacementPartner)){
						echo '<script language="javascript"> alert("Partner details Updated"); </script>';
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
						Edit Placement Partner
					</legend>
					<form name="Form" class="padding-10" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
						<div class="row">
							<div class="col-md-12">
								<div class="group">
									<input type="text" required id="partner_name" name="partner_name" value="<?php echo $partner_name; ?>"/>
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
								<button class="btn btn-primary float-right" name="btnEditPartner" id="btnEditPartner"> Edit Partner </button>
							</div>
						</div>
					</form>
				</fieldset>
			</div>
		</div>
</div>

<!--Footer Admin-->
<?php require('includes/footer_admin.php'); ?>
