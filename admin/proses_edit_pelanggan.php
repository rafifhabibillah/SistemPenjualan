<?php
include ('includekoneksi.php');
$id_pelanggan  	= $_POST['id_pelanggan'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$jenis_kelamin 	= $_POST['jenis_kelamin'];
$agama 			= $_POST['agama'];
$tgl_lahir 		= $_POST['tgl_lahir'];
$telepon 		= $_POST['telepon'];
$email 			= $_POST['email'];
$alamat 		= $_POST['alamat'];
$sql="update pelanggan set id_pelanggan='$id_pelanggan',nama_pelanggan='$nama_pelanggan',jenis_kelamin='$jenis_kelamin',agama='$agama',tgl_lahir='$tgl_lahir',telepon='$telepon',email='$email',alamat='$alamat' where id_pelanggan='$id_pelanggan'" ;
mysqli_query($koneksi,$sql);
?>
<script>location.replace("?rafif=admin/pelanggan.php");</script>