<style>
.thdata, .tddata{
border-color:#ccc;
}
.thdata{
background:#000000;
color:#fff;
}
.tddata{
color:#000;
text-align:center;
vertical-align:middle;
}

.trdata:nth-child(odd) {
	background: #ffffff;
}

.trdata:nth-child(even) {
	background: #DCDCDC;
}
</style>

<?php
if ($_POST['data']=="semua"){
	$result=mysql_query("select * from notes where order by id asc");

	$no=1;
?>
<h1><center>e-Logbook Report</center></h1>
<h3><center>Kegiatan Perbaikan dengan Suku Cadang - Divisi Teknik Otomasi MATSC</center></h3>
<hr />
<table border=1 style="border-color:#000000;">
	<tr>
		<th class="thdata" rowspan=2>No</th>
        <th class="thdata" rowspan=2>Tanggal Kegiatan</th>
		<th class="thdata" rowspan=2>Jenis Perbaikan</th>
		<th class="thdata" colspan=2>Rusak</th>
		<th class="thdata" colspan=2>Normal</th>
		<th class="thdata" rowspan=2>Jam OPS Terputus (Menit)</th>
		<th class="thdata" colspan=2>System Peralatan</th>
		<th class="thdata" colspan=3>Modul</th>
		<th class="thdata" rowspan=2>Uraian Masalah</th>
		<th class="thdata" rowspan=2>Tindakan Perbaikan</th>
		<th class="thdata" rowspan=2>Dampak Kerusakan</th>
		<th class="thdata" rowspan=2>Sumber Gangguan</th>
		<th class="thdata" rowspan=2>Teknisi</th>
		<th class="thdata" rowspan=2>Validasi</th>
	</tr>
	<tr>
		<th class="thdata">Tanggal</th>
		<th class="thdata">Jam</th>
		<th class="thdata">Tanggal</th>
		<th class="thdata">Jam</th>
        <th class="thdata">Peralatan</th>
		<th class="thdata">Sub</th>
		<th class="thdata">Rusak</th>
		<th class="thdata">N/S Rusak</th>
		<th class="thdata">N/S Pengganti</th>
	</tr>
	<?php
	while($row=mysql_fetch_array($result)){
	echo "<tr class='trdata'>";
	echo "<td class='tddata'>".$no++."</td>";
	echo "<td class='tddata'>$row[1]</td>";
	echo "<td class='tddata'>$row[2]</td>";
	echo "<td class='tddata'>$row[3]</td>";
	echo "<td class='tddata'>$row[4]</td>";
	echo "<td class='tddata'>$row[5]</td>";
	echo "<td class='tddata'>$row[6]</td>";
	echo "<td class='tddata'>$row[22]</td>";
	echo "<td class='tddata'>$row[8]</td>";
	echo "<td class='tddata'>$row[9]</td>";
	echo "<td class='tddata'>$row[10]</td>";
	echo "<td class='tddata'>$row[11]</td>";
	echo "<td class='tddata'>$row[12]</td>";
	echo "<td>".nl2br(htmlspecialchars($row[13]))."</td>";
	echo "<td>".nl2br(htmlspecialchars($row[14]))."</td>";
	echo "<td class='tddata'>$row[15]</td>";
	echo "<td class='tddata'>$row[21]</td>";
	echo "<td class='tddata'>$row[17]</td>";
	echo "<td class='tddata'>$row[18]</td>";
	echo "</tr>";
	}
	?>
</table>
<?php
}else{
	if (!isset($_POST['cek'])){
	echo "<table>Data Terpilih Tidak Ada</table>";
	}else{
	$cek=$_POST['cek'];
	$jumcek=count($cek);
?>
<h1><center>e-Logbook Report</center></h1>
<h3><center>Kegiatan Perbaikan dengan Suku Cadang - Divisi Teknik Otomasi MATSC</center></h3>
<hr />
<table border=1 style="border-color:#000000;">
<tr>
		<th class="thdata" rowspan=2>No</th>
        <th class="thdata" rowspan=2>Tanggal Kegiatan</th>
		<th class="thdata" rowspan=2>Jenis Perbaikan</th>
		<th class="thdata" colspan=2>Rusak</th>
		<th class="thdata" colspan=2>Normal</th>
		<th class="thdata" rowspan=2>Jam OPS Terputus (Menit)</th>
		<th class="thdata" colspan=2>System Peralatan</th>
		<th class="thdata" colspan=3>Modul</th>
		<th class="thdata" rowspan=2>Uraian Masalah</th>
		<th class="thdata" rowspan=2>Tindakan Perbaikan</th>
		<th class="thdata" rowspan=2>Dampak Kerusakan</th>
		<th class="thdata" rowspan=2>Sumber Gangguan</th>
		<th class="thdata" rowspan=2>Teknisi</th>
		<th class="thdata" rowspan=2>Validasi</th>
	</tr>
	<tr>
		<th class="thdata">Tanggal</th>
		<th class="thdata">Jam</th>
		<th class="thdata">Tanggal</th>
		<th class="thdata">Jam</th>
        <th class="thdata">Peralatan</th>
		<th class="thdata">Sub</th>
		<th class="thdata">Rusak</th>
		<th class="thdata">N/S Rusak</th>
		<th class="thdata">N/S Pengganti</th>
	</tr>
<?php
	for($i=0;$i<$jumcek;$i++){
	$result=mysql_query("select * from logbook_suku where id='$cek[$i]'");
	$row=mysql_fetch_array($result);
	echo "<tr class='trdata'>";
		echo "<td class='tddata'>".$no++."</td>";
        echo "<td class='tddata'>$row[1]</td>";
		echo "<td class='tddata'>$row[2]</td>";
		echo "<td class='tddata'>$row[3]</td>";
		echo "<td class='tddata'>$row[4]</td>";
		echo "<td class='tddata'>$row[5]</td>";
		echo "<td class='tddata'>$row[6]</td>";
		echo "<td class='tddata'>$row[22]</td>";
		echo "<td class='tddata'>$row[8]</td>";
		echo "<td class='tddata'>$row[9]</td>";
		echo "<td class='tddata'>$row[10]</td>";
		echo "<td class='tddata'>$row[11]</td>";
		echo "<td class='tddata'>$row[12]</td>";
		echo "<td>".nl2br(htmlspecialchars($row[13]))."</td>";
        echo "<td>".nl2br(htmlspecialchars($row[14]))."</td>";
		echo "<td class='tddata'>$row[15]</td>";
		echo "<td class='tddata'>$row[21]</td>";
		echo "<td class='tddata'>$row[17]</td>";
		echo "<td class='tddata'>$row[18]</td>";
	echo "</tr>";
	}
?>
</table>
<?php
	}
}
?>