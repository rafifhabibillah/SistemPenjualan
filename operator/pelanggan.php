<?php
include('includekoneksi.php');
{
	?>
	<h1><b> TABLE PELANGGAN </b></h1>
	
	<br>
	<form action="?rafif=pencarian.php" method="post">
	<label>PENCARIAN</label>
	<input type="text" name="cari">
	<button type="submit">search</button>

	</form>
	
	<br>
<br>
<div class="row">
	<div class="col-lg-12">
	<div class="table-responsive">
	<table class="table table-bordered table-hover table-stripped">
	<tr>
	<th>NO</th>
	<th>ID PELANGGAN</th>
	<th>NAMA PELANGGAN</th>
	<th>JENIS KELAMIN</th>
	<th>AGAMA</th>
	<th>TANGGAL LAHIR</th>
	<th>TELEPON</th>
	<th>EMAIL</th>
	<th>ALAMAT</th>
	</tr>
	<?php
	$no=1;
	$queri="select * from pelanggan";
	$hasil=mysqli_query($koneksi,$queri);
	?>
	<?php while ($data=mysqli_fetch_array($hasil)){ ?>
	<tr>
	<th><?php echo $no++;?></th>
	<th><?php echo $data['id_pelanggan'];?></th>
	<th><?php echo $data['nama_pelanggan'];?></th>
	<th><?php echo $data['jenis_kelamin'];?></th>
	<th><?php echo $data['agama'];?></th>
	<th><?php echo $data['tgl_lahir'];?></th>
	<th><?php echo $data['telepon'];?></th>
	<th><?php echo $data['email'];?></th>
	<th><?php echo $data['alamat'];?></th>
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
			window.open("?rafif=print_pelanggan.php","_blank");
		}
	</script>
	<?php
}
?>