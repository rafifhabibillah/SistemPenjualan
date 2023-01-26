<?php
include('includekoneksi.php');
{
	?>
	<p align="center"><b> Tabel Penjualan </b></p>
	<br>
<br>
<div class="row">
	<div class="col-lg-12">
	<div class="table-responsive">
	<table class="table table-bordered table-hover table-stripped">
	<tr>
	<th>NO</th>
	<th>ID PENJUALAN</th>
	<th>TANGGAL PENJUALAN</th>
	<th>NAMA PELANGGAN</th>
	<th>NAMA BARANG</th>
	<th>HARGA BARANG</th>
	<th>JUMLAH BARANG</th>
	<th>TOTAL HARGA</th>
	</tr>
	<?php
	$no=1;
	$queri="select penjualan.id_penjualan,penjualan.tgl_penjualan,pelanggan.nama_pelanggan,barang.nama_barang,penjualan.harga_barang,
	penjualan.jumlah_barang,penjualan.total_harga from penjualan
	inner join barang on penjualan.id_barang=barang.id_barang
	inner join pelanggan on penjualan.id_pelanggan=pelanggan.id_pelanggan";
	$hasil=mysqli_query($koneksi,$queri);
	?>
	<?php while ($data=mysqli_fetch_array($hasil)){ ?>
	
		<tr>
	<th><?php echo $no++;?></th>
	<th><?php echo $data['id_penjualan'];?></th>
	<th><?php echo $data['tgl_penjualan'];?></th>
	<th><?php echo $data['nama_pelanggan'];?></th>
	<th><?php echo $data['nama_barang'];?></th>
	<th><?php echo $data['harga_barang'];?></th>
	<th><?php echo $data['jumlah_barang'];?></th>
	<th><?php echo $data['total_harga'];?></th>
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
			window.open("?sidiq=print-barang.php","_blank");
		}
	</script>
	<?php
}
?>