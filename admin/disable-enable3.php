<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><b>
							FORM KULAKAN LAGI
                        </b></h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="admin/index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>

<?php
include'includekoneksi.php';
$id_pembelian = $_GET['id'];
$hasil = mysqli_query ($koneksi,"select * from pembelian where id_pembelian='$id_pembelian'");
$data = mysqli_fetch_array ($hasil);
$tanggal_penjualan = array('');

?>

<?php
		$cariid=mysqli_query($koneksi,"select max(id_barang) from barang");
		$dataid=mysqli_fetch_array($cariid);
		if ($dataid){
			$nilaiid=substr($dataid[0],1);
			$id =(int) $nilaiid;
			$id = $id+1;
			$hasilid = "P".str_pad($id,3,"0",STR_PAD_LEFT);
		} else {
			$hasilid="P001";
		}
	?>

<script>
function sum() {
      var txtFirstNumberValue = document.getElementById('harga_beli').value;
      var txtSecondNumberValue = document.getElementById('stok').value;
      var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('total').value = result;
      }
}
</script>

<html>
<head><title>PEMBELIAN</title>
</head>
<body>
<div class="row">
	<div class="col-lg-12">
<form action="?rafif=simpan_pembelian_baru2.php" method="post" name="Input" enctype="multipart/form-data">
<input type="hidden" name="id_barang" class="form-control" value="<?php echo $hasilid;?>">
<div class ="form-group">
<label>Id Pembelian :</label>
<input type="text" value="<?php echo $data['id_pembelian'];?>" name="id_pembelian" readonly class="form-control">
<label>Tanggal Pembelian :</label>
<input type="date" value="<?php echo $data['tgl_pembelian'];?>" name="tgl_pembelian" readonly class="form-control">
<label>Id Supplier :</label>
<input type="text"value="<?php echo $data['id_supplier'];?>" name="id_supplier" readonly class="form-control">
<label>Nama Barang :</label>
<input type="text" name="nama_barang" class="form-control">
	<label>Id Kategori :</label>
<select required name="id_kategori" class="form-control" type="text" class ="form-group">
<option value="">Pilih salah satu</option>
<?php
$queri="select * from kategori";
$hasil=mysqli_query($koneksi,$queri);
while ($data=mysqli_fetch_array($hasil)){
	?>
	<option value="<?php echo $data['id_kategori'];?>">
	<?php echo $data['kategori'];?>
	</option>
	<?php
	}
	?>
	</select>
	</div>
	
	<div class="form-group">
	<label>Harga beli :</label>
<input type="text" id="harga_beli" class="form-control" name="harga_beli" onkeyup="sum();"required">
<script type="text/javascript">
<?php echo $jsArray;?>
	function changeValue(id){
		document.getElementById('harga_beli').value=prdName[id].jual;
	};
	</script>
	</div>
	<div class="form-group">
<label>Jumlah Beli :</label>
<input type="text" name="stok" onkeyup="sum();" onkeypress="return angka(event)" id="stok" class="form-control">
<input type="hidden" name="harga_jual" class="form-control">
<label>Total Harga :</label>
<input type="text"name="total" class="form-control" id="total">
<label>Foto :</label>
<input type="file" name="foto" required>
</div></div>
			<a href='?rafif=admin/keranjang-beli2.php'> <input type="submit" name="input" value="simpan"></a>
			<a href='?rafif=admin/input_pembelian.php'> <input type="submit" name="input" value="kembali"></a>
      	
</form>
</div>
</div>
</body>
</html>