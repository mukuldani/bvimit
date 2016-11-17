<!--Start Session-->
<?php require_once('includes/session.php'); ?>
<!--Database Connection-->
<?php require_once('includes/connection.php'); ?>
<!--Include Functions-->
<?php require_once('includes/functions.php'); ?>
<!--Check if logged in-->
<?php confirm_logged_in(); ?>
<?php
			if(isset($_POST[''])){

			}
?>
<!--Header Admin-->
<?php include('includes/header_admin.php'); ?>

	<div class="col-md-9">
		<div class="row padding-top-20">
			<div class="col-md-8 col-md-offset-2">
				<fieldset>
					<legend>
						Admission &amp; Documents
					</legend>
					<form name="Form" class="padding-10" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">

					</form>
				</fieldset>
			</div>
		</div>
	</div>

<!--Footer Admin-->
<?php require('includes/footer_admin.php'); ?>
