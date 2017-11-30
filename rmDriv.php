<?php header('Location:account.php');
//Written by Connor Sedwick
	include 'connectvars.php';
    session_start();
    $userName = $_SESSION['userName'];
    $favDriver = $_POST['driver'];

    $numero = count($favDriver);
    echo "You selected ".$numero." drivers.";
     
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$table = "USER_favorite_driver";

    for($i=0; $i < $numero; $i++){
        $query="DELETE FROM $table WHERE username='$userName' AND favorite_driver='$favDriver[$i]'";
        $result = mysqli_query($dbc, $query);
    }

	if($result){
        echo "hgdsufighjakdhfukdhsalfiuhILUHUIDKSJLHFDFUOSIDABKJ";
    } else {
		echo "ERROR";
	}
	mysqli_close();
?>