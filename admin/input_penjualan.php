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
	var txtFirstNumberValue = document.getElementById('harga_jual').value;
	var txtsecondNumberValue = document.getElementById('jumlah_barang').value;
	var result = parseInt(txtFirstNumberValue)*(txtsecondNumberValue);
	if (!isNaN(result)){
		document.getElementById('total_harga').value=result;
	}
}
</script>
<?php
		$carikode=mysqli_query($koneksi,"select max(id_penjualan) from penjualan");
		$datakode=mysqli_fetch_array($carikode);
		if ($datakode){
			$nilaikode=substr($datakode[0],1);
			$kode =(int) $nilaikode;
			$kode = $kode+1;
			$hasilkode = "A".str_pad($kode,3,"0",STR_PAD_LEFT);
		} else {
			$hasilkode="D001";
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
<form action="?rafif=insert_penjualan.php" method="post" name="input" enctype="multipart/form-data">
<div class ="form-group">
	<label>Id Penjualan :</label>
	<input type="text" name="id_penjualan" class="form-control" value="<?php echo $hasilkode;?>">
<label>Tanggal Penjualan :</label>
<input type="date" size="20" name="tgl_penjualan" class="form-control" value="<?php echo $tanggal;?>">
<label>Id Pelanggan :</label>
<select required name="id_pelanggan" type="text" class="form-control">
<option value="">Pilih salah satu</option>
<?php
$queri="select * from pelanggan";
$hasil=mysqli_query($koneksi,$queri);
while ($data=mysqli_fetch_array($hasil)){
	?>
	<option value="<?php echo $data['id_pelanggan'];?>">
	<?php echo $data['nama_pelanggan'];?>
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
	addslashes($row['harga_jual'])."'};\n";
	}
	echo'</select>';
	?>
	</div>
	<div class="form-group">
<label>Harga Barang :</label>
<input type="text" id="harga_jual" class="form-control" name="harga_barang" onkeyup="sum();"required">
<script type="text/javascript">
<?php echo $jsArray;?>
	function changeValue(id){
		document.getElementById('harga_jual').value=prdName[id].jual;
	};
	</script>
	</div>
	<div class="form-group">
<label>Jumlah Barang :</label>
<input type="text" name="jumlah_barang" onkeyup="sum();" onkeypress="return angka(event)" id="jumlah_barang" class="form-control">
<label>Total Harga :</label>
<input type="text"name="total_harga" class="form-control" id="total_harga">
</div><br>
                <button type="submit" value="simpan" name="input" class="btn btn-default btn-lg">SIMPAN</button> 
				<button type="reset" name="reset" value="Batal" class="btn btn-default btn-lg"> BATAL </button> </td>
				<a href ="?rafif=admin/barang.php" class="btn btn-success btn-lg">lihat data</a>
</form>
</body>
</html>
<?php
	}
	?>