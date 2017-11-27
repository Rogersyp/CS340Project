<!DOCTYPE HTML>
<html> 
    <head>
    	 
        <!--meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"-->
        <title>
        	F1 Record        </title>
         <link rel="stylesheet">
    </head>
    <body>
		<?php include('navagation.php'); ?>
		<h3>F1 Records</h3>
		<?php
			include 'connectvars.php';
			$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			if (!$conn) {
				die('Could not connect: ' . mysqli_error());
			}
			
		// Query the database for names of all tables	
			$result = mysqli_query($conn, "SHOW TABLES");
			if (!$result) {
				die("Query to show fields from table failed");
			}
			$num_row = mysqli_num_rows($result);
			
			// 	Create a pulldown menu with names of all Tables in a form
			//   the action is to call showTable.php to diplay the contens of the table

			echo "<h3>Choose one table:<h3>"; 
			echo "<form action=\"recordinfo.php\" method=\"POST\">";
			echo "<select name=\"myTable\" size=\"1\" Font size=\"+2\">";

			// Select a database table to display
			//	for($i=0; $i<$num_row; $i++) {
			$tablename=mysqli_fetch_row($result);
			echo "<option value='world_champions' >".'World Champions'."</option>";
			echo "<option value='race_wins'>".'Race Wins'."</option>";
			echo "<option value='pole_position'>".'Pole Position'."</option>";
			echo "<option value='podiums'>".'Podiums'."</option>";
			echo "<option value='fastest_lap_time'>".'Fastest Lap Time'."</option>";
			//	}
		
			echo "</select>";
			echo "<div><input type=\"submit\" value=\"Submit\"></div>";
			echo "</form>";
			
			mysqli_free_result($result);
			mysqli_close($conn);


		?>
		<?php include('footer.php');?>
    </body>
</html>