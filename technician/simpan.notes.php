<?php
set_time_limit(0);
include "db_notes.php";
koneksi_buka();
if (isset($_POST['submit'])){
	$id=$_POST['id'];
	$nama_radar=$_POST['nama_radar'];
	$tgl_r=$_POST['tgl_r'];
    $jam_r=$_POST['jam_r'];
    $tgl_n=$_POST['tgl_n'];
    $jam_n=$_POST['jam_n'];
    $durasi=$_POST['durasi'];
    $cat=$_POST['cat'];
    $status=$_POST['status'];
    $teknisi=$_POST['teknisi'];  
    $penyebab=$_POST['penyebab'];  
    $tanggal=$_POST['tanggal']; 
    $bul=$_POST['bul']; 
    $tahun=$_POST['tahun']; 
	

	mysql_query("insert into notes values('$id','$nama_radar','$tgl_r','$jam_r','$tgl_n','$jam_n','$durasi','$cat','$status','$teknisi','$penyebab','$tanggal','$bul','$tahun')");
	echo "<script>alert('Data berhasil ditambah.');window.location='notes_radar.php';</script>";
}else{
	header("location:../index.php?page=404");
}
koneksi_tutup();
?>