<?php
include ('includekoneksi.php');
$id_penjualan=$_GET['id_penjualan'];
$sql= "delete from penjualan where id_penjualan='$id_penjualan'";
mysqli_query($koneksi,$sql);
?>
<script>location.replace("?rafif=admin/penjualan.php");</script>