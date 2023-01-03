<?php
include 'db.php';
$name = $_POST['name'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];
$status = $_POST['status'];
$kode = $_POST['kode'];

$conn->query("INSERT INTO `data`(`name`,`lat`,`lng`,`status`,`kode`) VALUES ('$name','$lat','$lng','$status','$kode')");
header("Location: admin.php");
?>