<?php
include ('includekoneksi.php');
$id_supplier  	= $_POST['id_supplier'];
$nama_supplier 	= $_POST['nama_supplier'];
$telp	 		= $_POST['telp'];
$email 			= $_POST['email'];
$alamat 		= $_POST['alamat'];
$sql="update supplier set id_supplier='$id_supplier',nama_supplier='$nama_supplier',telp='$telp',email='$email',alamat='$alamat' where id_supplier='$id_supplier'" ;
mysqli_query($koneksi,$sql);
?>
<script>location.replace("?rafif=admin/supplier.php");</script>