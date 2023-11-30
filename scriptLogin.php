<?php
	session_start();

	define('DBHOSTNAME', 'localhost');

	define('DBUSERNAME', 'root');

	define('DBPASSWORD', '');

	define('DBname', 'parkinggarage');


	try {

		$databaseConnection = new PDO('mysql:host='.DBHOSTNAME.';dbname='.DBname, DBUSERNAME, DBPASSWORD);
		
		$databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} catch(PDOException $errorMesg) {

		echo 'ERROR: ' . $errorMesg->getMessage();
	}

	if(isset($_POST["submit"])){
		$errorMsg = '';

		$username = trim($_POST['username']);
		
		$password = trim($_POST['password']);

		if($username == '')
			$errorMsg .= 'You must enter your Username<br>';

		if($password == '')
			$errorMsg .= 'You must enter your Password<br>';


		if($errMsg == ''){
			$records = $databaseConnection->prepare('SELECT username,password FROM  accounts WHERE username = :username AND password = :password');
			$records->bindParam(':username', $username);
			$records->bindParam(':password', $password);
			$records->execute();
			$results = $records->fetch(PDO::FETCH_ASSOC);

			echo count($results);

			if(count($results) == 1){

				header("Location: loginError.php");
				exit;
			}
			else{
				$_SESSION['username'] = $results['username'];

				header("Location: Theaccount.php");
				exit;
			}
		}

	}
	
?>
