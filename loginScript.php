<!--CMPE138_TEAM#1_SOURCES -->
<?php
	session_start();
	define('_HOST_NAME_', 'localhost');
	define('_USER_NAME_', 'root');
	define('_DB_PASSWORD', '');
	define('_DATABASE_NAME_', 'parkinggarage..sql');

	try {
		$databaseConnection = new PDO('mysql:host='._HOST_NAME_.';dbname='._DATABASE_NAME_, _USER_NAME_, _DB_PASSWORD);
		$databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}

	if(isset($_POST["submit"])){
		$errMsg = '';

		$username = trim($_POST['username']);
		$password = trim($_POST['password']);

		if($username == '')
			$errMsg .= 'You must enter your Username<br>';

		if($password == '')
			$errMsg .= 'You must enter your Password<br>';


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
				header("Location: account.php");
				exit;
			}
		}

	}

?>
