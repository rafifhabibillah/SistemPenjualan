<?php
	include 'includekoneksi.php';
	$data = mysql_query("select * from pelanggan");
?>
<html>
<head>
	<title>Print Document</title>
    <link href="style_print.css" type="text/css" rel="stylesheet" />
</head>
<body>

	<table   border="1" width="90%" style="border-collapse:collapse;" align="center">
<tr class="tableheader">
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
$no=1;
 //perintah untuk menampilkan data
$queri= "select * from pelanggan"; //menampilkan semua data dari tabel barang yang ada pada databse inventaris
$hasil = mysqli_query($koneksi,$queri); // fungsi utk sql
?>
 
  <?php while ($data= mysqli_fetch_array ($hasil)){ ?>

		<tr id="rowHover">
			<td width="10%" align="center"><?php echo $no++;?> </td>
			<td width="10%" id="column_padding"><?php echo $data['id_pelanggan'];?> </td>
			<td width="25%" id="column_padding"><?php echo $data['nama_pelanggan'];?> </td>
			<td width="25%" id="column_padding"><?php echo $data['jenis_kelamin'];?></td>
			<td width="15%" id="column_padding"><?php echo $data['agama'];?></td>
			<td width="25%" id="column_padding"><?php echo $data['tgl_lahir'];?></td>
			<td width="25%" id="column_padding"><?php echo $data['telepon'];?></td>
			<td width="25%" id="column_padding"><?php echo $data['email'];?></td>
			<td width="25%" id="column_padding"><?php echo $data['alamat'];?></td>
			
		</tr> 
		
		
<?php
}
?>
</table>
    <script>
		window.load = print_d();
		function print_d(){
			window.print();
		}
	</script>
</body>
</html>