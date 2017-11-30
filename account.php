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
	
		$query = "SELECT favorite_driver FROM USER_favorite_driver WHERE username='$userName'";
		$result_d = mysqli_query($dbc, $query);
		//$driver = mysqli_fetch_assoc($result_d);
		
		$query = "SELECT favorite_team FROM USER_favorite_team WHERE username='$userName'";
		$result_t = mysqli_query($dbc, $query);
		$team = mysqli_fetch_assoc($result_t);
		
		//mysqli_free_result($result);
		//mysqli_close($dbc);
		
	}  
?>

<!DOCTYPE HTML>
<html> 
    <head>
        <!--meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"-->
        <title>Account</title>
         <link rel="stylesheet" href="style.css">
    </head>
    <body>
		<?php include('navagation.php'); ?>
		<h3>Account</h3>
		<section id="content">
			<?php 
				echo "<h3>Username: ".$_SESSION['userName']."</h3>"; 
				
				$query = "SELECT * FROM USER_favorite_driver, Drivers WHERE USER_favorite_driver.username='$userName' AND USER_favorite_driver.favorite_driver = Drivers.d_Name";
				//$query = "SELECT * FROM Drivers";
                $result = mysqli_query($dbc, $query);
                $driversArr = [];
                
				if (mysqli_num_rows($result_d) > 0) {
                    $counter=0;
                    echo "<form id='rmDriv' name='rmDriv' method='post' action='rmDriv.php'>";
                        while($row = mysqli_fetch_array($result)){
                                $driversArr[] = $row['d_Name'];
                                echo "<table><tr>";
                                echo "<td><input type='checkbox' name='driver[]' id='driver' value='".$driversArr[$counter]."'></td><td><h3 id='favDriv'>Favorite Driver: ".$row['d_Name']."</h3></td>"; 
                                echo "</tr></table>";
                                echo "<p>Number: ".$row['d_number']."</p>";
                                echo "<p>Date of Birth: ".$row['date_of_birth']."</p>";
                                echo "<p>Nationality: ".$row['nationality']."</p>";
                                echo "<p>Team: ".$row['t_Name']."</p>";
                                $counter=$counter+1;
                        }
                    echo "<input type='submit' name='Remove' value='Remove' /></form>";
                    mysqli_free_result($result);
                    
                    $query = "SELECT * FROM Drivers";
                    $result = mysqli_query($dbc, $query);
                    echo "<form id='addDriver' name='addDriver' method='post' action='addDriver.php'>"; 
					echo "<select name='fav_Driver'>";
					while ($row = mysqli_fetch_array($result)) {
							echo "<option value='".$row['d_Name']."'>".$row['d_Name']."</option>";
					}
					echo "</select>";
					echo "<input type='submit' name='add_Driver' value='Add Driver' />";
					echo "</form>";
				} else {
					echo "<h3>Favorite Driver: No favorite driver selected</h3>";
					echo "<form id='addDriver' name='addDriver' method='post' action='addDriver.php'>"; 
					echo "<select name='fav_Driver'>";
					while ($row = mysqli_fetch_array($result)) {
							echo "<option value='".$row['d_Name']."'>".$row['d_Name']."</option>";
					}
					echo "</select>";
					echo "<input type='submit' name='add_Driver' value='Add Driver' />";
					echo "</form>";
				}
				
			
				$query = "SELECT * FROM USER_favorite_team, Teams WHERE USER_favorite_team.username='$userName' AND USER_favorite_team.favorite_team = Teams.t_Name";
				$result_team = mysqli_query($dbc, $query);
				$teamsArr = [];
                
				if (mysqli_num_rows($result_t) > 0) {
                    $counter=0;
                    echo "<form id='rmTeam' name='rmTeam' method='post' action='rmTeam.php'>";

                        while ($row = mysqli_fetch_assoc($result_team)) {
                                $teamsArr[] = $row['t_Name'];
                                echo "<table><tr>";
                                echo "<td><input type='checkbox' name='team[]' id='team' value='".$teamsArr[$counter]."'></td><td><h3 id='favTeam'>Favorite Team: ".$row['t_Name']."</h3></td>";
                                echo "</tr></table>";
                                echo "<p>Manager: ".$row['managers']."</p>";
                                echo "<p>Owners: ".$row['owners']."</p>";
                                echo "<p>Engine Sponsors: ".$row['engine_sponsor']."</p>";
                                echo "<p>Country: ".$row['t_country']."</p>";
                                echo "<p>City: ".$row['t_city']."</p>";
                                $counter=$counter+1;
					}
                    echo "<input type='submit' name='Remove' value='Remove' /></form>";
                    mysqli_free_result($result_team);

                    $query = "SELECT * FROM Teams";
                    $result_team = mysqli_query($dbc, $query);
                    echo "<form id='addTeam' name='addTeam' method='post' action='addTeam.php'>"; 
					echo "<select name='fav_Team'>";
					while ($row = mysqli_fetch_array($result_team)) {
							echo "<option value='".$row['t_Name']."'>".$row['t_Name']."</option>";
					}
					echo "</select>";
					echo "<input type='submit' name='add_Team' value='Add Team' />";
					echo "</form>";
				} else {
					echo "<h3>Favorite Team: No favorite driver selected</h3>";
					echo "<form id='addTeam' name='addTeam' method='post' action='addTeam.php'>"; 
					echo "<select name='fav_Team'>";
					while ($row = mysqli_fetch_array($result_team)) {
							echo "<option value='".$row['t_Name']."'>".$row['t_Name']."</option>";
					}
					echo "</select>";
					echo "<input type='submit' name='add_Team' value='Add Team' />";
					echo "</form>";
				}
			?>
		</section>
		<?php 
			mysqli_free_result($result_d);
			mysqli_free_result($result_t);
            mysqli_close($dbc);
			include('footer.php');
		?>
    </body>
</html>