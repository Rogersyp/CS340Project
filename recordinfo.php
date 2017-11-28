<!DOCTYPE html>
<!-- showTable.php CS 340 -->
<html>
	<head>
		<title>Record Viewer</title>
		<link rel="stylesheet" href = "style.css">
	</head>
<body>
<?php
// change the value of $dbuser and $dbpass to your username and password
	include('navagation.php');
	include 'connectvars.php'; 
	
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}

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

// Retrieve name of table selected	
	$table = $_POST['myTable'];
	$query = "SELECT * FROM $table ";

	$result = mysqli_query($conn, $query);
	if (!$result) {
		die("Query to show fields from table failed");
	}
// get number of columns in table	
	$fields_num = mysqli_num_fields($result);
	echo "<h1>Table: $table </h1>";
	echo "<table border='1'><tr>";
	
// printing table headers
	for($i=0; $i<$fields_num; $i++) {	
		$field = mysqli_fetch_field($result);	
		echo "<td><b>$field->name</b></td>";
	}
	echo "</tr>\n";
	while($row = mysqli_fetch_row($result)) {	
		echo "<tr>";	
		// $row is array... foreach( .. ) puts every element
		// of $row to $cell variable	
		foreach($row as $cell)		
			echo "<td>$cell</td>";	
		echo "</tr>\n";
	}

	mysqli_free_result($result);
	mysqli_close($conn);
?>
</body>

</html>

	
