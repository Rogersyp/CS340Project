<?php
	//the header and navigation bar used in each of the files.
    session_start();
    include 'connectvars.php';
	
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if (!$dbc) {
        die('Could not connect: ');
    }

    if (isset($_SESSION['userName'])) 
    {
        echo 
        '<header>
            <h3>2017 Formula One Racing Database </h3> 
            <nav id="menu" class = "gradient">
                <ul class="horizontal">
                     <li><a href="home.php">Home</a></li>
                     <li><a href="constructor.php">Constructors</a></li>
                     <li><a href="driver.php">Drivers</a></li>
                     <li><a href="circuit.php">Circuits</a></li>
                     <li><a href="record.php">Record</a></li>
                     <li><a href="logout.php">Log out</a></li>
                     <li><a href="account.php">Account</a></li>
                </ul>
             </nav>
        </header>';
    }
    else 
    {
        echo 
        '<header>
            <h3>2017 Formula One Racing Database </h3> 
            <nav id="menu" class = "gradient">
                <ul class="horizontal">
                     <li><a href="home.php">Home</a></li>
                     <li><a href="constructor.php">Constructors</a></li>
                     <li><a href="driver.php">Drivers</a></li>
                     <li><a href="circuit.php">Circuits</a></li>
                     <li><a href="record.php">Record</a></li>
                     <li><a href="login.php">Log in</a></li>
                     <li><a href="signup.php">Sign up</a></li>
                </ul>
             </nav>
        </header>';
    }
?>