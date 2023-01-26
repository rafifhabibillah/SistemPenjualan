<?php
include ('includekoneksi.php');
$id_barang  = $_POST['id_barang'];
$id_kategori = $_POST['id_kategori'];
$nama_barang = $_POST['nama_barang'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];
$stok = $_POST['stok'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

//Rename nama foto dengan menambahkan tanggal dan jam upload
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
?>
<script>location.replace("?rafif=admin/tampil.php");</script>