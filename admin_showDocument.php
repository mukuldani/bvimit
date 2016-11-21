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

<!--Deleting Document-->
<?php
	if(isset($_POST['btnDeleteDocument'])){
		$deletingDocumentId = array();
		$deletingDocumentId = $_POST['documentId'];
		$documentIds = implode(',', $_POST['documentId']);
		$queryDeleteDocument = "Delete from document where document_id IN ($documentIds)";
		if(mysqli_query($connection, $queryDeleteDocument)){
			echo "<script type=\"text/javascript\"> alert(Deletion Complete) </script>";
		}else{
			echo mysqli_error($connection);
		}
	}
?>

<!--Editing Document-->
<?php
	if(isset($_POST['btnEditDocument'])){
		$editingDocumentId = array();
		$editingDocumentId = $_POST['documentId'];
		if((!empty($editingDocumentId)) && (sizeof($editingDocumentId) == 1)){
			$documentId = implode(',', $_POST['documentId']);
			$_SESSION["editingDocumentId"] = $documentId;
			redirect_to("admin_editDocument.php");
		}else{
			echo "Select only one document";
		}
	}
?>

<div class="col-md-9 padding-top-30 show_users">
	<div class="panel">
		<div class="panel-heading">
			<h4> Docments </h4>
		</div>
		<div class="panel-body">
			<form name="Form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<table class="table">
					<thead>
						<th>Document Title</th>
						<th>Document Type</th>
						<th>Document Date</th>
						<th>Edit Document</th>
					</thead>
					<tbody>
						<?php
							$query = "Select * from document order by document_type";
							$result = mysqli_query($connection, $query);
							if(mysqli_num_rows($result) != 0){
								while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
										echo "<tr>";
											echo "<td>" .$row['document_title']. "</td>";
											echo "<td>" .$row['document_type']. "</td>";
											echo "<td>" .$row['document_date']. "</td>";
											echo "<td><input type=\"checkbox\" name=\"documentId[]\" value=".$row['document_id']."></td>";
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
					<button class="btn btn-primary " name="btnDeleteDocument" id="btnDeleteDocument"> Delete Document </button>
					<button class="btn btn-primary " name="btnEditDocument" id="btnEditDocument"> Edit Document </button>
				</div>
			</form>
		</div>
	</div>
</div>
<!--Footer Admin-->
<?php require('includes/footer_admin.php'); ?>
