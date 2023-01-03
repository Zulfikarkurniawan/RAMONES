<?php
header("Content-type: application/json");
include 'db.php';
$res = $conn->query("SELECT * FROM data_radar WHERE 1")->fetch_all(MYSQLI_ASSOC);
echo json_encode($res, true);
?>