<?php
$servername = "weightgains1.mysql.database.azure.com";
//$username = (isset($_SESSION["SQLUSER"]) ? $_SESSION["SQLUSER"] : $_ENV['SQLUSER']);
//$password = (isset($_SESSION["SQLPW"]) ? $_SESSION["SQLPW"] : $_ENV['SQLPW']);
$username = "BDS_Software@weightgains1";
$password = '$Steel$isstrong32$';
$dbname = "getgains";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
?>