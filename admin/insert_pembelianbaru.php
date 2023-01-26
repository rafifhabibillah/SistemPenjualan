<?php
include ('includekoneksi.php');
$id_pembelian=$_POST['id_pembelian'];
$tgl_pembelian=$_POST['tgl_pembelian'];
$id_supplier=$_POST['id_supplier'];
$nama_barang=$_POST['nama_barang'];
$id_barang	=$_POST['id_barang'];
$id_kategori= $_POST['id_kategori'];
$harga_beli = $_POST['harga_beli'];
$untung = $harga_beli*10/100;
$harga_jual = $harga_beli+$untung;
$stok 		= $_POST['stok'];
$foto 		= $_FILES['foto']['name'];
$tmp 		= $_FILES['foto']['tmp_name'];
$total 		= $_POST['total'];

$queri="select * from barang";
$lebih1=mysqli_query($koneksi,$queri);
$lebih=mysqli_fetch_array($lebih1);

$queri="insert into pembelian values('$id_pembelian','$tgl_pembelian','$id_supplier','$id_barang','$harga_beli','$stok','$total')";
mysqli_query($koneksi,$queri);

$fotobaru = date('dmYHis').$foto;

//Set Path folder tempat menyimpan fotonya
$path = "images/".$fotobaru;
// Proses upload
if(move_uploaded_file($tmp, $path)){ 
// Cek apakah gambar berhasil diupload atau tidak
//proses penyimpanan ke database
$sql="insert into barang values('$id_barang','$id_kategori','$nama_barang','$harga_beli','$harga_jual','$stok','$fotobaru')";
$hasil=mysqli_query($koneksi,$sql);
// Eksekusi / menjalankan sql dari variabel $sql
if($hasil){
//header('location:?rafif=tampil.php');
}else{
	echo " Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
}
}else{
	// jika gambar gagal di upload maka akan tampil :
echo "Maaf,Gambar gagal untuk di upload.";
	}
	//header('location:keranjang-pembelian.php?id_pembelian=id_pembelian');
?>
<script>location.replace("?rafif=admin/keranjang-beli2.php&id=<?php echo $id_pembelian;?>");</script>