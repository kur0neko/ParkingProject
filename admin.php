<!--CMPE138_TEAM#1_SOURCES -->
<!DOCTYPE html>
<html>
<head>
    <title>Great Garage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/Slidestyle.css?v=<?php echo time();?>"/>
</head>
<body>
<header class="main">
        <nav>
            <a href="index.php" class="logo">
                <img src="images/logoCat.png">
            </a>
            <ul class="menu">
                <li><a href="index.php" >Home</a></li>
                <li><a href="Login.php" class="active">Login</a></li>
                <li><a href="About.php" >About</a></li>
                <li><a href="Contact.php">Contact</a></li>
            </ul>
        </nav>
    <div class="themain">
        <input type="checkbox" id="chk" aria-hidden="true">

        <div  class="signup">
                <form action="signup.php" method="post" accept-charset="UTF-8">
                <label for ="chk" aria-hidden="true">Sign up</label>
                <input type="email" name="email" placeholder="Email" required="">
                <input type="username" name="usernam" placeholder="username" required="">
                <input type= "password" name="password" placeholder="Password" required="">
                <input type= "password" name="confirm" placeholder="Confirm Password" required="">
                <input type="submit" value="Submit"><br>
            </form>
        </div>
        <div class="login">
                <form action="loginScript.php" method="post" acept-charset="UTF-8">
                <label for="chk" aria-hidden="true">Login</label>
                <input type="username" name="username" placeholder="username">
                <input type="password" name="password" placeholder="password">
                <a id="auth-fpp-link-bottom" class="shifted-anchor" href="">Forgot password?</a>
                <input type="submit" value="submit" name="submit"/><br> 
            </form>
        </div>
    </head>ßß
</body>
</html>
				<?php
				echo "<tr><th>Spot Number</th><th>Status</th><th>Username</th><th>Start Time</th><th>Price</th></tr>";

				class TableRows extends RecursiveIteratorIterator { 
				    function __construct($it) { 
				        parent::__construct($it, self::LEAVES_ONLY); 
				    }

				    function current() {
				        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
				    }

				    function beginChildren() { 
				        echo "<tr>"; 
				    } 

				    function endChildren() { 
				        echo "</tr>" . "\n";
				    } 
				} 

				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "greatGarage.sql";

				try {
				    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
				    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				    $stmt = $conn->prepare("SELECT SpotNumber, Status, Username, StartTime, Price FROM parkingSpaces"); 
				    $stmt->execute();

				    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
				    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
				        echo $v;
				    }
				}
				catch(PDOException $e) {
				    echo "Error: " . $e->getMessage();
				}
				$conn = null;
				echo "</table>";
				?>
			</article>
		</div>
	</div>


		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>

</body>
</html>
