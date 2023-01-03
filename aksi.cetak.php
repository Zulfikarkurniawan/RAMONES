<?php
set_time_limit(0);
if (isset($_POST['submit'])){
include "db_notes.php";
koneksi_buka();
$submit=$_POST['submit'];
$date=date("d-m-Y");
	if ($_POST['submit']=="export"){
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; report.xls");
	include "excel.report.php";
	}else{
		$cek=$_POST['cek'];
		$jumcek=count($cek);
		for($i=0;$i<$jumcek;$i++){
			mysql_query("delete from notes where id='$cek[$i]'");
		}
		echo "<script>alert('Data berhasil dihapus.');window.location='report.php';</script>";
	}
koneksi_tutup();
}else{
header("location:../index.php?page=404");
}
?>