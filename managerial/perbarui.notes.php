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
	
	$update=mysql_query("update notes set nama_radar='$nama_radar',tgl_r='$tgl_r',jam_r='$jam_r',tgl_n='$tgl_n',jam_n='$jam_n',durasi='$durasi',cat='$cat',status='$status',teknisi='$teknisi',penyebab='$penyebab',tanggal='$tanggal',bul='$bul',tahun='$tahun' where id='$id'");
	echo "<script>alert('Data berhasil diupdate.');window.location='notes_radar.php';</script>";
}else{
	header("location:index.php?page=404");
}
koneksi_tutup();
?>