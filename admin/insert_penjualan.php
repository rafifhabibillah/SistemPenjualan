<?php
include ('includekoneksi.php');
$id_penjualan=$_POST['id_penjualan'];
$tgl_penjualan=$_POST['tgl_penjualan'];
$id_pelanggan=$_POST['id_pelanggan'];
$id_barang=$_POST['id_barang'];
$harga_barang = $_POST['harga_barang'];
$jumlah_barang = $_POST['jumlah_barang'];
$total_harga = $_POST['total_harga'];

$queri="select * from barang where id_barang='$id_barang'";
$lebih1=mysqli_query($koneksi,$queri);
$lebih=mysqli_fetch_array($lebih1);
$stok=$lebih['stok'];

if($stok < $jumlah_barang)
{
	echo"<script>
	alert('Maaf Stok Barang Kurang dari Yang Dibeli , Mohon Cek Stok Barang yang Tersedia and try again')
</script>";
header('location:penjualan.php');
	}else{

$queri="insert into penjualan values('$id_penjualan','$tgl_penjualan','$id_pelanggan','$id_barang','$harga_barang','$jumlah_barang','$total_harga')";
mysqli_query($koneksi,$queri);

$queri="update barang set stok =stok - '$jumlah_barang' where id_barang='$id_barang'";
mysqli_query($koneksi,$queri);

	}
	//header('location:keranjang-belanja.php?id_penjualan=id_penjualan');
?>
<script>location.replace("?rafif=admin/keranjang-belanja.php&id=<?php echo $id_penjualan;?>");</script>