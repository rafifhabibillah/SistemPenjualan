<?php
include('includekoneksi.php');
{
	?>

<h1><b> TABEL PENJUALAN </b></h1>
<br>
<div class="row">
	<div class="col-lg-12">
	<div class="table-responsive">
	<table class="table table-bordered table-hover table-stripped">
	<tr>
	<th>NO</th>
	<th>ID JUAL</th>
	<th>ID PENJUALAN</th>
	<th>TANGGAL PENJUALAN</th>
	<th>ID PELANGGAN</th>
	<th>Action</th>
	</tr>
	<?php
	$id_penjualan=$_GET['id'];
	//perintah untuk tampil data
	$no=1;
	$queri="select * from tabel_penjualan";
	$hasil=mysqli_query($koneksi,$queri);
	?>
	<?php while ($data=mysqli_fetch_array($hasil)){ ?>
			<tr>
	<th><?php echo $no++;?></th>
	<th><?php echo $data['id_jual'];?></th>
	<th><?php echo $data['id_penjualan'];?></th>
	<th><?php echo $data['tgl_penjualan'];?></th>
	<th><?php echo $data['id_pelanggan'];?></th>
	<th>
	<a href='?rafif=detail.php&id=<?php echo $data['id_penjualan'];?>' class="btn btn-primary btn-block"><i class="fa fa-star">&nbsp;&nbsp;detail</i></a>
	</th>
		</tr>
	<?php 
	}
	?>
	</table>
	<?php
}
?>