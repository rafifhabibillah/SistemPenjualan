<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                         FORM BARANG 
                            
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
include ('includekoneksi.php');{
	?>
<?php
		$carikode=mysqli_query($koneksi,"select max(id_barang) from barang");
		$datakode=mysqli_fetch_array($carikode);
		if ($datakode){
			$nilaikode=substr($datakode[0],1);
			$kode =(int) $nilaikode;
			$kode = $kode+1;
			$hasilkode = "P".str_pad($kode,4,"0",STR_PAD_LEFT);
		} else {
			$hasilkode="P0001";
		}
	?>
<script>
function huruf(evt){
	var charCode= (evt.which) ? evt.which : event.keyCode
	if((charCode <65 || charCode> 90)&&(charCode<97|| charCode> 122)&&charCode>32)
		return false;
	return true;
}
</script>

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
<title>Tabel Barang</title>
</head>
<body>
<div class="row">
	<div class="col-lg-12">
<form action="?rafif=simpan.php" method="post" name="input" enctype="multipart/form-data">
<div class ="form-group">
<label>Id Barang :</label>
<input type="text" name="id_barang" class="form-control" value="<?php echo $hasilkode;?>">
</div>
<div class ="form-group">
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
<div class ="form-group">
<label>Nama Barang :</label>
<input type="text" required name="nama_barang" class="form-control" onkeypress="return huruf(event)">
</div>
<div class ="form-group">
<label>Harga Beli :</label>
<input type="text" required name="harga_beli" class="form-control" onkeypress="return angka(event)">
</div>
<div class ="form-group">
<label>Harga Jual :</label>
<input type="text" required name="harga_jual" class="form-control" onkeypress="return angka(event)">
</div>
<div class ="form-group">
<label>Stok :</label>
<input type="text" required name="stok" class="form-control" onkeypress="return angka(event)">

<label>Foto :</label>
<input type="file" name="foto" required>
</div>

<button type="submit" name="input" value="simpan" class="btn btn-default btn-lg">Simpan</button>
<button type="reset" name="reset" value="batal" class="btn btn-default btn-lg">Batal</button>
<a href ="?rafif=admin/tampil.php" class="btn btn-success btn-lg">lihat data</a>
</form>
</div>
</div>
</body>
</html>
<?php
	}
	?>