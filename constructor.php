<?php
//Written by Connor Sedwick
    
    #session_start();
    session_start();
    include 'connectvars.php';
    
    if ( (isset($_SESSION['userName'])) ) {
        $userName = $_SESSION['userName'];
    
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if (!$dbc) {
            die('Could not connect: ');
        }
        
        //mysqli_free_result($result);
        //mysqli_close($dbc);
        
    }  
?>
<!DOCTYPE HTML>
<html> 
    <head>
    	 
        <!--meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"-->
        <title>
        	Constructors        </title>
         <link rel="stylesheet" href="style.css">
    </head>
    <body>
		<?php include('navagation.php'); ?>
		<h1>Constructors</h1>
		<section id="content">
			<?php 
				include 'connectvarsEECS.php'; 
	
				$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
				if (!$conn) {
					die('Could not connect: ' . mysql_error());
				}
			// Retrieve name of table selected	

				$query = "SELECT * FROM Teams ";

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
                            echo "<img src='data:image/jpeg;base64,".base64_encode($rows['team_img'])."'/ style='width:350px; height=350px;'>";
                            echo "<tr>";
                                echo "<td><strong>Name:</strong></td>";
                                echo "<td>".$rows['t_Name']."</td>";
                            echo "</tr>";
                            echo "<tr>
                                <td><strong>Managers:</strong></td>
                                <td>".$rows['managers']."</td>
                            </tr>";
                            echo "<tr>
                                <td><strong>Owners:</strong></td>
                                <td>".$rows['owners']."</td>
                            </tr>";
                            echo "<tr>
                                <td><strong>Engine Sponsor:</strong></td>
                                <td>".$rows['engine_sponsor']."</td>
                            </tr>";
                            echo "<tr>
                                <td><strong>Country:</strong></td>
                                <td>".$rows['t_country']."</td>
                            </tr>";
                            echo "<tr>
                                <td><strong>City:</strong></td>
                                <td>".$rows['t_city']."</td>
                            </tr>";
                            echo "</table></td>
                        </tr>
                    </table><br />";
                }//-----------------------------------------------------------------------
                /*
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
*/
				mysqli_free_result($result);
				mysqli_close($conn);

				include('footer.php');
			?>
		</section>
		
    </body>
</html>
