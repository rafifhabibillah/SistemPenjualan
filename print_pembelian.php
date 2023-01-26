<?php
	include 'includekoneksi.php';
	$data = mysql_query("select * from supplier");
?>
<html>
<head>
	<title>Print Document</title>
    <link href="style_print.css" type="text/css" rel="stylesheet" />
</head>
<body>
<p>
<br><font face="times new roman" size="8"><b><center> CATATAN PEMBELIAN </center></b></font>
<br>
<br>
<br>
	<table   class="table table-bordered table-hover table-stripped">
<tr class="tableheader">
	<th>NO</th>
	<th>ID PEMBELIAN</th>
	<th>TANGGAL PEMBELIAN</th>
	<th>NAMA SUPPLIER</th>
	<th>NAMA BARANG</th>
	<th>HARGA BELI</th>
	<th>JUMLAH BELI</th>
	<th>TOTAL</th>
	</tr>
<?php
$no=1;
 //perintah untuk menampilkan data
$queri="select pembelian.id_pembelian,pembelian.tgl_pembelian,supplier.nama_supplier,barang.nama_barang,barang.harga_beli,
	pembelian.jumlah_beli,pembelian.total from pembelian
	inner join barang on pembelian.id_barang=barang.id_barang
	inner join supplier on pembelian.id_supplier=supplier.id_supplier";
$hasil = mysqli_query($koneksi,$queri); // fungsi utk sql
?>
 
  <?php while ($data=mysqli_fetch_array($hasil)){ ?>
	
		<tr>
	<th><?php echo $no++;?></th>
	<th><?php echo $data['id_pembelian'];?></th>
	<th><?php echo $data['tgl_pembelian'];?></th>
	<th><?php echo $data['nama_supplier'];?></th>
	<th><?php echo $data['nama_barang'];?></th>
	<th><?php echo $data['harga_beli'];?></th>
	<th><?php echo $data['jumlah_beli'];?></th>
	<th><?php echo $data['total'];?></th>
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