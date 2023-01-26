<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                         FORM SUPPLIER 
                            
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
$id_supplier=$_GET['id_supplier'];
$hasil=mysqli_query($koneksi,"select * from supplier where id_supplier='$id_supplier'");
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
<title>Tabel SUPPLIER</title>
</head>
<body>
<div class="row">
	<div class="col-lg-12">
<form action="?rafif=proses_edit_supplier.php" method="POST" name="input" enctype="multipart/form-data">
<div class ="form-group">
<label>Id Pelanggan :</label>
<input type="text" size="25" class="form-control" value="<?php echo $data['id_supplier'];?>" name="id_supplier">
<label>Nama Pelanggan :</label>
<input type="text" size="25" class="form-control" value="<?php echo $data['nama_supplier'];?>" name="nama_supplier"onkeypress="return huruf(event)">
<label>Telepon :</label>
<input type="text" size="25" class="form-control" value="<?php echo $data['telp'];?>" name="telp" onkeypress="return angka(event)">
<label>Email :</label>
<input type="text" size="25" class="form-control" value="<?php echo $data['email'];?>" name="email">
<label>Alamat :</label>
<input type="text" size="25" class="form-control" value="<?php echo $data['alamat'];?>" name="alamat">
</div>
<button type="submit" value="simpan" name="input" class="btn btn-default btn-lg">SIMPAN</button> 
				<button type="reset" name="reset" class="btn btn-default btn-lg"> BATAL </button>
				<a href ="?rafif=admin/supplier.php" class="btn btn-success btn-lg">lihat data</a>
				
	</div>
	</div>
	</form>
</body>
</html>