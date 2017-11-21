<?php
//Written by Connor Sedwick
	session_start();
	$old_user = $_SESSION['userName'];
	unset($_SESSION['userName']);
	session_destroy();
?>
<!DOCTYPE HTML>
<html> 
    <head>
    	 
        <!--meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"-->
        <link rel="stylesheet" href="style.css" />
        <meta charset="utf-8">
        <title>
        	Welcome to Formula One        </title>
         <link rel="stylesheet">
    </head>
    <body>
    <?php include('navagation.php'); ?>
	<nav id="menu" class = "gradient">
	 <ul class="horizontal">
	 	<li><a href="http://web.engr.oregonstate.edu/~songyip/CS_340/CS_340_project/home.php">Home</a></li>
       	<li><a href="http://web.engr.oregonstate.edu/~songyip/CS_340/CS_340_project/constructor.php">Constructors</a></li>
		<li><a href="http://web.engr.oregonstate.edu/~songyip/CS_340/CS_340_project/driver.php">Drivers</a></li>
		<li><a href="http://web.engr.oregonstate.edu/~songyip/CS_340/CS_340_project/circuit.php">Circuits</a></li>
		<li><a href="http://web.engr.oregonstate.edu/~songyip/CS_340/CS_340_project/record.php">Record</a></li>
		<li><a href="http://web.engr.oregonstate.edu/~songyip/CS_340/CS_340_project/2017result.php">2017 Result</a></li>
	 </ul>
	</nav>
	<section id="content">
		<h2> Log Out Page</h2>
    <?php
		if (!empty($old_user)) {
			echo 'User: '.$old_user.' is logged out';
		} else {
			echo 'You were not logged in!';
		}
	?>
    </section>
    </body>
</html>