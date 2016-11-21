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

<!--Deleting Notice-->
<?php
	if(isset($_POST['btnDeleteNotice'])){
		$deletingNoticeId = array();
		$deletingNoticeId = $_POST['noticeId'];
		$noticeIds = implode(',', $_POST['noticeId']);
		$queryDeleteNotice = "Delete from notice where notice_id IN ($noticeIds)";
		if(mysqli_query($connection, $queryDeleteNotice)){
			echo "<script type=\"text/javascript\"> alert(Deletion Complete) </script>";
		}else{
			echo mysqli_error($connection);
		}
	}
?>

<!--Editing Notice-->
<?php
	if(isset($_POST['btnEditNotice'])){
		$editingNoticeId = array();
		$editingNoticeId = $_POST['noticeId'];
		if((!empty($editingNoticeId)) && (sizeof($editingNoticeId) == 1)){
			$noticeId = implode(',', $_POST['noticeId']);
			$_SESSION["editingNoticeId"] = $noticeId;
			redirect_to("admin_editNotice.php");
		}else{
			echo "Select only one notice";
		}
	}
?>

<div class="col-md-9 padding-top-30 show_users">
	<div class="panel">
		<div class="panel-heading">
			<h4> Notices </h4>
		</div>
		<div class="panel-body">
			<form name="Form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<table class="table">
					<thead>
						<th>Notice Title</th>
						<th>Notice Words</th>
						<th>Notice Category</th>
						<th>Date Uploaded</th>
						<th>Edit Notice</th>
					</thead>
					<tbody>
						<?php
							$query = "Select * from notice order by notice_category";
							$result = mysqli_query($connection, $query);
							if(mysqli_num_rows($result) != 0){
								while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
									echo "<tr>";
										echo "<td>" .$row['notice_title']. "</td>";
										echo "<td>"; echo print_notice_words($row['notice_words']); echo"</td>";
										echo "<td>" .$row['notice_category']. "</td>";
										echo "<td>" .$row['date_uploaded']. "</td>";
										echo "<td><input type=\"checkbox\" name=\"noticeId[]\" value=".$row['notice_id']."></td>";
									echo "</tr>";
								}
							}else if(mysqli_num_rows($result) == 0){
								echo "<h3 class=\"text-center\"> No records for the notices </h3>";
							}else{
								echo mysqli_error($connection);
							}
						?>
					</tbody>
				</table>
				<div class="col-md-4 float-right">
					<button class="btn btn-primary " name="btnDeleteNotice" id="btnDeleteNotice"> Delete Notice </button>
					<button class="btn btn-primary " name="btnEditNotice" id="btnEditNotice"> Edit Notice </button>
				</div>
			</form>
		</div>
	</div>
</div>

<!--Footer Admin-->
<?php require('includes/footer_admin.php'); ?>
