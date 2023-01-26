<?php
include ('includekoneksi.php');
$id_kategori  = $_POST['id_kategori'];
$kategori = $_POST['kategori'];
$queri="insert into kategori values('".$id_kategori."','".$kategori."')";
$hasil=mysqli_query($koneksi,$queri);
?>

<script>location.replace("?rafif=admin/kategori.php");</script>