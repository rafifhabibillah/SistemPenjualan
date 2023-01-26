<?php
	include 'includekoneksi.php';{
	
?>
<html>
<head>
	<title>nota</title>
    <link href="style_print.css" type="text/css" rel="stylesheet" />
</head>
<body>

<div class="row">
<div class="col-lg-12">
<div class="table-responsive">
	<table class="table table-bordered table-hover table-striped" border="1"width="90%" style="border-collapse:collapse;" align="center">
	<?php
$id_penjualan=$_GET['id'];
$hasil = mysqli_query ($koneksi,"select penjualan.id_penjualan,penjualan.tgl_penjualan,pelanggan.nama_pelanggan 
from penjualan
inner join pelanggan on penjualan.id_pelanggan=pelanggan.id_pelanggan where penjualan.id_penjualan='$id_penjualan'");

//menampilkan semua data dari table device

$show = mysqli_fetch_array ($hasil);
?>
    	<tr>
<th>ID PENJUALAN =<?php echo $show['id_penjualan'] ;?> </th>
</tr>
<tr>
<th>TANGGAL =<?php echo $show['tgl_penjualan'] ;?> </th>
</tr>
<tr>
<th>PELANGGAN =<?php echo $show['nama_pelanggan'] ;?> </th>
</tr>
</table>

	<table border="1" class="table table-bordered table-hover table-striped">
<tr>
<th>NO</th>
<th> NAMA BARANG</th>
<th>HARGA BARANG</th>
<th>JUMLAH BARANG</th>
<th> SUB TOTAL HARGA</th>
</tr>

<?php
//perintah untuk menampilkan data
$total=0;
$no=1;
$hasil= mysqli_query($koneksi,"select penjualan.id_penjualan,barang.nama_barang,penjualan.harga_barang,penjualan.jumlah_barang,penjualan.total_harga
from penjualan
inner join barang on penjualan.id_barang=barang.id_barang where id_penjualan='$id_penjualan'");
?>

<?php while ($data=mysqli_fetch_array ($hasil)){ ?>
	<tr>
	<th><?php echo $no++;?></th>
	<th><?php echo $data['nama_barang'] ?></th>
	<th><?php echo $data['harga_barang'] ?></th>
	<th><?php echo $data['jumlah_barang'] ?></th>
	<th><?php echo $data['total_harga'] ?></th>
	</tr>
<?php 
$total=$total+$data['total_harga'];
}
?>
	<tr>
	<th colspan="4">total</td>
	<td><b>RP.<?php echo $total;?></b></td>
	</tr>

</table>
</div>
</div>
</div>
    <script>
		window.load = print_d();
		function print_d(){
			window.print();
		}
	</script>
	<?php
}
?>
</body>
</html>