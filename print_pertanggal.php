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
	<th>Bulan PENJUALAN</th>
	</tr>
<?php
$no=1;
 //perintah untuk menampilkan data
$sql=mysqli_query($koneksi,"select id_pelanggan from penjualan");
$data=mysqli_fetch_array ($sql);
$id_pelanggan=$data['id_pelanggan'];
 ?><?php while ($id=mysqli_fetch_array($sql)){?>
 <?php
$query="select id_pelanggan,month('2018-03-04')as bulan from penjualan where id_pelanggan='$id_pelanggan'";
$hasil = mysqli_query($koneksi,$query); // fungsi utk sql
?>
 
  <?php while ($show=mysqli_fetch_array($hasil)){ ?>
	
		<tr>
	<th><?php echo $no++;?></th>
	<th><?php echo $id['id_pelanggan'];?></th>
	<th><?php echo $show['bulan'];?></th>
		</tr>
	<?php 
	}
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