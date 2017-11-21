<?php
	//the header and navigation bar used in each of the files.
    session_start();
    include 'connectvars.php';
	
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if (!$dbc) {
        die('Could not connect: ');
    }
    if(!isset($_SESSION['userName'])){
        echo "<header>
                <h1>Car Trader</h1>
                <nav><ul>
                    <li><a href='home.php'>Home</a></li>
                    <li><a href='login.php'>Login</a></li>
                    <li><a href='signup.php'>Sign Up</a></li>
                    <li><a href='aboutUs.php'>About Us</a></li>
                </ul></nav>
                </header>";
    } else{
        echo "<header>
                <h1>Car Trader</h1>
                <nav><ul>
                    <li><a href='home.php'>Welcome ".$_SESSION['userName']."!</a></li>
                    <li><a href='account.php'>Account</a></li>
                    <li><a href='logout.php'>Logout</a></li>
                    <li><a href='aboutUs.php'>About Us</a></li>
                </ul></nav>
                </header>";
        /*echo "<li><a href='home.php'>Welcome ".$_SESSION['userName']."!</a></li>";
        echo "<li><a href="account.php">Account</a></li>";
        echo "<li><a href='logout.php'>Logout</a></li>";
        echo "<li><a href='myAccount.php' class='accnavb'>My Account</a></li>";			*/
    }
    /*if (isset($_SESSION['firstName'])) 
    {
        echo 
        '<header>
            <h1>Car Trader</h1>
            <nav>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="account.php">Account</a></li>
                    <li><a href="logout.php">Log out</a></li>
                    <li><a href="aboutUs.php">About Us</a></li>
                </ul>
            </nav>
        </header>';
    }
    else 
    {
        echo 
        '<header>
            <h1>Car Trader</h1>
            <nav>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="login.php">Log in</a></li>
                    <li><a href="signup.php">Sign up</a></li>
                    <li><a href="aboutUs.php">About Us</a></li>
                </ul>
            </nav>
        </header>';
    }
*/


?>