<?php
include('includekoneksi.php');
{
	?>
	<p align="center"><font size="9"><b> Retur Penjualan </b></font></p>
	<div class="row">
	<div class="col-lg-12">
	<div class="table-responsive">
	<table class="table table-bordered table-hover table-stripped">
	<tr>
	<th>NO</th>
	<th>ID RETUR</th>
	<th>TANGGAL RETUR</th>
	<th>ID PENJUALAN</th>
	<th>ID PELANGGAN</th>
	<th>ID BARANG</th>
	<th>HARGA BARANG</th>
	<th>JUMLAH RETUR</th>
	<th>TOTAL RETUR</th>
	</tr>
	<?php
	$no=1;
	$queri="select * from retur_penjualan";
	$hasil=mysqli_query($koneksi,$queri);
	?>
	<?php while ($data=mysqli_fetch_array($hasil)){ ?>
	
		<tr>
	<th><?php echo $no++;?></th>
	<th><?php echo $data['id_retur'];?></th>
	<th><?php echo $data['tgl_retur'];?></th>
	<th><?php echo $data['id_penjualan'];?></th>
	<th><?php echo $data['id_pelanggan'];?></th>
	<th><?php echo $data['id_barang'];?></th>
	<th><?php echo $data['harga_barang'];?></th>
	<th><?php echo $data['jumlah_retur'];?></th>
	<th><?php echo $data['total_retur'];?></th>
	</tr>
	<?php 
	}
	?>
	</table>
	</div>
</div>
</div>
&nbsp;
&nbsp;
	<button onClick="print_d()" class="btn btn-success btn-lg" >Print Document</button>
   
 <script>
		function print_d(){
			window.open("?rafif=print_retur.php","_blank");
		}
	</script>
	<?php
}
?>