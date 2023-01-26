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
$id_kategori=$_GET['id_kategori'];
$hasil=mysqli_query($koneksi,"select * from kategori where id_kategori='$id_kategori'");
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
	
<html>
<head>
<title>Tabel Kategori</title>
</head>
<body>
<div class="row">
	<div class="col-lg-12">
<form action="?rafif=proses_edit_kategori.php" method="POST" name="input" enctype="multipart/form-data">
<div class ="form-group">
<label>Id Kategori :</label>
<input type="text" size="25" class="form-control" value="<?php echo $data['id_kategori'];?>" name="id_kategori">
<label>Kategori :</label>
<input type="text" size="25" class="form-control" value="<?php echo $data['kategori'];?>" name="kategori"onkeypress="return huruf(event)">
</div>
<button type="submit" value="simpan" name="input" class="btn btn-default btn-lg">SIMPAN</button> 
				<button type="reset" name="reset" class="btn btn-default btn-lg"> BATAL </button>
				<a href ="?rafif=admin/kategori.php" class="btn btn-success btn-lg">lihat data</a>
</form>
</div>
</div>
</body>
</html>