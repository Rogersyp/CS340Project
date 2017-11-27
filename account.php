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
		$driver = mysqli_fetch_array($result_d);
		
		$query = "SELECT favorite_team FROM USER_favorite_team WHERE username='$userName'";
		$result_t = mysqli_query($dbc, $query);
		$team = mysqli_fetch_array($result_t);
		
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
				
				if (mysqli_num_rows($result_d) > 0) {
					echo "<h3>Favorite Driver: ".$driver['favorite_driver']."</h3>";
				} else {
					echo "<h3>Favorite Driver: No favorite driver selected</h3>";
				}
				
				if (mysqli_num_rows($result_t) > 0) {
					echo "<h3>Favorite Team: ".$team['favorite_team']."</h3>";
				} else {
					echo "<h3>Favorite Team: No favorite driver selected</h3>";
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