<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                         FORM EDIT BARANG 
                            
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
$id_barang=$_GET['id_barang'];
$hasil=mysqli_query($koneksi,"select * from barang where id_barang='$id_barang'");
$data=mysqli_fetch_array($hasil);

// membuat function untuk set radio button
function active_radio_button($value,$input){
	//apabila value dari radio sama dengan yang diinput
	$result=$value==$input?'checked':'';
	return $result;
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
<p>&nbsp;
<form action="?rafif=proses_edit_barang.php" method="post" name="input" enctype="multipart/form-data">
<div class ="form-group">
<label>Id Barang :</label>
<input type="text" size="25" class="form-control" value="<?php echo $data['id_barang'];?>"name="id_barang">
<label>Id Kategori :</label>
<input type="text" size="25" class="form-control" value="<?php echo $data['id_kategori'];?>"name="id_kategori">
</label>Nama Barang :</label>
<input type="text" size="25" class="form-control" value="<?php echo $data['nama_barang'];?>"name="nama_barang"onkeypress="return huruf(event)">
<label>Harga Beli :</label>
<input type="text" size="25" class="form-control" value="<?php echo $data['harga_beli'];?>"name="harga_beli"onkeypress="return angka(event)">
<label>Harga Jual :</label>
<input type="text" size="25" class="form-control" value="<?php echo $data['harga_jual'];?>"name="harga_jual"onkeypress="return angka(event)">
<label>Stok :</label>
<input type="text" size="25" class="form-control" value="<?php echo $data['stok'];?>"name="stok"onkeypress="return angka(event)">
<label>FOTO</label>
	<input type="checkbox" size ="25" value="1"  name="ubah_foto"> cheklis jika ingin ubah foto<br>
	<input type="file" name="foto" > 
<button type="submit" value="simpan" name="input" class="btn btn-default btn-lg">SIMPAN</button> 
				<button type="reset" name="reset" class="btn btn-default btn-lg"> BATAL </button>
				<a href ="?rafif=admin/tampil.php" class="btn btn-success btn-lg">lihat data</a>

</div>
</div>
</div>
</form>
</body>
</html>