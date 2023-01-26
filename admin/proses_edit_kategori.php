<?php
include ('includekoneksi.php');
$id_kategori  = $_POST['id_kategori'];
$kategori = $_POST['kategori'];

$queri="update kategori set id_kategori='$id_kategori',kategori='$kategori' where id_kategori='$id_kategori'";
$hasil= mysqli_query($koneksi,$queri);
?>
<script>location.replace("?rafif=admin/kategori.php");</script>