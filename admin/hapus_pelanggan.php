<?php
include ('includekoneksi.php');
$id_pelanggan=$_GET['id_pelanggan'];
$sql= "delete from pelanggan where id_pelanggan='$id_pelanggan'";
mysqli_query($koneksi,$sql);
header('location:?rafif=admin/pelanggan.php');
?>