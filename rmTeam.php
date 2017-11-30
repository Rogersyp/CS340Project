<?php header('Location:account.php');
//Written by Connor Sedwick
	include 'connectvars.php';
    session_start();
    $userName = $_SESSION['userName'];
    $favTeam = $_POST['team'];
     
    $numero = count($favTeam);
    echo "You selected ".$numero." teams.";
    
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$table = "USER_favorite_team";

    for($i=0; $i < $numero; $i++){
        $query="DELETE FROM $table WHERE username='$userName' AND favorite_team='$favTeam[$i]'";
        $result = mysqli_query($dbc, $query);
    }
	if($result){
	} else {
		echo "ERROR";
	}
	mysqli_close();
?>