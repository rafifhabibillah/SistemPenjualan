<?php
	include 'includekoneksi.php';
	$data = mysql_query("select * from retur_penjualan");
?>
<html>
<head>
	<title>Print Document</title>
    <link href="style_print.css" type="text/css" rel="stylesheet" />
</head>
<body>
<p align="center"><font face="time new roman" size="9"> RETUR  PENJUALAN </font>
<br>
<hr size="3" color="red">
<p>
	<table   class="table table-bordered table-hover table-stripped">
<tr class="tableheader">
	<th>NO</th>
	<th>ID RETUR</th>
	<th>TANGGAL RETUR</th>
	<th>ID PENJUALAN</th>
	<th>ID PELANGGAN</th>
	<th>ID BARANG</th>
	<th>HARGA BARANG</th>
	<th>JUMLAH RETUR</th>
	<th>TOTAL RETUR</th>
	</tr>
<?php
$no=1;
 //perintah untuk menampilkan data
$queri="select * from retur_penjualan";
$hasil = mysqli_query($koneksi,$queri); // fungsi utk sql
?>
 
  <?php while ($data=mysqli_fetch_array($hasil)){ ?>
	
		<tr>
	<th><?php echo $no++;?></th>
	<th><?php echo $data['id_retur'];?></th>
	<th><?php echo $data['tgl_retur'];?></th>
	<th><?php echo $data['id_penjualan'];?></th>
	<th><?php echo $data['id_pelanggan'];?></th>
	<th><?php echo $data['id_barang'];?></th>
	<th><?php echo $data['harga_barang'];?></th>
	<th><?php echo $data['jumlah_retur'];?></th>
	<th><?php echo $data['total_retur'];?></th>
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