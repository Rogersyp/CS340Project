<!DOCTYPE HTML>
<html> 
    <head>
    	 
        <!--meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"-->
        <title>Drivers</title>
         <link rel="stylesheet" href="style.css">
    </head>
    <body>
		<?php include('navagation.php'); ?>
		<h3>Drivers</h3>
		<section id="content">
			<?php 
				include 'connectvarsEECS.php'; 
	
				$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
				if (!$conn) {
					die('Could not connect: ' . mysql_error());
				}
			// Retrieve name of table selected	

				$query = "SELECT * FROM Drivers ";

				$result = mysqli_query($conn, $query);
				if (!$result) {
					die("Query to show fields from table failed");
				}
                //I added this part in to substitute for the big table layout. -Connor
                while($rows=mysqli_fetch_array($result)){
                    echo "
                    <table class='answer'>";
                        echo "<tr>";
                            echo "<td><table>";
							echo "<img src='data:image/jpeg;base64,".base64_encode($rows['driver_img'])."' />";
                            echo "<tr>";
                                echo "<td><strong>Driver Number:</strong></td>";
                                echo "<td>".$rows['d_number']."</td>";
                            echo "</tr>";
                            echo "<tr>
                                <td><strong>Name:</strong></td>
                                <td>".$rows['d_Name']."</td>
                            </tr>";
                            echo "<tr>
                                <td><strong>Date of birth:</strong></td>
                                <td>".$rows['date_of_birth']."</td>
                            </tr>";
                            echo "<tr>
                                <td><strong>Nationality:</strong></td>
                                <td>".$rows['nationality']."</td>
                            </tr>";
                            echo "<tr>
                                <td><strong>Team:</strong></td>
                                <td>".$rows['t_Name']."</td>
                            </tr>";
                            echo "</table></td>
                        </tr>
                    </table><br />";
                }//-----------------------------------------------------------------------
/*			// get number of columns in table	
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
*/
				mysqli_free_result($result);
				mysqli_close($conn);

				include('footer.php');
			?>
		</section>
		
    </body>
</html>