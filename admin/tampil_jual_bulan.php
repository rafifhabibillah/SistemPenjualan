<?php
	include 'includekoneksi.php';
?>
<center><h1><b> Tabel DATA jual <small>se-BULAN</small> </b></h1></center>
	<a href ="?rafif=admin/input_penjualan.php" class="btn btn-warning btn-XS">TAMBAH DATA</a>
<br>
<br>
<div class="row">
	<div class="col-lg-12">
	<div class="table-responsive">
	<table class="table table-bordered table-hover table-stripped">
<tr class="tableheader">
	<th>NO</th>
	<th>Pelanggan</th>
	<th>Bulan</th>
	<th>Jumlah Penjualan</th>
	</tr>
<?php
$no=1;
$bulan=array(
	'01'=>'januari',
	'02'=>'februari',
	'03'=>'maret',
	'0'=>'april',
	'05'=>'mei',
	'06'=>'juni',
	'07'=>'juli',
	'08'=>'agustus',
	'09'=>'september',
	'10'=>'oktober',
	'11'=>'november',
	'12'=>'desember');
 //perintah untuk menampilkan data
$sql=mysqli_query($koneksi,"select id_pelanggan,tgl_penjualan from penjualan");
$data=mysqli_fetch_array ($sql);
$tgl_penjualan=$data['tgl_penjualan']; ?>
<?php
$query="SELECT id_pelanggan,month(tgl_penjualan) as bulan,count(*)as jumlah_barang
from penjualan
GROUP BY day(tgl_penjualan)";
$hasil = mysqli_query($koneksi,$query); // fungsi utk sql
?>
 
  <?php while ($show=mysqli_fetch_array($hasil)){
  $date=$data['tgl_penjualan'];
  $tampil_bulan =$bulan[date('m',strtotime($date))];
  ?>
	
		<tr>
	<th><?php echo $no++;?></th>
	<th><?php echo $show['id_pelanggan'];?></th>
	<th><?php echo $tampil_bulan;?></th>
	<th><?php echo $show['jumlah_barang'];?></th>
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
</body>
</html>