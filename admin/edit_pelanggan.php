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
include ('includekoneksi.php');
$id_pelanggan=$_GET['id_pelanggan'];
$hasil=mysqli_query($koneksi,"select * from pelanggan where id_pelanggan='$id_pelanggan'");
$data=mysqli_fetch_array($hasil);
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
<form action="?rafif=proses_edit_pelanggan.php" method="POST" name="input" enctype="multipart/form-data">
<div class ="form-group">
<label>Id Pelanggan :</label>
<input type="text" size="25" class="form-control" value="<?php echo $data['id_pelanggan'];?>" name="id_pelanggan">
<label>Nama Pelanggan :</label>
<input type="text" size="25" class="form-control" value="<?php echo $data['nama_pelanggan'];?>" name="nama_pelanggan"onkeypress="return huruf(event)">

<label>Jenis Kelamin :</label>
<?php if ($data['jenis_kelamin']=="laki-laki"){?>
<input type="radio"name="jenis_kelamin"value="laki-laki"checked>laki-laki<input type="radio"name="jenis_kelamin"value="perempuan">perempuan
<?php } ?>
<?php if ($data['jenis_kelamin']=="perempuan"){?>
<input type="radio"name="jenis_kelamin"value="laki-laki">laki-laki<input type="radio"name="jenis_kelamin"value="perempuan" checked>perempuan
<?php } ?></td></tr>
<br>
<label>Agama :</label>
<select name="agama" class="form-control">
<?php
if ($data['agama']=="Islam")echo"<option value='Islam' selected>Islam</option>";
else echo"<option value='Islam'>Islam</option>";
if ($data['agama']=="Kristen")echo"<option value='Kristen' selected>Kristen</option>";
else echo"<option value='Kristen'>Kristen</option>";
if ($data['agama']=="Katholik")echo"<option value='Katholik' selected>Katholik</option>";
else echo"<option value='Katholik'>Katholik</option>";
if ($data['agama']=="Budha")echo"<option value='Budha' selected>Budha</option>";
else echo"<option value='Budha'>Budha</option>";
if ($data['agama']=="Konghucu")echo"<option value='Konghucu' selected>Konghucu</option>";
else echo"<option value='Konghucu'>Konghucu</option>";
	?>
	</select>
<label>Tanggal Lahir :</label>
<input type="date" size="25" class="form-control" value="<?php echo $data['tgl_lahir'];?>" name="tgl_lahir">
<label>Telepon :</label>
<input type="text" size="25" class="form-control" value="<?php echo $data['telepon'];?>" name="telepon"onkeypress="return angka(event)">
<label>Email :</label>
<input type="text" size="25" class="form-control" value="<?php echo $data['email'];?>" name="email">
<label>Alamat :</label>
<input type="text" size="25" class="form-control" value="<?php echo $data['alamat'];?>" name="alamat">
</div>
<button type="submit" value="simpan" name="input" class="btn btn-default btn-lg">SIMPAN</button> 
				<button type="reset" name="reset" class="btn btn-default btn-lg"> BATAL </button>
				<a href ="?rafif=admin/pelanggan.php" class="btn btn-success btn-lg">lihat data</a>
				
	</div>
	</div>
	</form>
</body>
</html>