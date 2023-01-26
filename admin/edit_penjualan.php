<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                         FORM PENJUALAN
                            
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
$id_penjualan=$_GET['id_penjualan'];
$hasil=mysqli_query($koneksi,"select * from penjualan where id_penjualan='$id_penjualan'");
$data=mysqli_fetch_array($hasil);
	?>
<script>
function sum(){
	var txtFirstNumberValue = document.getElementById('harga_jual').value;
	var txtsecondNumberValue = document.getElementById('jumlah_barang').value;
	var result = parseInt(txtFirstNumberValue)*(txtsecondNumberValue);
	if (!isNaN(result)){
		document.getElementById('total_harga').value=result;
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
<title>Tabel Penjualan</title>
</head>
<body>
<div class="row">
	<div class="col-lg-12">
<form action="?rafif=proses_edit_penjualan.php" method="post" name="input" enctype="multipart/form-data">
<div class="form-group">
<label>Id Penjualan :</label>
<input type="text" size="25" class="form-control" value="<?php echo $data['id_penjualan'];?>" name="id_penjualan">
<label>Tanggal Penjualan :</label>
<input type="text" size="25" class="form-control" value="<?php echo $data['tgl_penjualan'];?>" name="tgl_penjualan"value="<?php echo $tanggal;?>">
<label>Id Pelanggan :</label>
<input type="text" size="25" class="form-control" value="<?php echo $data['id_pelanggan'];?>" name="id_pelanggan">
<label>Id Barang :</label>
<input type="text" size="25" class="form-control" value="<?php echo $data['id_barang'];?>" name="id_barang">
<label>Harga Barang :</label>
<input type="text" size="25" class="form-control" value="<?php echo $data['harga_barang'];?>" name="harga_barang"id="harga_jual" onkeyup="sum();">
<label>Jumlah Barang :</label>
<input type="text" size="25" class="form-control" value="<?php echo $data['jumlah_barang'];?>" name="jumlah_barang"id="jumlah_barang" onkeyup="sum();"onkeypress="return angka(event)">
<label>Total Harga :</label>
<input type="text" size="25" class="form-control" value="<?php echo $data['total_harga'];?>" name="total_harga"id="total_harga">
</div>
                <button type="submit" value="simpan" name="input" class="btn btn-default btn-lg">SIMPAN</button> 
				<button type="reset" name="reset" value="Batal" class="btn btn-default btn-lg"> BATAL </button> </td>
				<a href ="?rafif=admin/penjualan.php" class="btn btn-success btn-lg">lihat data</a>
</form>
</body>
</html>