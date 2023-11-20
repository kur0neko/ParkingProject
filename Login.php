<!DOCTYPE html>
<html>
<head>
    <title>SJSU Garage</title>
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
                <form action="action_page.php" method="post" accept-charset="UTF-8">
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