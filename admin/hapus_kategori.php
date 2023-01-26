<?php
include ('includekoneksi.php');
$id_kategori=$_GET['id_kategori'];
$sql= "delete from kategori where id_kategori='$id_kategori'";
mysqli_query($koneksi,$sql);
header('location:?rafif=admin/kategori.php');
?>