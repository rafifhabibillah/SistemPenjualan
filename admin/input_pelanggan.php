<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                         FORM PELANGGAN 
                            
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
		$carikode=mysqli_query($koneksi,"select max(id_pelanggan) from pelanggan");
		$datakode=mysqli_fetch_array($carikode);
		if ($datakode){
			$nilaikode=substr($datakode[0],1);
			$kode =(int) $nilaikode;
			$kode = $kode+1;
			$hasilkode = "P".str_pad($kode,3,"0",STR_PAD_LEFT);
		} else {
			$hasilkode="P001";
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
<title>Tabel Pelanggan</title>
</head>
<body>
<div class="row">
	<div class="col-lg-12">
<form action="?rafif=insert_pelanggan.php" method="post" name="input" enctype="multipart/form-data">
<div class="form-group">
<label>Id Pelanggan :</label>
<input type="text" required name="id_pelanggan" class="form-control" value="<?php echo $hasilkode;?>">
<label>Nama Pelanggan :</label>
<input type="text" required name="nama_pelanggan" class="form-control" onkeypress="return huruf(event)">
</div>
<label>Jenis Kelamin :</label>
<input type="radio" name="jenis_kelamin"  value="laki-laki">laki-laki
<input type="radio" name="jenis_kelamin"  value="perempuan">perempuan
<div class="form-group">
<label>Agama :</label>
<select required name="agama" class="form-control" type="text">
<option value="">Pilih salah satu</option>
<option value="Islam">Islam</option>
<option value="Kristen">Kristen</option>
<option value="Katholik">Katholik</option>
<option value="Budha">Budha</option>
<option value="Konghucu">Konghucu</option>
	</select>
<label>Tanggal Lahir :</label>
<input type="date" name="tgl_lahir" class="form-control">
<label>Telepon :</label>
<input type="text" name="telepon" class="form-control" onkeypress="return angka(event)">
<label>Email :</label>
<input type="text" name="email" class="form-control">
<label>Alamat :</label>
<input type="text" name="alamat" class="form-control">
</div>
                <button type="submit" value="simpan" name="input" class="btn btn-default btn-lg">SIMPAN</button> 
				<button type="reset" name="reset" value="Batal" class="btn btn-default btn-lg"> BATAL </button> </td>
				<a href ="?rafif=admin/pelanggan.php" class="btn btn-success btn-lg">lihat data</a>

</form>
</div>
</div>
</body>
</html>
<?php
	}
	?>