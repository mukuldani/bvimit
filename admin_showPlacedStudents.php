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

<!--Deleting Placed Student Details-->
<?php
	if(isset($_POST['btnDeletePlacedStudent'])){
		$deletingPlacedStudentId = array();
		$deletingPlacedStudentId = $_POST['placeStudentId'];

		$deletingPlacedStudentIds = implode(',', $_POST['placeStudentId']);
		$queryDeletePlacedStudent = "Delete from placement_student where placement_students_id IN ($deletingPlacedStudentIds)";
		if(mysqli_query($connection, $queryDeletePlacedStudent)){
			echo "<script type=\"text/javascript\"> alert(Deletion Complete) </script>";
		}else{
			echo mysqli_error($connection);
		}
	}
?>

<!--Editing Placed Student Details-->
<?php
	if(isset($_POST['btnEditPlacedStudent'])){
		$editingPlacedStudentId = array();
		$editingPlacedStudentId = $_POST['placeStudentId'];
		if((!empty($editingPlacedStudentId)) && (sizeof($editingPlacedStudentId) == 1)){
			$editingPlacedStudentId = implode(',', $_POST['placeStudentId']);
			$_SESSION["editingPlacedStudentId"] = $editingPlacedStudentId;
			redirect_to("admin_editPlacedStudent.php");
		}else{
			echo "Select only one student";
		}
	}
?>

<div class="col-md-9 padding-top-30 show_users">
	<div class="panel">
		<div class="panel-heading">
			<h4> Placed Students </h4>
		</div>
		<div class="panel-body">
			<form name="Form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<table class="table">
					<thead>
						<th>First Name</th>
						<th>Second Name</th>
						<th>Company Placed</th>
						<th>Package</th>
						<th>Date</th>
						<th>Edit Details</th>
					</thead>
					<tbody>
						<?php
							$query = "Select * from placement_student ORDER BY date";
							$result = mysqli_query($connection, $query);
							if(mysqli_num_rows($result) != 0){
								while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
									echo "<tr>";
										echo "<td>" .$row['first_name']. "</td>";
										echo "<td>" .$row['second_name']. "</td>";
										echo "<td>" .$row['company_placed']. "</td>";
										echo "<td>" .$row['package_amt']. "</td>";
										echo "<td>" .$row['date']. "</td>";
										echo "<td><input type=\"checkbox\" name=\"placeStudentId[]\" value=".$row['placement_students_id']."></td>";
									echo "</tr>";
								}
							}else if(mysqli_num_rows($result) == 0){
								echo "<h3 class=\"text-center\"> No records for the placed students </h3>";
							}else{
								echo mysqli_error($connection);
							}
						?>
					</tbody>
				</table>
				<div class="col-md-4 float-right">
					<button class="btn btn-primary " name="btnDeletePlacedStudent" id="btnDeletePlacedStudent"> Delete Details </button>
					<button class="btn btn-primary " name="btnEditPlacedStudent" id="btnEditPlacedStudent"> Edit Student </button>
				</div>
			</form>
		</div>
	</div>
</div>

<!--Footer Admin-->
<?php require('includes/footer_admin.php'); ?>
