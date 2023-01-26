<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><b>
							FORM KULAKAN LAGI
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
$id_pembelian = $_GET['id'];
$hasil = mysqli_query ($koneksi,"select * from pembelian where id_pembelian='$id_pembelian'");
$data = mysqli_fetch_array ($hasil);
$tanggal_penjualan = array('');

?>
<script>
function sum() {
      var txtFirstNumberValue = document.getElementById('harga_beli').value;
      var txtSecondNumberValue = document.getElementById('jumlah_beli').value;
      var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('total').value = result;
      }
}
</script>

<html>
<head><title>PEMBELIAN</title>
</head>
<body>
<div class="row">
	<div class="col-lg-12">
<form action="?rafif=simpan_pembelian.php" method="post" name="Input" enctype="multipart/form-data">
<input type="hidden" value="<?php echo $id_pembelian['id_pembelian'];?>" name="id_pembelian">
<div class ="form-group">
<label>Id Pembelian :</label>
<input type="text" value="<?php echo $data['id_pembelian'];?>" name="id_pembelian" readonly class="form-control">
<label>Tanggal Pembelian :</label>
<input type="date" value="<?php echo $data['tgl_pembelian'];?>" name="tgl_pembelian" readonly class="form-control">
<label>Id Supplier :</label>
<input type="text"value="<?php echo $data['id_supplier'];?>" name="id_supplier" readonly class="form-control">
<label>Id Barang :</label>
			<?php 
			$result= mysqli_query($koneksi,"select * from barang"); 
			$jsArray= "var prdName= new Array();\n";
			echo '<select name="id_barang" onchange="changeValue(this.value)" class="form-control">';
			echo '<option>-----------</option>';
			while ($row= MySQLi_fetch_array ($result)){
				echo '<option value="'. $row['id_barang'] .'">'.$row['nama_barang'].'</option>';
				$jsArray .="prdName ['". $row['id_barang'] ."'] = {beli:'".
				addslashes($row['harga_beli']) ."'};\n";
				}
				echo'</select>';
			?>
<label>Harga Barang :</label>
<input type="text" id="harga_beli" onkeyup="sum()" name="harga_beli" class="form-control">
<script type="text/javascript">
	<?php echo $jsArray; ?>
	function changeValue(id){
		document.getElementById('harga_beli').value=prdName[id].beli;
	};
</script>
<label>Jumlah Beli :</label>
<input type="text"  id="jumlah_beli" onkeyup="sum()" name="jumlah_beli" class="form-control">
<label>total :</label>
<input type="text"id="total" name="total" class="form-control">
</div>
			<a href='?rafif=admin/keranjang-beli.php'> <input type="submit" name="input" value="simpan"></a>
			<a href='?rafif=admin/input_pembelian.php'> <input type="submit" name="input" value="kembali"></a>
      	
</form>
</div>
</div>
</body>
</html>