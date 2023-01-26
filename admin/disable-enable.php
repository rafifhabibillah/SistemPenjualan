<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><b>
							FORM BELI LAGI
                        </b></h1>
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
include'includekoneksi.php';
$id_penjualan = $_GET['id'];
$hasil = mysqli_query ($koneksi,"select * from penjualan where id_penjualan='$id_penjualan'");
$data = mysqli_fetch_array ($hasil);
$tanggal_penjualan = array('');
// membuat function untuk set aktif radio button
function active_radio_button($value,$input){
// apabilan value dari radio sama dengan yang di input
    $result =  $value==$input?'checked':'';
    return $result;
}

?>
<script>
function sum() {
      var txtFirstNumberValue = document.getElementById('harga_jual').value;
      var txtSecondNumberValue = document.getElementById('jumlah_barang').value;
      var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('total_harga').value = result;
      }
}
</script>

<html>
<head><title>PENJUALAN</title>
</head>
<body>
<div class="row">
	<div class="col-lg-12">
<form action="?rafif=simpan_penjualan.php" method="post" name="Input" enctype="multipart/form-data">
<input type="hidden" value="<?php echo $id_penjualan['id_penjualan'];?>" name="id_penjualan">
<div class ="form-group">
<label>Id Penjualan :</label>
<input type="text" value="<?php echo $data['id_penjualan'];?>" name="id_penjualan" readonly class="form-control">
<label>Tanggal Penjualan :</label>
<input type="date" value="<?php echo $data['tgl_penjualan'];?>" name="tgl_penjualan" readonly class="form-control">
<label>Id Pelanggan :</label>
<input type="text"value="<?php echo $data['id_pelanggan'];?>" name="id_pelanggan" readonly class="form-control">
<label>Id Barang :</label>
			<?php 
			$result= mysqli_query($koneksi,"select * from barang"); 
			$jsArray= "var prdName= new Array();\n";
			echo '<select name="id_barang" onchange="changeValue(this.value)" class="form-control">';
			echo '<option>-----------</option>';
			while ($row= MySQLi_fetch_array ($result)){
				echo '<option value="'. $row['id_barang'] .'">'.$row['nama_barang'].'</option>';
				$jsArray .="prdName ['". $row['id_barang'] ."'] = {jual:'".
				addslashes($row['harga_jual']) ."'};\n";
				}
				echo'</select>';
			?>
<label>Harga Barang :</label>
<input type="text" id="harga_jual" onkeyup="sum()" name="harga_barang" class="form-control">
<script type="text/javascript">
	<?php echo $jsArray; ?>
	function changeValue(id){
		document.getElementById('harga_jual').value=prdName[id].jual;
	};
</script>
<label>Jumlah Barang :</label>
<input type="text"  id="jumlah_barang" onkeyup="sum()" name="jumlah_barang" class="form-control">
<label>total Harga :</label>
<input type="text"id="total_harga" name="total_harga" class="form-control">
</div>
			<a href='?rafif=admin/keranjang-belanja.php'> <input type="submit" name="input" value="simpan"></a>
			<a href='?rafif=admin/input_penjualan.php'> <input type="submit" name="input" value="kembali"></a>
      	
</form>
</div>
</div>
</body>
</html>