<!--CMPE138_TEAM#1_SOURCES -->
<?php
                        session_start();
                    	define('_HOST_NAME_', 'localhost');
                    	define('_USER_NAME_', 'root');
                    	define('_DB_PASSWORD', '');
                    	define('_DATABASE_NAME_', 'parkinggarage.sql');

                    	try {
                    		$databaseConnection = new PDO('mysql:host='._HOST_NAME_.';dbname='._DATABASE_NAME_, _USER_NAME_, _DB_PASSWORD);
                    		$databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    	} catch(PDOException $e) {
                    		echo 'ERROR: ' . $e->getMessage();
                    	}

                        //throw exception to test the DATABASE
                        try {
                            $connection = new PDO('mysql:host='._HOST_NAME_.';dbname='._DATABASE_NAME_, _USER_NAME_, _DB_PASSWORD);
                            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        }
                        catch (PDOException $err)
                        {
                            echo $err->getMessage();
                        }

                        function getSingleValue($tableName, $prop, $value, $columnName, $connection)
							{
							  $q = $connection->query("SELECT `$columnName` FROM `$tableName` WHERE $prop='".$value."'");
							  $f = $q->fetch();
							  $result = $f[$columnName];
							  return $result;
							}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Garage</title>
    <link rel="stylesheet" href="css/anotherStyle.css?v=<?php echo time();?>"/>
</head>
<body>
    <header class="main">
        <nav>
            <a href="index.php" class="logo">
                <img src="images/logoCat.png">
            </a>

            <ul class="menu">
                <li><a href="index.php" >Log out</a></li>
                <li><a href="Login.php"class="active" >Login</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php" >Contact</a></li>
            </ul>
        </nav>
    </header>
    <section class="features">
        <div class="feature-container">
            <div class="feature-box">
            <h1 style="text-align: center;">My Account</h2>
            <h2 style="text-align: center;">My Reservation</h2>
            <form action="action_page.php" method="post" accept-charset="UTF-8">
            <a>Current occupancies</a><br><br>
						<a>My Reservations</a><br>
							<?php
  							$user = htmlspecialchars($_SESSION['username']);
  							$result = getSingleValue('accounts','username',$user,'Reservation',$connection);
                            $spotNum = getSingleValue('reservations','username', $user, 'spotNumber', $connection);
  	            echo "Reservation time: $result<br><br>";
                echo "Parking Number: $spotNum<br><br>";
	            ?>
						<script>
						function startTime() {
						    var today = new Date();
						    var h = today.getHours();
						    var m = today.getMinutes();
						    var s = today.getSeconds();
						    m = checkTime(m);
						    s = checkTime(s);
						    document.getElementById('time').innerHTML =h + ":" + m + ":" + s;
						    var t = setTimeout(startTime, 500);
						}
						function checkTime(i) {
						    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
						    return i;
						}
						</script>
						<body onload="startTime()"> </body>
						Current time:
						<div id="time"></div>
                        <br>
                        <button onclick="confirmParking()">Confirm Parking</button>
                        <li><a href="reservation.php" >Make A Reservation</a></li>
			            <li><a href="index.php" >Log out</a></li>
                        <h2>My Account Info</h2>
                        <?php
                        //store the username in a variable for use in SQL commands
                        //Store the username for the session in a variable for use in SQL commands
                        $user = htmlspecialchars($_SESSION['username']);

                        //print username and password
                        echo "Username: $user <br>";
                        echo "Password: ****** <br>";

                        //send SQL queries to the database and print the result
                        //print the balance
                        $result = getSingleValue('accounts','username',$user,'Balance',$connection);
                        echo "Balance: $result<br>";

                        //print any reservations
                         $result = getSingleValue('accounts','username',$user,'Reservation',$connection);
                        echo "Reservations: $result<br>";

                        //print license plate of car
                         $result = getSingleValue('accounts','username',$user,'LicensePlate',$connection);
                        echo "License Plate: $result<br>";
                        //close connection
                        //$connection->close();
                    ?> <br>
			</div>				
        </div>
    </div>
		</section>
	</div>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
</body>
</html>
