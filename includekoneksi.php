<?php
$db_host		= 'localhost'; 
$db_usn		= 'root'; //nama username
$db_pwd		= ''; //password jika tadak ada bisa di kosongi seperti contoh 
$db_name	= 'pkl'; //nama database

$koneksi	= mysqli_connect($db_host,$db_usn,$db_pwd);
mysqli_select_db($koneksi,$db_name);
?>