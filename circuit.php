<!DOCTYPE HTML>
<html> 
    <head>
    	 
        <!--meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"-->
        <title>
        	Circuits        </title>
         <link rel="stylesheet">
    </head>
    <body>
		<?php include('navagation.php'); ?>
		<h3>Circuits</h3>
		<section id="content">
			<h1>Circuit page</h1>
			<?php 
				include 'connectvarsEECS.php'; 
	
				$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
				if (!$conn) {
					die('Could not connect: ' . mysql_error());
				}
			// Retrieve name of table selected	

				$query = "SELECT * FROM Circuits ";

				$result = mysqli_query($conn, $query);
				if (!$result) {
					die("Query to show fields from table failed");
				}
			// get number of columns in table	
				$fields_num = mysqli_num_fields($result);
				echo "<table id='t01' border='1'><tr>";
				
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

				include('footer.php');		
			?>
		</section>
		
    </body>
</html>