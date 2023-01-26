<?php
include('includekoneksi.php');
if(isset($_POST['cari'])){
	$cari=$_POST['cari'];
	echo"<br> HASIL PENCARIAN : ".$cari."</br>";
}
	?>
<html>
<head>
<title>Hasil Pencarian</title>
</head>
<body>
	<p align="center"><b> TABLE PENCARIAN </b></p>
	<table border="1">
	<tr>
	<th>NO</th>
	<th>ID PELANGGAN</th>
	<th>NAMA PELANGGAN</th>
	<th>JENIS KELAMIN</th>
	<th>AGAMA</th>
	<th>TANGGAL LAHIR</th>
	<th>TELEPON</th>
	<th>EMAIL</th>
	<th>ALAMAT</th>
	</tr>
	
	<?php
	if(isset($_POST['cari'])){
		$cari=$_POST['cari'];
		$data=mysqli_query($koneksi,"select * from pelanggan where id_pelanggan like'%".$cari."%'
		or nama_pelanggan 	like '%".$cari."%'
		or jenis_kelamin 	like '%".$cari."%'
		or agama 			like '%".$cari."%'
		or tgl_lahir 		like '%".$cari."%'
		or telepon 			like '%".$cari."%'
		or email 			like '%".$cari."%'
		or alamat 			like '%".$cari."%'
		");
	}else{
		$data=mysqli_query($koneksi,"select * from pelanggan");
	}
	$no=1;
	
	while ($tampil=mysqli_fetch_array($data)){ ?>
	<tr>
	<th><?php echo $no++;?></th>
	<th><?php echo $tampil['id_pelanggan'];?></th>
	<th><?php echo $tampil['nama_pelanggan'];?></th>
	<th><?php echo $tampil['jenis_kelamin'];?></th>
	<th><?php echo $tampil['agama'];?></th>
	<th><?php echo $tampil['tgl_lahir'];?></th>
	<th><?php echo $tampil['telepon'];?></th>
	<th><?php echo $tampil['email'];?></th>
	<th><?php echo $tampil['alamat'];?></th>
	</tr>
	<?php
	}
	?>
	</table>
	<p align="center"><a href="?rafif=admin/pelanggan.php"><button type="button" name="kembali">kembali</button></a></p>
	</body>
</html>