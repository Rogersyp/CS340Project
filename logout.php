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