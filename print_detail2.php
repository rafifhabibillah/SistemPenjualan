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
$id_pembelian=$_GET['id'];
$hasil = mysqli_query ($koneksi,"select pembelian.id_pembelian,pembelian.tgl_pembelian,supplier.nama_supplier
from pembelian
inner join supplier on pembelian.id_supplier=supplier.id_supplier where id_pembelian='$id_pembelian'");

//menampilkan semua data dari table device

$show = mysqli_fetch_array ($hasil);
?>
    	<tr>
<th>ID PEMBELIAN =<?php echo $show['id_pembelian'] ;?> </th>
</tr>
<tr>
<th>TANGGAL =<?php echo $show['tgl_pembelian'] ;?> </th>
</tr>
<tr>
<th>SUPPLIER =<?php echo $show['nama_supplier'] ;?> </th>
</tr>
</table>

	<table border="1" class="table table-bordered table-hover table-striped">
<tr>
<th>NO</th>
<th> NAMA BARANG</th>
<th>HARGA BELI</th>
<th>JUMLAH BELI</th>
<th> SUB TOTAL HARGA</th>
</tr>

<?php
//perintah untuk menampilkan data
$total=0;
$no=1;
$hasil= mysqli_query($koneksi,"select pembelian.id_pembelian,barang.nama_barang,barang.harga_beli,pembelian.jumlah_beli,pembelian.total
from pembelian
inner join barang on pembelian.id_barang=barang.id_barang where id_pembelian='$id_pembelian'");
?>

<?php while ($data=mysqli_fetch_array ($hasil)){ ?>
	<tr>
	<th><?php echo $no++;?></th>
	<th><?php echo $data['nama_barang'] ?></th>
	<th><?php echo $data['harga_beli'] ?></th>
	<th><?php echo $data['jumlah_beli'] ?></th>
	<th><?php echo $data['total'] ?></th>
	</tr>
<?php 
$total=$total+$data['total'];
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