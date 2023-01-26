<?php
include('includekoneksi.php');
{
?>
<?php
$id_pembelian=$_GET['id'];
$queri="SELECT * from pembelian where id_pembelian='$id_pembelian'";

//menampilkan semua data dari table pembelian
$hasil = mysqli_query ($koneksi,$queri); //funggsi untuk sql
$data = mysqli_fetch_array ($hasil);
?>
<p align="center"><font face="Berlin Sans FB"size="6"><b>TABEL PEMBELIAN</b></font></p>
<div class="row">
	<div class="col-lg-12">
	<div class="table-responsive">
<pre><font size="4"><b>ID PEMBELIAN 		= <?php echo $data['id_pembelian'] ;?>
<br>TANGGAL PEMBELIAN	= <?php echo $data['tgl_pembelian'] ;?>
<p>NAMA SUPPLIER 		= <?php echo $data['id_supplier'] ;?>
</b></font></pre>

<table class="table table-bordered table-hover table-stripped">
<tr>
<th> NAMA BARANG</th>
<th>HARGA BELI</th>
<th>JUMLAH BELI</th>
<th>TOTAL</th>
</tr>

<?php
//perintah untuk menampilkan data
$queri1="SELECT * from pembelian where id_pembelian='$id_pembelian'";
$hasil= mysqli_query($koneksi,$queri1);
?>

<?php while ($data=mysqli_fetch_array ($hasil)){ ?>
	<tr>
	<th><?php echo $data['id_barang'] ?></td>
	<td><?php echo $data['harga_beli'] ?></td>
	<td><?php echo $data['jumlah_beli'] ?></td>
	<td><?php echo $data['total'] ?></td>
	</tr>
<?php }
?>
</table>
</center>
<center><br>
<a href='?rafif=admin/disable-enable2.php&id=<?php echo $id_pembelian;?>'> <input type='button' name='submit' value='beli lagi'></a>
<a href='?rafif=admin/simpan_tabel2.php&id=<?php echo $id_pembelian;?>'> <input type='button' name='submit' value='selesai'></a>
<a href ="?rafif=admin/input_pembelian.php" class="btn btn-warning btn-XS">kembali</a>
<?php
}
?>