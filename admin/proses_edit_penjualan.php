<?php
include ('includekoneksi.php');
$id_penjualan  = $_POST['id_penjualan'];
$tgl_penjualan = $_POST['tgl_penjualan'];
$id_pelanggan = $_POST['id_pelanggan'];
$id_barang = $_POST['id_barang'];
$harga_barang = $_POST['harga_barang'];
$jumlah_barang = $_POST['jumlah_barang'];
$total_harga = $_POST['total_harga'];
$queri="update penjualan set id_penjualan='$id_penjualan',tgl_penjualan='$tgl_penjualan',id_pelanggan='$id_pelanggan',id_barang='$id_barang',harga_barang='$harga_barang',jumlah_barang='$jumlah_barang',total_harga='$total_harga' where id_penjualan='$id_penjualan'";
$hasil= mysqli_query($koneksi,$queri);
?>
<script>location.replace("?rafif=admin/penjualan.php");</script>