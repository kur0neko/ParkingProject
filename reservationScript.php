<?php

session_start();

	
	define('DBHostname', 'localhost');
	define('DBUsername', 'root');
	define('DBPassword', '');
	define('DBName', 'parkinggarage');


	try {//threw exception connection

		$databaseConnection = new PDO('mysql:host='.DBHostname.';dbname='.DBName, DBUsername, DBPassword);
		$databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} catch(PDOException $errorMsg) { //catch the error message
		echo 'ERROR: '. $errorMsg->getMessage();
	}
	if(isset($_POST["submit"])){
		
		
		$findSlot = $databaseConnection->prepare('INSERT INTO unavTab SELECT * FROM reservations WHERE (startTime BETWEEN :inTime AND :out) OR (endTime between :inTime AND :out) OR ((startTime < :inTime) AND (endTime > :inTime))');
		$findSlot->bindParam(':inTime',$_POST['startTime']);
		$findSlot->bindParam(':out',$_POST['endTime']); 
		$findSlot->execute();

		$avTab = $databaseConnection->prepare('SELECT SpotNumber FROM parkingspaces WHERE NOT EXISTS (SELECT SpotNum FROM unavTab

			WHERE parkingspaces.SpotNumber = unavTab.SpotNum)');
			
		$avTab->execute();
		$goodSpotArray = $avTab->fetch(PDO::FETCH_ASSOC);
		$goodSpot = $goodSpotArray['SpotNumber'];
		

		if($goodSpotArray == NULL){
			header('Location: reservationError.php');
			$clear = $databaseConnection->prepare('TRUNCATE TABLE unavTab');
			$clear->execute();
			exit;
		}
		else{
		$user = $_SESSION['username'];

		$wrTime = $databaseConnection->prepare("UPDATE accounts SET Reservation = :fromTime WHERE Username = :username");

		$wrTime->bindParam(':fromTime', $_POST["startTime"]);

		$wrTime->bindParam(':username', $user);
		$wrTime->execute();


		$wrTime = $databaseConnection->prepare('INSERT INTO reservations (startTime,endTime, SpotNumber, username)
			VALUES (:startTime, :endTime, :SpotNumber, :username)');
		$wrTime->bindParam(':startTime', $_POST['startTime']);
		$wrTime->bindParam(':endTime', $_POST['endTime']);
		$wrTime->bindParam(':SpotNumber', $goodSpot);
		$wrTime->bindParam(':username', $user);
]
		$wrTime->execute();
	
		$clear = $databaseConnection->prepare('TRUNCATE TABLE unavTab');
		$clear->execute();

		header("Location: Theaccount.php");
		}
	}
?>
