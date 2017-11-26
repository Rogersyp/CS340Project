<?php
//Written by Connor Sedwick
	
    #session_start();
	session_start();
	
	include 'connectvars.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<link rel="stylesheet" href="style.css">
    <!-- Script for the event handlers    -->
	<script type = "text/Javascript"  src = "signup.js" > </script>	
</head>
<body>
	<!--header and navigation-->
	<?php include('navagation.php'); 
		if (!isset($_SESSION['userName'])) {
			echo " <h2> Log In </h2><p> "; 
		}
	?>
	<?php 	
	if ((isset($_POST['userName'])) && (isset($_POST['password'])) ){
		$userName = $_POST['userName'];
		$password = sha1($_POST['password']);
        $password = substr($password,0,20);
	
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$dbc) {
			die('Could not connect: ');
		}
	
		$query = "SELECT * FROM User WHERE username='$userName' and password='$password'";
		$result = mysqli_query($dbc, $query);
	
		if (mysqli_num_rows($result) == 1) {
	
			// The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
			  $row = mysqli_fetch_array($result);
			  $_SESSION['userName'] = $row['username'];
			  $_SESSION['email'] = $row['email'];
			  $_SESSION['password'] = $row['password'];
			}
		else {
          // The username/password are incorrect so set an error message
			echo "Sorry, you must enter a valid username and password to log in.";
		}
		mysqli_free_result($result);
		mysqli_close($dbc);
		
	}  
	//Taken from login.php on Canvas
	if (isset($_SESSION['userName'])) {
		echo " <h3> Log In Successful.</h3> <h3> Welcome ".$_SESSION['userName']."</h3>"; 
	}
	else {
		if (!isset($userName)) {
			echo " <p> Please enter your Username and Password </p> ";
		}	
	}
	?>
	<script type="text/javascript" src="passwordCheck.js">
		//Form for user input to login
		</script>	
		<?php 
		if (!isset($_SESSION['userName'])) {
			echo '<form id="myForm" action="login.php" method="POST">
				<table>
					<tr>
					<th style="text-align:left;">Username: </th> <td><input type="text" id="userName" name="userName" /></td>
					</tr>
					<tr>
					<th style="text-align:left;">Password: </th><td><input type="password" id="password" name="password" onblur="checkPassword("password")"/></td>
					</tr>
				</table>
			<input type="submit" id="submit" name="submit" value="Submit" />
			</form>';
		}
		?>
		<!--The follwoing lines only appear when the user clicks outside of the password entry box-->
		<span id="success" style="display: none;">Correct Password</span> 
		<span id="failure" style="display: none;">Incorrect Password</span>

		<!--The follwoing lines were used to check values passed to variable 'result' in passwordChack.js-->
		<div id="ack"></div>
		<div id="ack2"></div>
		
	<?php
		include('footer.php');
	?>
</body> 
</html>