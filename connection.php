<?php
$serverName = "localhost";  // server's name
$dbUserName = "root";      // database's user name
$dbPassword = "";    // database's password
$dbName = "lovelifeapp";   // database's name

// open a new connection to the MySQL server, return an object representing the connection to the database
// if opened successfully, otherwise return false. Store the result in variable $conn
$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

//check the connection to the database
//if connection failed, display error
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{}
?>

