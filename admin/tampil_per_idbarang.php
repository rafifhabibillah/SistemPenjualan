<?php
	include 'includekoneksi.php';
	$data = mysql_query("select id_barang from pelanggan");
?>
<center><h1><b> Tabel DATA Per <small>Barang</small> </b></h1></center>
	<a href ="?rafif=admin/penjualan.php" class="btn btn-info btn-XS">Kembali</a>
<br>
<br>
<div class="row">
	<div class="col-lg-12">
	<div class="table-responsive">
	<table class="table table-bordered table-hover table-stripped">
<tr class="tableheader">
	<th>NO</th>
	<th>ID Barang</th>
	<th>JUMLAH PENJUALAN</th>
	</tr>
<?php
$no=1;
 //perintah untuk menampilkan data
$sql=mysqli_query($koneksi,"select id_barang from penjualan");
$data=mysqli_fetch_array ($sql);

 while ($id_pelanggan=mysqli_fetch_array($sql)){
	 $id_barang=$data['id_barang']; 
  }
$query="SELECT id_barang,count(jumlah_barang) as Jumlah
from penjualan
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
		<button onClick="print_d()" class="btn btn-success btn-lg" >Print Per ID</button>
   
 <script>
		function print_d(){
			window.open("?rafif=print_total.php","_blank");
		}
	</script>
		<button onClick="print_d()" class="btn btn-success btn-lg" >Diagram</button>
   
 <script>
		function print_d(){
			window.open("?rafif=diagram.php","_blank");
		}
	</script>
</body>
</html>