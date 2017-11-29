<?php header('Location:account.php');
//Written by Connor Sedwick
	include 'connectvars.php';
    session_start();
    $userName = $_SESSION['userName'];
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$table = "USER_favorite_driver";
	
	$driver = $_POST['fav_Driver'];
	echo $driver ." ". $userName;

	$query="INSERT INTO $table (favorite_driver, userName) VALUES ('"."$driver"."', '"."$userName"."')";
	echo $query;
	$result = mysqli_query($dbc, $query);

	if($result){
	} else {
		echo "ERROR";
	}
	mysqli_close();
?>