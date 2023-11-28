<?php
                        session_start();

                    	//DB config
                    	define('_HOST_NAME_', 'localhost');
                    	define('_USER_NAME_', 'root');
                    	define('_DB_PASSWORD', '');
                    	define('_DATABASE_NAME_','parkinggarage.sql');

                    	//PDO DB connection
                    	try {
                    		$databaseConnection = new PDO('mysql:host='._HOST_NAME_.';dbname='._DATABASE_NAME_, _USER_NAME_, _DB_PASSWORD);
                    		$databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    	} catch(PDOException $e) {
                    		echo 'ERROR: ' . $e->getMessage();
                    	}

                       //throw exception connect to host
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
<html>
<head>
<title>Account</title>
<link rel="stylesheet" type="text/css" href="css/main.css?v=<?php echo time();?>"/>
</head>
<body>
	<div id="wrapper">
		<header id="header">
		<a href="index.php" class="logo">
                <img src="images/logoCat.png"></a>
				<nav class="links">
					<ul>
						<li><p>Welcome to Best Garage!</p></li>
						<li><a href="reservation.php">Make a reservation</a></li>
						<li><a href="index.php">Log out</a></li>
					</ul>
				</nav>
				<nav class="main">
					<ul>
						<li class="search">
								<a class="fa-search" href="#search">Search</a>
								<form id="search" method="get" action="#">
								<input type="text" name="query" placeholder="Search" />
							</form>
						</li>
						<li class="menu">
							<a class="fa-bars" href="#menu">Menu</a>
						</li>
					</ul>
				</nav>
		</header>

		<!-- Menu -->
		<section id="menu">
			<section>
				<ul class="links">
					<li>
						<a href="reservation.php"><h3>Make a reservation</h3></a>
						<a href="index.php"><h3>Log out</h3></a>
					</li>
			</section>
		</section>

		<!-- Main -->
		<div id="main">
			<article class="post">
				<p>
					<h2>My Reservations</h2>
					<form action="action_page.php" method="post" accept-charset="UTF-8">
            <a>Current occupancies</a><br><br>
						<a>My Reservations</a><br>
							<?php
  							$user = htmlspecialchars($_SESSION['username']);
  							$result = getSingleValue('accounts','username',$user,'Reservation',$connection);
                            $spotNum = getSingleValue('reservations','username', $user, 'spotNumber', $connection);
  	            echo "Reservation time: $result<br><br>";
                echo "Spot Number: $spotNum<br><br>";
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
					<a href="reservation.php">Make a reservation</a><p>
					</form>
				</p>
			</article>
		</div>

		<section id="sidebar">
			<section id="intro">
				<header>
					<h2>My Account</h2>
                </header>
			</section>
			<div>
				<p>
					<h2>My Info</h2>
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
                    ?>
                    <br>
					<a href="editinfo.html">Edit Info</a><p>
					</form>
				</p>
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
