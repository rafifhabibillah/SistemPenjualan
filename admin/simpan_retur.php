<?php
include ('includekoneksi.php');

$id_retur=$_POST['id_retur'];
$tgl_retur=$_POST['tgl_retur'];
$id_penjualan=$_POST['id_penjualan'];
$id_pelanggan=$_POST['id_pelanggan'];
$id_barang=$_POST['id_barang'];
$harga_barang = $_POST['harga_barang'];
$jumlah_retur = $_POST['jumlah_retur'];
$total_retur = $_POST['total_retur'];

$jml= mysqli_query($koneksi,"select * from penjualan 
	where id_penjualan='$id_penjualan' 
	AND id_barang='$id_barang'");

 $show = mysqli_fetch_array($jml);
 $jumlah_penjualan= $show['jumlah_barang'];
 if ($jumlah_penjualan < $jumlah_retur){
echo"
 	<script>
  alert('Peringatan!jumlah inputan anda melebihi masukkan');
</script>";
 } 
else if ($jumlah_penjualan > $jumlah_retur ){

	$sqll="insert into retur_penjualan values('$id_retur','$tgl_retur','$id_penjualan','$id_pelanggan','$id_barang','$harga_barang','$jumlah_retur','$total_retur')";
	$tampil =mysqli_query($koneksi, $sqll);
	$updatepenjualankurang="update penjualan 
		set jumlah_barang = jumlah_barang - '$jumlah_retur'
		where id_penjualan='$id_penjualan'
 		AND id_barang='$id_barang'";
	mysqli_query($koneksi,$updatepenjualankurang);
	$updatebarangkurang="update barang 
		set stok = stok + '$jumlah_retur'
		where id_barang='$id_barang'
 		";
	mysqli_query($koneksi,$updatebarangkurang);
	
	$jual=mysqli_query($koneksi,"select id_jual from tabel_penjualan");
	$id_jual=mysqli_fetch_array($jual);
	
	
	if(empty($id_jual)){
	$delet="delete from penjualan where id_penjualan='$id_penjualan' and id_jual='$id_jual'";
	$del=mysqli_query($koneksi,$delet);
}
}
 else if ($jumlah_retur = $jumlah_penjualan){

 	$sql= "insert into retur_penjualan values ('$id_retur', 
 	'$tgl_retur',
 	'$id_penjualan',
 	'$id_pelanggan',
 	'$id_barang',
 	'$harga_barang',
 	'$jumlah_retur',
 	'$total_retur')";

 	$hasil=mysqli_query($koneksi,$sql);
	$updatebarangsama="update barang set stok = stok + '$jumlah_retur'
 		where id_barang='$id_barang'";
 	mysqli_query($koneksi,$updatebarangsama);
	if(empty($id_jual)){
	$updatepenjualansama="delete from penjualan 
 		where id_penjualan='$id_penjualan'
 		AND id_barang='$id_barang'";
 	mysqli_query($koneksi,$updatepenjualansama);

	}
	}
 	?>
<script>location.replace("?rafif=admin/retur.php");</script>