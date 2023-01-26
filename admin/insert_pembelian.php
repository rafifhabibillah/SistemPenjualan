<?php
include ('includekoneksi.php');
$id_pembelian=$_POST['id_pembelian'];
$tgl_pembelian=$_POST['tgl_pembelian'];
$id_supplier=$_POST['id_supplier'];
$id_barang=$_POST['id_barang'];
$harga_beli = $_POST['harga_beli'];
$jumlah_beli = $_POST['jumlah_beli'];
$total = $_POST['total'];

$queri="select * from barang where id_barang='$id_barang'";
$lebih1=mysqli_query($koneksi,$queri);
$lebih=mysqli_fetch_array($lebih1);
$stok=$lebih['stok'];

$queri="insert into pembelian values('$id_pembelian','$tgl_pembelian','$id_supplier','$id_barang','$harga_beli','$jumlah_beli','$total')";
mysqli_query($koneksi,$queri);

$queri1="update barang set stok =stok + '$jumlah_beli' where id_barang='$id_barang'";
mysqli_query($koneksi,$queri1);

	//header('location:keranjang-pembelian.php?id_pembelian=id_pembelian');
?>
<script>location.replace("?rafif=admin/keranjang-beli.php&id=<?php echo $id_pembelian;?>");</script>