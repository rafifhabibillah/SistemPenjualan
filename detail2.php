<?php
include('includekoneksi.php');
{
?>

<?php
$id_pembelian=$_GET['id'];
$hasil = mysqli_query ($koneksi,"select pembelian.id_pembelian,pembelian.tgl_pembelian,supplier.nama_supplier
from pembelian
inner join supplier on pembelian.id_supplier=supplier.id_supplier where id_pembelian='$id_pembelian'"); //funggsi untuk sql
$show = mysqli_fetch_array ($hasil);
?>
<div class="row">
	<div class="col-lg-12">
	<div class="table-responsive">
<pre>
<b><font size="4">ID PEMBELIAN 		= <?php echo $show['id_pembelian'] ;?>
<br>TANGGAL PEMBELIAN	= <?php echo $show['tgl_pembelian'] ;?>
<p>NAMA SUPPLIER 		= <?php echo $show['nama_supplier'] ;?>
</font></b></pre>

<table class="table table-bordered table-hover table-stripped">
<tr>
<th> NO</th>
<th> NAMA BARANG</th>
<th>HARGA BELI</th>
<th>JUMLAH BELI</th>
<th>TOTAL</th>
</tr>

<?php
$total=0;
$no=1;
//perintah untuk menampilkan data
$hasil= mysqli_query($koneksi,"select pembelian.id_pembelian,barang.nama_barang,barang.harga_beli,pembelian.jumlah_beli,pembelian.total
from pembelian
inner join barang on pembelian.id_barang=barang.id_barang where id_pembelian='$id_pembelian'");
?>

<?php while ($data=mysqli_fetch_array ($hasil)){ ?>
	<tr>
	<th><?php echo $no++;?></th>
	<th><?php echo $data['nama_barang'] ?></th>
	<th><?php echo $data['harga_beli'] ?></th>
	<th><?php echo $data['jumlah_beli'] ?></th>
	<th><?php echo $data['total'] ?></th>
	</tr>
<?php 
$total=$total+$data['total'];
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
			window.open("?rafif=print_detail2.php&id=<?php echo $show['id_pembelian'];?>","_blank");
		}
	</script>


<?php
}
?>