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
	if(isset($_POST['btnDeleteUser'])){
		$deletingUserId = array();
		$deletingUserId = $_POST['userId'];
		$userIds = implode(',', $_POST['userId']);
		$queryDeleteUsers = "Delete from user where user_id IN ($userIds)";
		if(mysqli_query($connection, $queryDeleteUsers)){
			echo "<script type=\"text/javascript\"> alert(Deletion Complete) </script>";
		}else{
			echo mysqli_error($connection);
		}
	}
?>

<!--Editing Notice-->
<?php
	if(isset($_POST['btnEditUser'])){
		$editingUserId = array();
		$editingUserId = $_POST['userId'];
		if((!empty($editingUserId)) && (sizeof($editingUserId) == 1)){
			$userIds = implode(',', $_POST['userId']);
			$_SESSION["editingUserId"] = $userIds;
			redirect_to("admin_editUser.php");
		}else{
			echo "Select only one user";
		}
	}
?>

<div class="col-md-9 padding-top-30 show_users">
	<div class="panel">
		<div class="panel-heading">
			<h4> Registered Users </h4>
		</div>
		<div class="panel-body">
			<form name="Form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<table class="table">
					<thead>
						<th>First Name</th>
						<th>Second Name</th>
						<th>Email ID</th>
						<th>Mobile Number</th>
						<th>Role</th>
						<th>Edit User</th>
					</thead>
					<tbody>
						<?php
							$query = "Select user.user_id, user.faculty_id, user.first_name, user.second_name, user.email_id, user.mobile, role.role from user, role where user.user_id = role.user_id ORDER BY role.role";
							$result = mysqli_query($connection, $query);
							if(mysqli_num_rows($result) != 0){
								while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
									echo "<tr>";
										echo "<td>" .$row['first_name']. "</td>";
										echo "<td>" .$row['second_name']. "</td>";
										echo "<td>" .$row['email_id']. "</td>";
										echo "<td>" .$row['mobile']. "</td>";
										echo "<td>" .$row['role']. "</td>";
										echo "<td><input type=\"checkbox\" name=\"userId[]\" value=".$row['user_id']."></td>";
									echo "</tr>";
								}
							}else if(mysqli_num_rows($result) == 0){
								echo "<h3 class=\"test-center\"> No records for the users </h3>";
							}else{
								echo mysqli_error($connection);
							}
						?>
					</tbody>
				</table>

				<div class="col-md-4 float-right">
					<button class="btn btn-primary " name="btnDeleteUser" id="btnDeleteUser"> Delete User </button>
					<button class="btn btn-primary " name="btnEditUser" id="btnEditUser"> Edit User </button>
				</div>
			</form>
		</div>
	</div>
</div>
<!--Footer Admin-->
<?php require('includes/footer_admin.php'); ?>
