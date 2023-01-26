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

	<table   class="table table-bordered table-hover table-stripped">
<tr class="tableheader">
	<th>NO</th>
	<th>ID PENJUALAN</th>
	<th>TANGGAL PENJUALAN</th>
	<th>NAMA PELANGGAN</th>
	<th>NAMA BARANG</th>
	<th>HARGA BARANG</th>
	<th>JUMLAH BARANG</th>
	<th>TOTAL HARGA</th>
	</tr>
<?php
$no=1;
 //perintah untuk menampilkan data
$queri="select penjualan.id_penjualan,penjualan.tgl_penjualan,pelanggan.nama_pelanggan,barang.nama_barang,penjualan.harga_barang,
	penjualan.jumlah_barang,penjualan.total_harga from penjualan
	inner join barang on penjualan.id_barang=barang.id_barang
	inner join pelanggan on penjualan.id_pelanggan=pelanggan.id_pelanggan";
$hasil = mysqli_query($koneksi,$queri); // fungsi utk sql
?>
 
  <?php while ($data=mysqli_fetch_array($hasil)){ ?>
	
		<tr>
	<th><?php echo $no++;?></th>
	<th><?php echo $data['id_penjualan'];?></th>
	<th><?php echo $data['tgl_penjualan'];?></th>
	<th><?php echo $data['nama_pelanggan'];?></th>
	<th><?php echo $data['nama_barang'];?></th>
	<th><?php echo $data['harga_barang'];?></th>
	<th><?php echo $data['jumlah_barang'];?></th>
	<th><?php echo $data['total_harga'];?></th>
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