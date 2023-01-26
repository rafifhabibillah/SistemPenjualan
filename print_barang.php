<html>
<title>Data barang</title>
  <link href="style_print.css" type="text/css" rel="stylesheet" />
<head>

</head>
<body>

 

<?php
include('includekoneksi.php');
{
?>
<center>


<div class="row">
<div class="col-lg-12">
<div class="table-responsive">


<table class="table table-bordered table-hover table-striped"border="1"width="90%" style="border-collapse:collapse;" align="center">
<tr>
<th>FOTO</th>
<th>ID BARANG</th>
<th>KATEGORI</th>
<th>NAMA BARANG</th>
<th>HARGA BELI</th>
<th>HARGA JUAL</th>
<th>STOK</th>



</tr>
<?php
//perintah untuk menampilkan data
$queri="SELECT barang.foto,barang.id_barang,kategori.kategori,barang.nama_barang,barang.harga_beli,barang.harga_jual,barang.stok
        from barang	
        inner join kategori on barang.id_kategori=kategori.id_kategori	";//menampilkan semua data dari table device
$hasil = mysqli_query ($koneksi,$queri); //funggsi untuk sql
?>
<?php while ($data=MYSQLI_fetch_array ($hasil)){ ?>
	
	<tr id="rowHover">
	<th><?php echo "<img src='images/".$data['foto']."' width='120' height='100'>";?></th>
	<th><?php echo $data['id_barang'] ?></th>
	<th><?php echo $data['kategori'] ?></th>
	<th><?php echo $data['nama_barang'] ?></th>
	<th><?php echo $data['harga_beli'] ?></th>
	<th><?php echo $data['harga_jual'] ?></th>
	<th><?php echo $data['stok'] ?></th>
	
	</tr>
<?php
}
?>


</div>
</div>
</div>
 <script>
		window.load = print_d();
		function print_d(){
			window.print();
		}
	</script>
</table>
 
</center>
<?php
}
?>

</body>
</html>
   