<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" href="style.css">
    <!-- Script for the event handlers    -->
	<script type = "text/Javascript"  src = "signup.js" > </script>	
</head>
<body>
	<!--header and navigation-->
	<?php include('navagation.php'); ?>
	<h3>Sign Up</h3>

<?php
	include 'connectvars.php';
	//require_once('connect.php');
	// Connect to the database
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (isset($_POST['submit'])) {
		// Grab the profile data from the POST
		$username = mysqli_real_escape_string($dbc, trim($_POST['username']));
		$password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
		$password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
		$email = mysqli_real_escape_string($dbc, trim($_POST['email']));
	
		echo $username;

		if (!empty($username) && !empty($password1) && !empty($password2)) {
			// Make sure someone isn't already registered using this username
			$query = "SELECT * FROM User WHERE useruame = '$username'";
			$data = mysqli_query($dbc, $query);
			if (mysqli_num_rows($data) == 0) {
				// The username is unique, so insert the data into the database
				$password1 = sha1($password1);
				$query = "INSERT INTO User (username, password, email) VALUES ('$username', '$password1', '$email')";
				mysqli_query($dbc, $query);

				// Confirm success with the user
				echo '<p>Your new account has been successfully created. You\'re now ready to log in.</p>';
				//close the database when done using it.
				mysqli_close($dbc);
				exit();
			}
			else {
				// An account already exists for this username, so display an error message
				echo '<p class="error">An account already exists for this username. Please use a different address.</p>';
				$username = "";
			}
		}
		else {
			echo '<p class="error">You must enter all of the sign-up data, including the desired password twice.</p>';
		}
	}
  //make sure if the database is open after the php runs to close it.
  mysqli_close($dbc);
?>

	<p>Please enter your username and desired password to sign up for an account.</p>
	<p id="error"></p>
	<form id="valForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<fieldset>
			<legend>Registration Info</legend>
			<label class="lables">Username:</label>
			<input type="text" id="username" name="username" value="<?php if (!empty($username)) echo $username; ?>" /><br />
			<label>Password:</label>
			<input type="password" id="password1" name="password1" /><br />
			<label>Re-Enter Password:</label>
			<input type="password" id="password2" name="password2" /><br />
			<label>E-mail:</label>
			<input type="text" id="email" name="email" /><br />
		</fieldset>
	<input type="submit" value="Sign Up" name="submit" />
	</form>
	<?php include('footer.php');?>
</body> 
</html>
