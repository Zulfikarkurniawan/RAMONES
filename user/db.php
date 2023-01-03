<?php
$serverdb = "localhost";
$userdb = "root";
$passdb = "";
$dbname = "status";
$conn = new mysqli($serverdb, $userdb, $passdb, $dbname);
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);} 
?>