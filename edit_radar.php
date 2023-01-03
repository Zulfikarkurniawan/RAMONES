<?php
include 'db.php';
$id = $_POST['id'];
$device = $_POST['device'];
$Name = $_POST['Name'];
$lokasi = $_POST['lokasi'];
$tanggal = $_POST['tanggal'];
$time = $_POST['time'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];
$status = $_POST['status'];
$kode = $_POST['kode'];

$conn->query("UPDATE data_radar SET device='$device', Name='$Name', lokasi='$lokasi', tanggal='$tanggal', time='$time', lat='$lat', lng='$lng', status='$status', 'kode'='$kode', WHERE id='$id'");

        header("Location: show_radar.php");
        
    
?>