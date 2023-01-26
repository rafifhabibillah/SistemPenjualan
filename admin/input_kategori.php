<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                         FORM KATEGORI 
                            
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
		$carikode=mysqli_query($koneksi,"select max(id_kategori) from kategori");
		$datakode=mysqli_fetch_array($carikode);
		if ($datakode){
			$nilaikode=substr($datakode[0],1);
			$kode =(int) $nilaikode;
			$kode = $kode+1;
			$hasilkode = "K".str_pad($kode,3,"0",STR_PAD_LEFT);
		} else {
			$hasilkode="K001";
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
	
<html>
<head>
<title>Tabel Kategori</title>
</head>
<body>
<div class="row">
	<div class="col-lg-6">
<form action="?rafif=insert_kategori.php" method="POST" name="input" enctype="multipart/form-data">
<div class="form-group">
<label>Id Kategori :</label>
<input type="text" name="id_kategori" class="form-control" value="<?php echo $hasilkode;?>">
<label>Kategori :</label>
<input type="text" name="kategori" class="form-control" onkeypress="return huruf(event)">
</div>
                <button type="submit" value="simpan" name="input" class="btn btn-default btn-lg">SIMPAN</button> 
				<button type="reset" name="reset" value="Batal" class="btn btn-default btn-lg"> BATAL </button> </td>
				<a href ="?rafif=admin/kategori.php" class="btn btn-success btn-lg">lihat data</a>
</form>
</div>
</div>
</body>
</html>
<?php
	}
	?>