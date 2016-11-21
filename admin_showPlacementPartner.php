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

<!--Deleting Placement Partner Details-->
<?php
	if(isset($_POST['btnDeletePlacementPartner'])){
		$deletingPlacementPartnerId = array();
		$deletingPlacementPartnerId = $_POST['placementPartnerId'];
		if(sizeof($deletingPlacementPartnerId) == 0){
			echo "<script type=\"text/javascript\"> alert(Select atleast one to delete) </script>";
		}else{
			$deletingPlacementPartnerIds = implode(',', $_POST['placementPartnerId']);
			$queryDeletePlacementPartner = "Delete from placement_partner where placement_partner_id IN ($deletingPlacementPartnerIds)";
			if(mysqli_query($connection, $queryDeletePlacementPartner)){
				echo "<script type=\"text/javascript\"> alert(Deletion Complete) </script>";
			}else{
				echo mysqli_error($connection);
			}
		}
	}
?>

<!--Editing Placement Partner Details-->
<?php
	if(isset($_POST['btnEditPlacementPartner'])){
		$editingPlacementPartnerId = array();
		$editingPlacementPartnerId = $_POST['placementPartnerId'];
		if((!empty($editingPlacementPartnerId)) && (sizeof($editingPlacementPartnerId) == 1)){
			$editingPlacementPartnerId = implode(',', $_POST['placementPartnerId']);
			$_SESSION["editingPlacementPartnerId"] = $editingPlacementPartnerId;
			redirect_to("admin_editPlacementPartner.php");
		}else{
			echo "Select only one partner";
		}
	}
?>

<div class="col-md-9 padding-top-30 show_users">
	<div class="panel">
		<div class="panel-heading">
			<h4> Placement Partners </h4>
		</div>
		<div class="panel-body">
			<form name="Form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<table class="table">
					<thead>
						<th>Partner Name</th>
						<th>Edit Details</th>
					</thead>
					<tbody>
						<?php
							$query = "Select * from placement_partner";
							$result = mysqli_query($connection, $query);
							if(mysqli_num_rows($result) != 0){
								while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
									echo "<tr>";
										echo "<td>" .$row['partner_name']. "</td>";
										echo "<td><input type=\"checkbox\" name=\"placementPartnerId[]\" value=".$row['placement_partner_id']."></td>";
									echo "</tr>";
								}
							}else if(mysqli_num_rows($result) == 0){
								echo "<h3 class=\"text-center\"> No records for the placement partners </h3>";
							}else{
								echo mysqli_error($connection);
							}
						?>
					</tbody>
				</table>
				<div class="col-md-4 float-right">
					<button class="btn btn-primary " name="btnDeletePlacementPartner" id="btnDeletePlacementPartner"> Delete Partner </button>
					<button class="btn btn-primary " name="btnEditPlacementPartner" id="btnEditPlacementPartner"> Edit Partner </button>
				</div>
			</form>
		</div>
	</div>
</div>


<!--Footer Admin-->
<?php require('includes/footer_admin.php'); ?>
