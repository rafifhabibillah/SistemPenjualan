<?php
	include 'includekoneksi.php';
?>
<center><h1><b> Tabel DATA Per <small>TAHUN</small> </b></h1></center>
	<a href ="?rafif=admin/penjualan.php" class="btn btn-info btn-XS">Kembali</a>
<br>
<br>
<div class="row">
	<div class="col-lg-12">
	<div class="table-responsive">
	<table class="table table-bordered table-hover table-stripped">
<tr class="tableheader">
	<th>NO</th>
	<th>Bulan</th>
	<th>Jumlah Barang</th>
	</tr>
<?php
$no=1;
$bulan=array(
	'01'=>'januari',
	'02'=>'februari',
	'03'=>'maret',
	'04'=>'april',
	'05'=>'mei',
	'06'=>'juni',
	'07'=>'juli',
	'08'=>'agustus',
	'09'=>'september',
	'10'=>'oktober',
	'11'=>'november',
	'12'=>'desember');
 //perintah untuk menampilkan data
$sql=mysqli_query($koneksi,"select tgl_penjualan from penjualan");
$data=mysqli_fetch_array ($sql);
$tgl_penjualan=$data['tgl_penjualan']; ?>
<?php
$query="SELECT tgl_penjualan,count(*)as jumlah_barang
from penjualan
GROUP BY month(tgl_penjualan)";
$hasil = mysqli_query($koneksi,$query); // fungsi utk sql
?>
 
  <?php while ($show=mysqli_fetch_array($hasil)){ 
  $date=$show['tgl_penjualan'];
  $tampil_bulan =$bulan[date('m',strtotime($date))];
  ?>
	
		<tr>
	<th><?php echo $no++;?></th>
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
		<button onClick="print_d()" class="btn btn-success btn-lg" >Diagram</button>
   
 <script>
		function print_d(){
			window.open("?rafif=diagram2.php","_blank");
		}
	</script>
</body>
</html>