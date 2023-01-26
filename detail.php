<?php
include('includekoneksi.php');
{
?>

<?php
$id_penjualan=$_GET['id'];
$hasil = mysqli_query ($koneksi,"select penjualan.id_penjualan,penjualan.tgl_penjualan,pelanggan.nama_pelanggan
from penjualan
inner join pelanggan on penjualan.id_pelanggan=pelanggan.id_pelanggan where id_penjualan='$id_penjualan'"); //funggsi untuk sql
$show = mysqli_fetch_array ($hasil);
?>
<div class="row">
	<div class="col-lg-12">
	<div class="table-responsive">
<pre>
<b><font size="4">ID PENJUALAN 		= <?php echo $show['id_penjualan'] ;?>
<br>TANGGAL PENJUALAN	= <?php echo $show['tgl_penjualan'] ;?>
<p>NAMA PELANGGAN 		= <?php echo $show['nama_pelanggan'] ;?>
</font></b></pre>

<table class="table table-bordered table-hover table-stripped">
<tr>
<th> NO</th>
<th> NAMA BARANG</th>
<th>HARGA BARANG</th>
<th>JUMLAH BARANG</th>
<th>TOTAL HARGA</th>
</tr>

<?php
$total=0;
$no=1;
//perintah untuk menampilkan data
$hasil= mysqli_query($koneksi,"select penjualan.id_penjualan,barang.nama_barang,penjualan.harga_barang,penjualan.jumlah_barang,penjualan.total_harga
from penjualan
inner join barang on penjualan.id_barang=barang.id_barang where id_penjualan='$id_penjualan'");
?>

<?php while ($data=mysqli_fetch_array ($hasil)){ ?>
	<tr>
	<th><?php echo $no++;?></th>
	<th><?php echo $data['nama_barang'] ?></th>
	<th><?php echo $data['harga_barang'] ?></th>
	<th><?php echo $data['jumlah_barang'] ?></th>
	<th><?php echo $data['total_harga'] ?></th>
	</tr>
<?php 
$total=$total+$data['total_harga'];
}
?>
	<tr>
	<th colspan="4">total</td>
	<td><b>RP.<?php echo $total;?></b></td>
	</tr>

</table>
</div>
</div>
</div>
&nbsp;
&nbsp;
	<button onClick="print_d()" class="btn btn-success btn-lg" >Print Document</button>
   
 <script>
		function print_d(){
			window.open("?rafif=print_detail.php&id=<?php echo $show['id_penjualan'];?>","_blank");
		}
	</script>


<?php
}
?>