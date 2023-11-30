<?php
                        session_start();

              
                    	define('Host_name', 'localhost');
                    	define('user_name', 'root');
                    	define('pass_word', '');
                    	define('db_Name', 'parkinggarage');

        
                    	try {
                    		$databaseConnection = new PDO('mysql:host='.Host_name.';dbname='.db_Name, user_name, pass_word);

                    		$databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    	} catch(PDOException $erorMsg) {
                    		echo 'ERROR: ' . $erorMsg->getMessage();
                    	}

                        try { //try threw exception
                            $connection = new PDO('mysql:host='._HOST_NAME_.';dbname='._DATABASE_NAME_, _USER_NAME_, _DB_PASSWORD);

                            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        }
                        catch (PDOException $erorMsg)
                        {
                            echo $erorMsg->getMessage();
                        }

                        function getSingleValue($tableName, $prop, $value, $columnName, $connection)
							{
							  $queryRun = $connection->query("SELECT `$columnName` FROM `$tableName` WHERE $prop='".$value."'");
							  $fetchQury = $queryRun->fetch();
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
						    var hr = today.getHours();
						    var mnt = today.getMinutes();
						    var sec = today.getSeconds();
						    mnt = checkTime(m);
						    sec = checkTime(s);
						    document.getElementById('time').innerHTML =hr + ":" + mmnt + ":" + sec;
						    var timeOut = setTimeout(startTime, 500);
						}
						function checkTime(i) {
						    if (i < 10) {i = "0" + i};  
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
                        
                        $user = htmlspecialchars($_SESSION['username']);

                       
                        echo "Username: $user <br>";
                        echo "Password: ****** <br>";

                       
                        $result = getSingleValue('accounts','username',$user,'Balance',$connection);
                        echo "Balance: $result<br>";

                         $result = getSingleValue('accounts','username',$user,'Reservation',$connection);
                        echo "Reservations: $result<br>";

                         $result = getSingleValue('accounts','username',$user,'LicensePlate',$connection);
                        echo "License Plate: $result<br>";
            
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
<?php
$connection->close();
?>