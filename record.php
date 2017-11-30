<!DOCTYPE HTML>
<html> 
    <head>
    	 
        <!--meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"-->
        <title>
        	F1 Record        </title>
         <link rel="stylesheet" href="style.css">
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

			echo "<h3>Choose one Record:<h3>"; 
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
			

			echo"<h3>World Champions:<h3>";
			echo "<p> The driver who aquires the most points in a season, in other words, the winner of the season <p>";

			echo"<h3>Race wins:<h3>";
			echo "<p> The winner of a single F1 race <p>";

			echo"<h3>Pole Position:<h3>";
			echo "<p> The first place on the starting grid, as awarded to the driver who recorded the fastest lap time in qualifying.<p>";

			echo"<h3>Podium:<h3>";
			echo "<p> Finish a F1 Race in Top 3 <p>";

			echo"<h3>Fastest Lap Time:<h3>";
			echo "<p> Set a fastest lap time in race session<p>";

			mysqli_free_result($result);
			mysqli_close($conn);


		?>
		<?php include('footer.php');?>
    </body>
</html>