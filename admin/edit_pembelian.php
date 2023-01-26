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
$id_pembelian=$_GET['id_pembelian'];
$hasil=mysqli_query($koneksi,"select * from pembelian where id_pembelian='$id_pembelian'");
$data=mysqli_fetch_array($hasil);
	?>
<script>
function sum(){
	var txtFirstNumberValue = document.getElementById('harga_beli').value;
	var txtsecondNumberValue = document.getElementById('jumlah_beli').value;
	var result = parseInt(txtFirstNumberValue)*(txtsecondNumberValue);
	if (!isNaN(result)){
		document.getElementById('total').value=result;
	}
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
<title>Tabel Pembelian</title>
</head>
<body>
<div class="row">
	<div class="col-lg-12">
<form action="?rafif=proses_edit_pembelian.php" method="post" name="input" enctype="multipart/form-data">
<div class="form-group">
<label>Id Pembelian :</label>
<input type="text" size="25" class="form-control" value="<?php echo $data['id_pembelian'];?>" name="id_pembelian">
<label>Tanggal Pembelian :</label>
<input type="text" size="25" class="form-control" value="<?php echo $data['tgl_pembelian'];?>" name="tgl_pembelian"value="<?php echo $tanggal;?>">
<label>Id Supplier :</label>
<input type="text" size="25" class="form-control" value="<?php echo $data['id_supplier'];?>" name="id_supplier">
<label>Id Barang :</label>
<input type="text" size="25" class="form-control" value="<?php echo $data['id_barang'];?>" name="id_barang">
<label>Harga Beli :</label>
<input type="text" size="25" class="form-control" value="<?php echo $data['harga_beli'];?>" name="harga_beli" id="harga_beli" onkeyup="sum();">
<label>Jumlah Beli :</label>
<input type="text" size="25" class="form-control" value="<?php echo $data['jumlah_beli'];?>" name="jumlah_beli"id="jumlah_beli" onkeyup="sum();"onkeypress="return angka(event)">
<label>Total :</label>
<input type="text" size="25" class="form-control" value="<?php echo $data['total'];?>" name="total"id="total">
</div>
                <button type="submit" value="simpan" name="input" class="btn btn-default btn-lg">SIMPAN</button> 
				<button type="reset" name="reset" value="Batal" class="btn btn-default btn-lg"> BATAL </button> </td>
				<a href ="?rafif=admin/pembelian.php" class="btn btn-success btn-lg">lihat data</a>
</form>
</body>
</html>