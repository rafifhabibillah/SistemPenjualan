<?php
	include 'includekoneksi.php';
	$data = mysql_query("select id_pelanggan from pelanggan");
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
	<th>ID PELANGGAN</th>
	<th>JUMLAH PENJUALAN</th>
	</tr>
<?php
$no=1;
 //perintah untuk menampilkan data
$sql=mysqli_query($koneksi,"select id_pelanggan from penjualan");
$data=mysqli_fetch_array ($sql);

 while ($id_pelanggan=mysqli_fetch_array($sql)){
	 $id_pelanggan=$data['id_pelanggan']; 
  }
$query="SELECT id_pelanggan,sum(jumlah_barang) as Jumlah
from penjualan
GROUP BY id_pelanggan";
$hasil = mysqli_query($koneksi,$query); // fungsi utk sql
?>
 
  <?php while ($show=mysqli_fetch_array($hasil)){ ?>
	
		<tr>
	<th><?php echo $no++;?></th>
	<th><?php echo $show['id_pelanggan'];?></th>
	<th><?php echo $show['Jumlah'];?></th>
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