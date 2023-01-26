<?php
include ('includekoneksi.php');
$id_pelanggan  = $_POST['id_pelanggan'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$agama = $_POST['agama'];
$tgl_lahir = $_POST['tgl_lahir'];
$telepon = $_POST['telepon'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$sql="insert into pelanggan values('$id_pelanggan','$nama_pelanggan','$jenis_kelamin','$agama','$tgl_lahir','$telepon','$email','$alamat')";
mysqli_query($koneksi,$sql);
?>
<script>location.replace("?rafif=admin/pelanggan.php");</script>