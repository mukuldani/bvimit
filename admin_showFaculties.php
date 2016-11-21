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

<!--Deleting Faculty Details-->
<?php
	if(isset($_POST['btnDeleteFaculty'])){
		$deletingFacultyId = array();
		$deletingFacultyId = $_POST['facultyId'];
		$deletingFacultyIds = implode(',', $_POST['facultyId']);
		$queryDeleteFaculty = "Delete from faculty where faculty_id IN ($deletingFacultyIds)";
		if(mysqli_query($connection, $queryDeleteFaculty)){
			echo "<script type=\"text/javascript\"> alert(Deletion Complete) </script>";
		}else{
			echo mysqli_error($connection);
		}
	}
?>

<!--Editing Faculty Details-->
<?php
	if(isset($_POST['btnEditFaculty'])){
		$editingFacultyId = array();
		$editingFacultyId = $_POST['facultyId'];
		if((!empty($editingFacultyId)) && (sizeof($editingFacultyId) == 1)){
			$editingFacultyId = implode(',', $_POST['facultyId']);
			$_SESSION["editingFacultyId"] = $editingFacultyId;
			redirect_to("admin_editFaculty.php");
		}else{
			echo "Select only one faculty";
		}
	}
?>

<div class="col-md-9 padding-top-30 show_users">
	<div class="panel">
		<div class="panel-heading">
			<h4> Faculty List </h4>
		</div>
		<div class="panel-body">
			<form name="Form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<table class="table">
					<thead>
						<th>First Name</th>
						<th>Second Name</th>
						<th>Email ID</th>
						<th>Mobile Number</th>
						<th>Edit Details</th>
					</thead>
					<tbody>
						<?php
							$query = "Select user.user_id, user.faculty_id, user.first_name, user.second_name, user.email_id, user.mobile, role.role from user, role where (user.user_id = role.user_id) AND (role.role = 'Faculty')";
							$result = mysqli_query($connection, $query);
							if(mysqli_num_rows($result) != 0){
								while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
									echo "<tr>";
										echo "<td>" .$row['first_name']. "</td>";
										echo "<td>" .$row['second_name']. "</td>";
										echo "<td>" .$row['email_id']. "</td>";
										echo "<td>" .$row['mobile']. "</td>";
										echo "<td><input type=\"checkbox\" name=\"facultyId[]\" value=".$row['faculty_id']."></td>";
									echo "</tr>";
								}
							}else if(mysqli_num_rows($result) == 0){
								echo "<h3 class=\"text-center\"> No records for the faculties </h3>";
							}else{
								echo mysqli_error($connection);
							}
						?>
					</tbody>
				</table>
				<div class="col-md-4 float-right">
					<button class="btn btn-primary " name="btnDeleteFaculty" id="btnDeleteFaculty"> Delete Faculty </button>
					<button class="btn btn-primary " name="btnEditFaculty" id="btnEditFaculty"> Edit Faculty </button>
				</div>
			</form>
		</div>
	</div>
</div>

<!--Footer Admin-->
<?php require('includes/footer_admin.php'); ?>
