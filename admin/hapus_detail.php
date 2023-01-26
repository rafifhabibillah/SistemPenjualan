<?php
include ('includekoneksi.php');
$id_pembelian=$_GET['id_pembelian'];
$sql= "delete from tabel_pembelian where id_pembelian='$id_pembelian'";
mysqli_query($koneksi,$sql);
//header('location:?rafif=admin/pembelian.php');
?>
<script>location.replace("?rafif=admin/tabel_pembelian.php");</script>