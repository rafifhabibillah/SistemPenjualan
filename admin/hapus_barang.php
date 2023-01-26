<?php
include ('includekoneksi.php');
$id_barang=$_GET['id_barang'];
$sql= "delete from barang  where id_barang='$id_barang'";
mysqli_query($koneksi,$sql);
// header('location:?rafif=tampil.php');
?>
<script>location.replace("?rafif=admin/tampil.php");</script>