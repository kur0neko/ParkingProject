<!--CMPE138_TEAM#1_SOURCES -->
<?php
	session_start();
	define('dbHostNmae', 'localhost');
	define('DBUserName', 'root');
	define('DBpassword', '');
	define('DBname', 'parkinggarage.sql');

	try {
		$databaseConnection = new PDO('mysql:host='.dbHostNmae.';dbname='.DBname, DBUserName, DBpassword);
		$databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $errorMSG) {
		echo 'ERROR: ' . $errorMSG->getMessage();
	}

	if(isset($_POST["submit"])){
		$erMsg = '';

		$username = trim($_POST['username']);
		$password = trim($_POST['password']);

		if($username == '')
			$erMsg .= 'You must enter your Username<br>';

		if($password == '')
			$erMsg .= 'You must enter your Password<br>';


		if($erMsg == ''){
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
				header("Location: account.php");
				exit;
			}
		}

	}

?>
