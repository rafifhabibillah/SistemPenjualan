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
include ('includekoneksi.php');
$tanggal=date("Y-m-d");
{ 
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
<?php
		$carikode=mysqli_query($koneksi,"select max(id_pembelian) from pembelian");
		$datakode=mysqli_fetch_array($carikode);
		if ($datakode){
			$nilaikode=substr($datakode[0],1);
			$kode =(int) $nilaikode;
			$kode = $kode+1;
			$hasilkode = "B".str_pad($kode,3,"0",STR_PAD_LEFT);
		} else {
			$hasilkode="B001";
		}
	?>
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
<form action="?rafif=insert_pembelian.php" method="post" name="input" enctype="multipart/form-data">
<div class ="form-group">
	<label>Id Pembelian :</label>
	<input type="text" name="id_pembelian" class="form-control" value="<?php echo $hasilkode;?>">
<label>Tanggal Pembelian :</label>
<input type="date" size="20" name="tgl_pembelian" class="form-control" value="<?php echo $tanggal;?>">
<label>Supplier :</label>
<select required name="id_supplier" type="text" class="form-control">
<option value="">Pilih salah satu</option>
<?php
$queri="select * from supplier";
$hasil=mysqli_query($koneksi,$queri);
while ($data=mysqli_fetch_array($hasil)){
	?>
	<option value="<?php echo $data['id_supplier'];?>">
	<?php echo $data['nama_supplier'];?>
	</option>
	<?php
	}
	?>
	</select>
<label>Id Barang :</label>
<?php
$result=mysqli_query($koneksi,"select * from barang");
$jsArray="var prdName= new Array();\n";
echo '<select name="id_barang" class="form-control" onchange="changeValue(this.value)">';
echo '<option>------------</option>';
while ($row=mysqli_fetch_array($result)){
	echo '<option value="'.$row['id_barang'].'">'.$row['nama_barang'].'</option>';
	$jsArray.="prdName['".$row['id_barang']."']={jual:'".
	addslashes($row['harga_beli'])."'};\n";
	}
	echo'</select>';
	?>
	</div>
	<div class="form-group">
<label>Harga Bali :</label>
<input type="text" id="harga_beli" class="form-control" name="harga_beli" onkeyup="sum();"required">
<script type="text/javascript">
<?php echo $jsArray;?>
	function changeValue(id){
		document.getElementById('harga_beli').value=prdName[id].jual;
	};
	</script>
	</div>
	<div class="form-group">
<label>Jumlah Beli :</label>
<input type="text" name="jumlah_beli" onkeyup="sum();" onkeypress="return angka(event)" id="jumlah_beli" class="form-control">
<label>Total Harga :</label>
<input type="text"name="total" class="form-control" id="total">
</div><br>
                <button type="submit" value="simpan" name="input" class="btn btn-default btn-lg">SIMPAN</button> 
				<button type="reset" name="reset" value="Batal" class="btn btn-default btn-lg"> BATAL </button> </td>
				<a href ="?rafif=admin/pembelian.php" class="btn btn-success btn-lg">lihat data</a>
</form>
</body>
</html>
<?php
	}
	?>