<?php
include('config.php');

function getNextUserID() {
    global $conn;

    $sql = "SELECT MAX(id) as maxID FROM accounts";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $maxID = $row["maxID"];

        // Increment the maximum userID by 1
        $nextUserID = $maxID + 1;

        return $nextUserID;
    } else {
        // If there are no records in the table, start from 1
        return 1;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $licensePlate = $_POST["LicensePlate"];

    // Hash the password before storing it in the database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $ID=getNextUserID();
    $date = date('Y-m-d H:i:s');
    $Edate= NULL;
    $payMent=0;
    $boolAdmin=0;

    $sql = "INSERT INTO accounts (isAdmin , id ,  Username ,  Password ,  Balance ,  Reservation ,  LicensePlate , startTime ,  endTime ,  paymentneeded ) VALUES ('$boolAdmin','$ID','$username', '$hashedPassword','0',NULL,'$licensePlate','$date',' $Edate','$payMent')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to login page on successful signup
        header("Location: Login.php");
        exit();
    } else {
        $error_message = "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
