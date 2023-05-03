<?php
$servername = "localhost";
$usernam = "root";
$passwor = "";
$dbname = "mydb";

// Create connection
$conn = new mysqli($servername, $usernam, $passwor, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
