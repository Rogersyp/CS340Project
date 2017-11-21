<?php
	//Written by Connor Sedwick
	//This file validates the password and user passed from passwordCheck.js
	session_start();
	include 'connectvars.php'; //Values to connect to my database
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$dbc) {
			die('Could not connect: ');
		}
	//Getting username if logged in
	$user = $_GET['user'];
	$password = sha1($_GET['pass']);
    $password = substr($password,0,20);
	$outcome = 0;

	if(isset($password) && isset($user)){
		$query="SELECT * FROM User WHERE username='$user'and password='$password'";
		$result=mysqli_query($dbc,$query);

		if(mysqli_num_rows($result) == 1){
			// The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
			  $outcome = 1;
			  print $outcome;
			  exit();
			}
		else {
          // The username/password are incorrect so set an error message
			print $outcome;
			exit();
		}
		print $outcome;
	}

	
	?>