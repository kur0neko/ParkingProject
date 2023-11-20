<!DOCTYPE html>
<html>
<head>
    <title>SJSU Garage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/Slidestyle.css?v=<?php echo time();?>"/>
</head>
<body>
    <div class="navbar">
        <h1>WELCOME TO SJSU GARAGE</h2>
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
            </form>
        </div>
    </head>
</body>
</html>