<?php
include('includekoneksi.php');
{
?>
<?php
$id_penjualan=$_GET['id'];
$queri="SELECT * from penjualan where id_penjualan='$id_penjualan'";

//menampilkan semua data dari table device
$hasil = mysqli_query ($koneksi,$queri); //funggsi untuk sql
$data = mysqli_fetch_array ($hasil);
?>
<p align="center"><font face="Berlin Sans FB"size="6"><b>TABEL PENJUALAN</b></font></p>
<div class="row">
	<div class="col-lg-12">
	<div class="table-responsive">
<pre><font size="4"><b>ID PENJUALAN 		= <?php echo $data['id_penjualan'] ;?>
<br>TANGGAL PENJUALAN	= <?php echo $data['tgl_penjualan'] ;?>
<p>NAMA PELANGGAN 		= <?php echo $data['id_pelanggan'] ;?>
</b></font></pre>

<table class="table table-bordered table-hover table-stripped">
<tr>
<th> NAMA BARANG</th>
<th>HARGA BARANG</th>
<th>JUMLAH BARANG</th>
<th>TOTAL HARGA</th>
</tr>

<?php
//perintah untuk menampilkan data
$queri1="SELECT * from penjualan where id_penjualan='$id_penjualan'";
$hasil= mysqli_query($koneksi,$queri1);
?>

<?php while ($data=mysqli_fetch_array ($hasil)){ ?>
	<tr>
	<th><?php echo $data['id_barang'] ?></td>
	<td><?php echo $data['harga_barang'] ?></td>
	<td><?php echo $data['jumlah_barang'] ?></td>
	<td><?php echo $data['total_harga'] ?></td>
	</tr>
<?php }
?>
</table>
</center>
<center><br>
<a href='?rafif=admin/disable-enable.php&id=<?php echo $id_penjualan;?>'> <input type='button' name='submit' value='beli lagi'></a>
<a href='?rafif=admin/simpan_tabel.php&id=<?php echo $id_penjualan;?>'> <input type='button' name='submit' value='selesai'></a>
<a href ="?rafif=admin/input_penjualan.php" class="btn btn-warning btn-XS">kembali</a>
<?php
}
?>