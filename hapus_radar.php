<?php
$id = $_POST['id'];
include 'db.php';
$conn->query("DELETE FROM `data` WHERE `id`='$id'");
header("Location: radar_kosek/admin.php");
?>