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
	$query = "Select * from notice order by notice_category";

	$result = mysqli_query($connection, $query);
	if(mysqli_num_rows($result) != 0){
			echo "<div class=\"col-md-9 padding-top-30 show_users\">";
				echo "<div class=\"panel\">";
					echo "<div class=\"panel-heading\">";
						echo "<h4> Notices </h4>";
					echo "</div>";
					echo "<div class=\"panel-body\">";
						echo "<table class=\"table\">";
							echo "<thead>";
								echo "<th>Notice Title</th>";
								echo "<th>Notice Words</th>";
								echo "<th>Notice Category</th>";
								echo "<th>Date Uploaded</th>";
							echo "</thead>";
							echo "<tbody>";
								while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
									echo "<tr>";
										echo "<td>" .$row['notice_title']. "</td>";
										echo "<td>"; echo print_notice_words($row['notice_words']); echo"</td>";
										echo "<td>" .$row['notice_category']. "</td>";
										echo "<td>" .$row['date_uploaded']. "</td>";
									echo "</tr>";
								}
							echo "</tbody>";
						echo "</table>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
	}else if(mysqli_num_rows($result) == 0){
		echo "<div class=\"col-md-9 padding-top-30 show_users\">";
			echo "<h3 class=\"text-center\"> No records for the notices </h3>";
		echo "</div>";
	}else{
		echo mysqli_error($connection);
	}
?>
<!--Footer Admin-->
<?php require('includes/footer_admin.php'); ?>
