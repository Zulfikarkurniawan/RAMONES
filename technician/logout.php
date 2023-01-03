<?php 
// mengaktifkan session php
session_start();

// menghapus semua session
session_destroy();

// mengalihkan halaman ke halaman login
echo "<script>alert('Anda Telah Logout - Terima Kasih');window.location='http://localhost/radar_kosek/index.php';</script>";
?>