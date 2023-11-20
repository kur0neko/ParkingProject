<?php
	include("reservationScript.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Garage</title>
    <link rel="stylesheet" href="css/ReservStyle.css?v=<?php echo time();?>"/>
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
            <div id="main">
			<article class="post">
				<h2>Make A Reservation</h2>
				<form action="reservationScript.php" method="POST">
					Start Time: <input type="datetime-local" name="startTime"><br>
					End Time: <input type="datetime-local" name="endTime"><br>
				<br>
				<input type = "submit" name = "submit" value = "Submit">
			</form>
			</article>
		</div>

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
