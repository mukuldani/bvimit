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
	$query = "Select * from placement_student ORDER BY date";
	$result = mysqli_query($connection, $query);
	if(mysqli_num_rows($result) != 0){
			echo "<div class=\"col-md-9 padding-top-30 show_users\">";
				echo "<div class=\"panel\">";
					echo "<div class=\"panel-heading\">";
						echo "<h4> Placed Students </h4>";
					echo "</div>";
					echo "<div class=\"panel-body\">";
						echo "<table class=\"table\">";
							echo "<thead>";
								echo "<th>First Name</th>";
								echo "<th>Second Name</th>";
								echo "<th>Company Placed</th>";
								echo "<th>Package</th>";
								echo "<th>Date</th>";
							echo "</thead>";
							echo "<tbody>";
								while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
									echo "<tr>";
										echo "<td>" .$row['first_name']. "</td>";
										echo "<td>" .$row['second_name']. "</td>";
										echo "<td>" .$row['company_placed']. "</td>";
										echo "<td>" .$row['package_amt']. "</td>";
										echo "<td>" .$row['date']. "</td>";
									echo "</tr>";
								}
							echo "</tbody>";
						echo "</table>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
	}else if(mysqli_num_rows($result) == 0){
		echo "<div class=\"col-md-9 padding-top-30 show_users\">";
			echo "<h3 class=\"text-center\"> No records for the placed students </h3>";
		echo "</div>";
	}else{
		echo mysqli_error($connection);
	}
?>
<!--Footer Admin-->
<?php require('includes/footer_admin.php'); ?>
