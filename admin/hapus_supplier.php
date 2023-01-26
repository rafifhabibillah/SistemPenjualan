<?php
include ('includekoneksi.php');
$id_supplier=$_GET['id_supplier'];
$sql= "delete from supplier where id_supplier='$id_supplier'";
mysqli_query($koneksi,$sql);
//header('location:?rafif=admin/supplier.php');
?>
<script>location.replace("?rafif=admin/supplier.php");</script>