<?php
include ('includekoneksi.php');
$id_pembelian  = $_POST['id_pembelian'];
$tgl_pembelian = $_POST['tgl_pembelian'];
$id_supplier = $_POST['id_supplier'];
$id_barang = $_POST['id_barang'];
$harga_beli = $_POST['harga_beli'];
$jumlah_beli = $_POST['jumlah_beli'];
$total = $_POST['total'];
$queri="update pembelian set id_pembelian='$id_pembelian',tgl_pembelian='$tgl_pembelian',id_supplier='$id_supplier',id_barang='$id_barang',harga_beli='$harga_beli',jumlah_beli='$jumlah_beli',total='$total' where id_pembelian='$id_pembelian'";
$hasil= mysqli_query($koneksi,$queri);
?>
<script>location.replace("?rafif=admin/pembelian.php");</script>