<?php
include('includekoneksi.php');
{
	?>

<h1><b> TABEL PEMBELIAN </b></h1>
<br>
<br>
<div class="row">
	<div class="col-lg-12">
	<div class="table-responsive">
	<table class="table table-bordered table-hover table-stripped">
	<tr>
	<th>NO</th>
	<th>ID BELI</th>
	<th>ID PEMBELIAN</th>
	<th>TANGGAL BELI</th>
	<th>ID SUPPLIER</th>
	<th>Action</th>
	</tr>
	<?php
	$id_pembelian=$_GET['id'];
	//perintah untuk tampil data
	$no=1;
	$queri="select * from tabel_pembelian";
	$hasil=mysqli_query($koneksi,$queri);
	?>
	<?php while ($data=mysqli_fetch_array($hasil)){ ?>
			<tr>
	<th><?php echo $no++;?></th>
	<th><?php echo $data['id_beli'];?></th>
	<th><?php echo $data['id_pembelian'];?></th>
	<th><?php echo $data['tgl_pembelian'];?></th>
	<th><?php echo $data['id_supplier'];?></th>
	<th>
	<a href='?rafif=detail2.php&id=<?php echo $data['id_pembelian'];?>' class="btn btn-primary btn-block"><i class="fa fa-star">&nbsp;&nbsp;detail</i></a>
	</th>
		</tr>
	<?php 
	}
	?>
	</table>
	<?php
}
?>