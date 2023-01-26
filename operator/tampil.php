<?php
include('includekoneksi.php');
{
	?>
	
	<p align="center"><font face="Berlin Sans FB" size="7"> TABEL BARANG </font></p>
	<br>
	<div class="row">
	<div class="col-lg-12">
	<div class="table-responsive">
	
<table class="table table-bordered table-hover table-stripped">
	<tr>
	<th>NO</th>
	<th>FOTO</th>
	<th>ID BARANG</th>
	<th>KATEGORI</th>
	<th>NAMA BARANG</th>
	<th>HARGA BELI</th>
	<th>HARGA JUAL</th>
	<th>STOK</th>
	</tr>
	<?php
	$no=1;
	$queri="select barang.foto,barang.id_barang,kategori.kategori,barang.nama_barang,barang.harga_beli,barang.harga_jual,
	barang.stok from barang
	inner join kategori on barang.id_kategori=kategori.id_kategori";
	$hasil=mysqli_query($koneksi,$queri);
	?>
	<?php while ($data=mysqli_fetch_array($hasil)){?>
	<tr>
	<th><?php echo $no++;?></th>
	<th><?php echo "<img src='images/".$data['foto']."' width='120' height='100'>";?></th>
	<th><?php echo $data['id_barang'];?></th>
	<th><?php echo $data['kategori'];?></th>
	<th><?php echo $data['nama_barang'];?></th>
	<th><?php echo $data['harga_beli'];?></th>
	<th><?php echo $data['harga_jual'];?></th>
	<th><?php echo $data['stok'];?></th>
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
			window.open("?rafif=print_barang.php","_blank");
		}
	</script>
	<?php
}
?>