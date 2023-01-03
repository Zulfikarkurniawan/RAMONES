<?php
set_time_limit(0);
include "koneksi.php";
koneksi_buka();
if (isset($_POST['submit'])){
	$id=$_POST['id'];
    $username=$_POST['username'];
	$password=$_POST['password'];
    $level=$_POST['level'];
	
	$update=mysql_query("update user set username='$username',password='$password',level='$level' where id='$id'");
	echo "<script>alert('Data berhasil diupdate.');window.location='add_user.php';</script>";
}else{
	header("location:index.php?page=404");
}
koneksi_tutup();
?>