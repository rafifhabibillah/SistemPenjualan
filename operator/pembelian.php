<?php
include('includekoneksi.php');
{
	?>
	<p align="center"><b> Tabel Pembelian </b></p>
	<a href ="?rafif=admin/input_pembelian.php" class="btn btn-warning btn-XS">TAMBAH DATA</a>
<br>
<br>
<div class="row">
	<div class="col-lg-12">
	<div class="table-responsive">
	<table class="table table-bordered table-hover table-stripped">
	<tr>
	<th>NO</th>
	<th>ID PEMBELIAN</th>
	<th>TANGGAL PEMBELIAN</th>
	<th>NAMA SUPPLIER</th>
	<th>NAMA BARANG</th>
	<th>HARGA BELI</th>
	<th>JUMLAH BELI</th>
	<th>TOTAL</th>
	<th>Action</th>
	</tr>
	<?php
	$no=1;
	$queri="select pembelian.id_pembelian,pembelian.tgl_pembelian,supplier.nama_supplier,barang.nama_barang,barang.harga_beli,
	pembelian.jumlah_beli,pembelian.total from pembelian
	inner join barang on pembelian.id_barang=barang.id_barang
	inner join supplier on pembelian.id_supplier=supplier.id_supplier";
	$hasil=mysqli_query($koneksi,$queri);
	?>
	<?php while ($data=mysqli_fetch_array($hasil)){ ?>
	
		<tr>
	<th><?php echo $no++;?></th>
	<th><?php echo $data['id_pembelian'];?></th>
	<th><?php echo $data['tgl_pembelian'];?></th>
	<th><?php echo $data['nama_supplier'];?></th>
	<th><?php echo $data['nama_barang'];?></th>
	<th><?php echo $data['harga_beli'];?></th>
	<th><?php echo $data['jumlah_beli'];?></th>
	<th><?php echo $data['total'];?></th>
	<th>
	<a href="?rafif=admin/edit_pembelian.php&id_pembelian=<?php echo $data['id_pembelian'];?>" class="btn btn-primary btn-md"><i class="fa fa-edit">edit</i></a>
	<a href="?rafif=admin/hapus_pembelian.php&id_pembelian=<?php echo $data['id_pembelian'];?>" class="btn btn-danger btn-md"><i class="fa fa-trash">Hapus</i></a>
	</th>
	
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
			window.open("?rafif=print_pembelian.php","_blank");
		}
	</script>
	<?php
}
?>