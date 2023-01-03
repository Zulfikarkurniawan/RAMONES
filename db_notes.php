<?php
define('DB_NAMAq', 'status'); // sesuaikan dengan nama database anda
define('DB_USERq', 'root'); // sesuaikan dengan nama pengguna database anda
define('DB_PASSWORDq', ''); // sesuaikan dengan kata sandi database anda
define('DB_HOSTq', 'localhost'); // ganti jika letak database mysql di komputer lain

// fungsi untuk melakukan koneksi ke database mysql
function koneksi_bukaq() {
	mysql_select_db(DB_NAMAq,mysql_connect(DB_HOSTq,DB_USERq,DB_PASSWORDq));
}

// fungsi untuk menutup koneksi ke database mysql
function koneksi_tutupq() {
	mysql_close(mysql_connect(DB_HOSTq,DB_USERq,DB_PASSWORDq));
}
?>
