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
		$carikode=mysqli_query($koneksi,"select max(id_supplier) from supplier");
		$datakode=mysqli_fetch_array($carikode);
		if ($datakode){
			$nilaikode=substr($datakode[0],1);
			$kode =(int) $nilaikode;
			$kode = $kode+1;
			$hasilkode = "S".str_pad($kode,3,"0",STR_PAD_LEFT);
		} else {
			$hasilkode="S001";
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
<form action="?rafif=insert_supplier.php" method="post" name="input" enctype="multipart/form-data">
<div class="form-group">
<label>Id Supplier :</label>
<input type="text" required name="id_supplier" class="form-control" value="<?php echo $hasilkode;?>">
<label>Nama Supplier :</label>
<input type="text" required name="nama_supplier" class="form-control" onkeypress="return huruf(event)">
</div>
<div class="form-group">
<label>Telepon :</label>
<input type="text" name="telp" class="form-control" onkeypress="return angka(event)">
<label>Email :</label>
<input type="text" name="email" class="form-control">
<label>Alamat :</label>
<input type="text" name="alamat" class="form-control">
</div>
                <button type="submit" value="simpan" name="input" class="btn btn-default btn-lg">SIMPAN</button> 
				<button type="reset" name="reset" value="Batal" class="btn btn-default btn-lg"> BATAL </button> </td>
				<a href ="?rafif=admin/supplier.php" class="btn btn-success btn-lg">lihat data</a>

</form>
</div>
</div>
</body>
</html>
<?php
	}
	?>