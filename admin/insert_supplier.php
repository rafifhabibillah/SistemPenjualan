<?php
include ('includekoneksi.php');
$id_supplier  = $_POST['id_supplier'];
$nama_supplier = $_POST['nama_supplier'];
$telp = $_POST['telp'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$sql="insert into supplier values('$id_supplier','$nama_supplier','$telp','$email','$alamat')";
mysqli_query($koneksi,$sql);
//header('location:?rafif=admin/suppllier.php');
?>
<script>location.replace("?rafif=admin/supplier.php");</script>