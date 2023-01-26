<?php
include ('includekoneksi.php');
$id_pembelian=$_GET['id'];
$tampil="select * from pembelian where id_pembelian='$id_pembelian'";
$hasil=mysqli_query($koneksi,$tampil);
$data=mysqli_fetch_array($hasil);

$tgl_pembelian=$data['tgl_pembelian'];
$id_supplier=$data['id_supplier'];

$sql="insert into tabel_pembelian values('$id_pembelian','$id_pembelian','$tgl_pembelian','$id_supplier')";
$hasil=mysqli_query($koneksi,$sql);

?>
<script>location.replace("?rafif=admin/tabel_pembelian.php&id=<?php echo $id_pembelian;?>");</script>