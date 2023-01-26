<?php
include('includekoneksi.php');
{
	?>
	
<p align="center"><b> TABEL KATEGORI </b></p>
<br>
<br>
<div class="row">
	<div class="col-lg-12">
	<div class="table-responsive">
<table class="table table-bordered table-hover table-stripped">
	<tr>
	<th>NO</th>
	<th>ID KATEGORI</th>
	<th>KATEGORI</th>
	</tr>
	<?php
	$no=1;
	$queri="select * from kategori";
	$hasil=mysqli_query($koneksi,$queri);
	?>
	<?php while ($data=mysqli_fetch_array($hasil)){
		?>
	<tr>
	<th><?php echo $no++;?></th>
	<th><?php echo $data['id_kategori'];?></th>
	<th><?php echo $data['kategori'];?></th>
	<th>
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
			window.open("?rafif=print_kategori.php","_blank");
		}
	</script>
	<?php
}
?>