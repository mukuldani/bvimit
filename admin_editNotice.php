<!--Start Session-->
<?php require_once('includes/session.php'); ?>
<!--Database Connection-->
<?php require_once('includes/connection.php'); ?>
<!--Include Functions-->
<?php require_once('includes/functions.php'); ?>
<!--Check if logged in-->
<?php confirm_logged_in(); ?>

<?php
				$notice_id = $_SESSION["editingNoticeId"];
				$getNoticeDetails = "Select notice_title, notice_category, notice_words from notice where notice_id = $notice_id";
				$resultNoticeDetails = mysqli_query($connection, $getNoticeDetails);
				if(mysqli_num_rows($resultNoticeDetails) == 1){
					while($row = mysqli_fetch_array($resultNoticeDetails)){
						$notice_title = $row["notice_title"];
						$notice_words = $row["notice_words"];
						$notice_category = $row["notice_category"];
					}
				}else{
					echo mysqli_error($connection);
				}
?>

<?php
			if(isset($_POST['btnEditNotice'])){

				// Form Validation
				$errors = array();
				$required_fields = array('notice_title','notice_words', 'notice_category');
				$errors = array_merge($errors, check_required_field_errors($required_fields));

				if (!empty($errors)) {
					display_errors($errors);
				}

				$notice_title = mysql_prep($_POST['notice_title']);
				$notice_words = mysql_prep($_POST['notice_words']);
				$notice_category = mysql_prep($_POST['notice_category']);

				$date = date("Y-m-d");

				if(empty($errors)){
					$updateNotice = "Update notice SET notice_title = '$notice_title', notice_words = '$notice_words', notice_category = '$notice_category', date_uploaded = '$date' where notice_id = $notice_id";
					if(mysqli_query($connection, $updateNotice)){
						echo '<script language="javascript"> alert("Notice details updated"); </script>';
					}else{
						echo mysqli_error($connection);
					}
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
									<input type="text" required id="notice_title" name="notice_title" value="<?php echo $notice_title; ?>"/>
									<span class="highlight"></span>
									<span class="bar"></span>
									<label>NOTICE TITLE</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="group">
									<input type="text" required id="notice_words" name="notice_words" value="<?php echo $notice_words; ?>"/>
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
									<select type="text" required id="notice_category" name="notice_category" value="<?php echo $notice_category; ?>">
										<option class="default"></option>
										<option>General Notice</option>
										<option>Admissions Notice</option>
										<option>Examinations &amp; Results</option>
									</select>
									<span class="highlight"></span>
									<span class="bar"></span>
									<label>NOTICE CATEGORY</label>
								</div>
							</div>
							<div class="col-md-12">
								<button class="btn btn-primary float-right" name="btnEditNotice" id="btnEditNotice"> Edit Notice </button>
							</div>
						</div>
					</form>
				</fieldset>
			</div>
		</div>
	</div>

<!--Footer Admin-->
<?php require('includes/footer_admin.php'); ?>
