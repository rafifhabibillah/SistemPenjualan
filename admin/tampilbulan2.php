<?php
	include 'includekoneksi.php';
	$data = mysql_query("select id_pelanggan,tgl_penjualan from pelanggan");
?>
<center><h1><b> Tabel DATA Per <small><i>Barang</i></small> </b></h1>
<a href ="?rafif=admin/menu-bulan.php" class="btn btn-info btn-XS">Kembali</a>
<?php
	include('includekoneksi.php');
	if(isset($_POST['bulan'])){
		$bulan=$_POST['bulan'];
		echo "<br>Bulan :".$bulan."</br>";
	}
	?></center>
<br>
<div class="row">
	<div class="col-lg-12">
	<div class="table-responsive">
	<form action="?rafif=admin/diagram_tampilbulan2.php&bulan=<?php echo $bulan;?> " method="post">
	<table class="table table-bordered table-hover table-stripped">
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
$query="SELECT id_barang,sum(jumlah_barang) as Jumlah
from penjualan
WHERE month(tgl_penjualan)='$_POST[bulan]'
GROUP BY id_barang";
$hasil = mysqli_query($koneksi,$query); // fungsi utk sql
		
?>
 
  <?php while ($show=mysqli_fetch_array($hasil)){ ?>
	
		<tr>
	<th><?php echo $no++;?></th>
	<th><?php echo $show['id_barang'];?></th>
	<th><?php echo $show['Jumlah'];?></th>
		</tr>
	<?php 
	}
	?>
</table>
</div>
</div>
</div>
		<button type="submit" class="btn btn-info btn-m">Grafik</button>
</body>
</html>