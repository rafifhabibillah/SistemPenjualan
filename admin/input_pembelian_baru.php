<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                         FORM PEMBELIAN
                            
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="admin/isi_index.php">Dashboard</a>
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
include ('includekoneksi.php');
$tanggal=date("Y-m-d");
{ 
?>
<script>
function sum(){
	var txtFirstNumberValue = document.getElementById('harga_beli').value;
	var txtsecondNumberValue = document.getElementById('stok').value;
	var result = parseInt(txtFirstNumberValue)*(txtsecondNumberValue);
	if (!isNaN(result)){
		document.getElementById('total').value=result;
	}
}
</script>
<?php
		$carikode=mysqli_query($koneksi,"select max(id_pembelian) from pembelian");
		$datakode=mysqli_fetch_array($carikode);
		if ($datakode){
			$nilaikode=substr($datakode[0],1);
			$kode =(int) $nilaikode;
			$kode = $kode+1;
			$hasilkode = "B".str_pad($kode,3,"0",STR_PAD_LEFT);
		} else {
			$hasilkode="B001";
		}
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
function angka(evt){
	var charCode= (evt.which) ? evt.which : event.keyCode
	if((charCode <48 || charCode> 57)&&charCode)
		return false;
	return true;
}
</script>

		
<html>
<head>
<title>Tabel Penjualan</title>
</head>
<body>
<div class="row">
	<div class="col-lg-12">
<form action="?rafif=insert_pembelianbaru.php" method="post" name="input" enctype="multipart/form-data">
<div class ="form-group">
<input type="hidden" name="id_barang" class="form-control" value="<?php echo $hasilid;?>">
	<label>Id Pembelian :</label>
	<input type="text" name="id_pembelian" class="form-control" value="<?php echo $hasilkode;?>">
<label>Tanggal Pembelian :</label>
<input type="date" size="20" name="tgl_pembelian" class="form-control" value="<?php echo $tanggal;?>">
<label>Supplier :</label>
<select required name="id_supplier" type="text" class="form-control">
<option value="">Pilih salah satu</option>
<?php
$queri="select * from supplier";
$hasil=mysqli_query($koneksi,$queri);
while ($data=mysqli_fetch_array($hasil)){
	?>
	<option value="<?php echo $data['id_supplier'];?>">
	<?php echo $data['nama_supplier'];?>
	</option>
	<?php
	}
	?>
	</select>
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
</div><br>
                <button type="submit" value="simpan" name="input" class="btn btn-default btn-lg">SIMPAN</button> 
				<button type="reset" name="reset" value="Batal" class="btn btn-default btn-lg"> BATAL </button> </td>
				<a href ="?rafif=admin/pembelian.php" class="btn btn-success btn-lg">lihat data</a>
</form>
</body>
</html>
<?php
	}
	?>