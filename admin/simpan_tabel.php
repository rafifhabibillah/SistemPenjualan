<?php
include ('includekoneksi.php');
$id_penjualan=$_GET['id'];
$tampil="select * from penjualan where id_penjualan='$id_penjualan'";
$hasil=mysqli_query($koneksi,$tampil);
$data=mysqli_fetch_array($hasil);

$tgl_penjualan=$data['tgl_penjualan'];
$id_pelanggan=$data['id_pelanggan'];

$sql="insert into tabel_penjualan values('$id_penjualan','$id_penjualan','$tgl_penjualan','$id_pelanggan')";
$hasil=mysqli_query($koneksi,$sql);

	//header('location:keranjang-belanja.php?id_penjualan=id_penjualan');
?>
<script>location.replace("?rafif=admin/tabel_penjualan.php&id=<?php echo $id_penjualan;?>");</script>