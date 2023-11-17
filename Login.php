<!DOCTYPE html>
<html>
<head>
    <title>SJSU Garage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Slidestyle.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="navbar">
        <h2>WELCOME TO SJSU GARAGE</h2>
        <a href="#about">About Us</a>
        <a href="#feedback">Feedback</a>

    </div>   
    
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

        <div  class="signup">
    
            <form>
                <label for ="chk" aria-hidden="true">Sign up</label>
                <input type="text" name="txt" placeholder="First name" required="">
                <input type="text" name="txt" placeholder="Last name" required="">
                <input type="email" name="email" placeholder="Email" required="">
                <input type= "Password" name="pswd" placeholder="Password" required="">
                <button> Sign up</button>
                
            </form>
        </div>
        <div class="login">
            <form>
                <label for="chk" aria-hidden="true">Login</label>
                <input type="email" name="email" placeholder="Email" required="">
                <input type="Password" name="pswd" placeholder="Password" required="">
                <a id="auth-fpp-link-bottom" class="shifted-anchor" href="">Forgot password?</a>
                <button>Login</button>  

                <?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "SJSUGARAGE";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$dbname) or die("Connect failed: %s\n". $conn -> error);
    $sql = "SELECT * FROM customers";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo $row['fname'];
  }
} else {
  echo "0 results";
}




?>


            </form>
        </div>
    </head>
    </html>
