<?php
include ('includekoneksi.php');
$id_barang  = $_POST['id_barang'];
$id_kategori= $_POST['id_kategori'];
$nama_barang= $_POST['nama_barang'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];
$stok 		= $_POST['stok'];
$ubah       = $_POST['ubah_foto'];

if($ubah==1){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
  // Ambil data foto yang dipilih dari form
  $foto = $_FILES['foto']['name'];
  $tmp = $_FILES['foto']['tmp_name'];
  
  // Rename nama fotonya dengan menambahkan tanggal dan jam upload
  $fotobaru = date('dmYHis').$foto;
  
  // Set path folder tempat menyimpan fotonya
  $path = "images/".$fotobaru;
  // Proses upload
  if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
  
    $queri = "select * from barang WHERE id_barang='".$id_barang."'";
    $sql = mysqli_query($koneksi, $queri); // Eksekusi/Jalankan query dari variabel $query
    $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
    // Cek apakah file foto sebelumnya ada di folder images
    if(is_file("images/".$data['foto'])) // Jika foto ada
      unlink("images/".$data['foto']); // Hapus file foto sebelumnya yang ada di folder images
    
    // Proses ubah data ke Database
    $queri = "update barang set id_kategori='".$id_kategori."', nama_barang='".$nama_barang."', harga_beli='".$harga_beli."', harga_jual='".$harga_jual."', stok='".$stok."', foto='".$fotobaru."' WHERE id_barang='".$id_barang."'";
    $sql = mysqli_query($koneksi, $queri); // Eksekusi/ Jalankan query dari variabel $query
    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
      // Jika Sukses, Lakukan :
      header("location: ?rafif=admin/tampil.php"); // Redirect ke halaman index.php
    }else{
      // Jika Gagal, Lakukan :
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      echo "<br><a href='?rafif=admin/edit_barang.php'>Kembali Ke Form</a>";
    }
  }else{
    // Jika gambar gagal diupload, Lakukan :
    echo "Maaf, Gambar gagal untuk diupload.";
    echo "<br><a href='?rafif=admin/edit_barang.php'>Kembali Ke Form</a>";
  }
}else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
  // Proses ubah data ke Database
  $queri = "update barang set id_kategori='".$id_kategori."', nama_barang='".$nama_barang."', harga_beli='".$harga_beli."', harga_jual='".$harga_jual."', stok='".$stok."' WHERE id_barang='".$id_barang."'";
  $sql = mysqli_query($koneksi, $queri); // Eksekusi/ Jalankan query dari variabel $query
  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: ?rafif=admin/tampil.php"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='?rafif=admin/edit_barang.php'>Kembali Ke Form</a>";
  }
}
?>
<script> location.replace("?rafif=admin/tampil.php"); </script>