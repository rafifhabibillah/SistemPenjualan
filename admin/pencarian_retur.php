<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                         RETUR BARANG 
                            
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="admin/index.html">Dashboard</a>
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

<script>
function sum() {
      var txtFirstNumberValue = document.getElementById('harga_barang').value;
      var txtSecondNumberValue = document.getElementById('jumlah_retur').value;
      var result = parseInt(txtFirstNumberValue)*parseInt(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('total').value = result;
      }
}
</script>	


		
<?php
include ('../includekoneksi.php');
$tanggal=date("Y-m-d");

$id_retur=$_POST['id_retur'];

$show = mysqli_query($koneksi,"select * from penjualan where id_penjualan='$id_retur'");
$tampil= mysqli_fetch_array($show);
{
?>
<?php
		
		 $carikode= mysqli_query($koneksi, "select max(id_retur) from retur_penjualan");
		 $datakode= mysqli_fetch_array($carikode);
		 if ($datakode){
		  $nilaikode= substr($datakode[0],1);
		  $kode = (int) $nilaikode;
		  $kode = $kode+1;
		  $hasilkode= "R".str_pad($kode, 3, "0", STR_PAD_LEFT);
		  } else {
			$hasilkode="R001";
			}
?>

<div class="row">
	<div class="col-lg-12">
<form method="post" action="?rafif=simpan_retur.php" name ="input" >
<div class ="form-group">
	<label>ID RETUR</label>
	<div class="input-group">
	<div class="input-group-addon">
	<i class="fa fa-fw fa-user"></i>
	</div>
	<input type="text"  name="id_retur"  class="form-control"  value ="<?php echo $hasilkode; ?>">
</div>
</div>

<div class ="form-group">
	<label>TANGGAL</label>
	<div class="input-group">
	<div class="input-group-addon">
	<i class="fa fa-fw fa-newspaper-o"></i>
	</div>
	<input type="date"  name="tgl_retur"  class="form-control" value="<?php echo $tanggal; ?>"  >
</div>
</div>
<div class ="form-group">
	<label>ID PENJUALAN</label>
	<div class="input-group">
	<div class="input-group-addon">
	<i class="fa fa-fw fa-search"></i>
	</div>
	<input type="text"  name="id_penjualan"  class="form-control"  value ="<?php echo $tampil['id_penjualan']; ?>">
</div>	
</div>
<div class ="form-group">
	<label>PELANGGAN</label>
	<div class="input-group">
	<div class="input-group-addon">
	<i class="fa fa-fw fa-user"></i>
	</div>
	<input type="text"  name="id_pelanggan"  class="form-control" readonly  value ="<?php echo $tampil['id_pelanggan']; ?>">
</div>	
</div>
<div class ="form-group">
	<label> BARANG</label>
	<div class="input-group">
	<div class="input-group-addon">
	<i class="fa fa-fw fa-apple"></i>
	</div>
<?php 

	$retur= mysqli_query($koneksi,"select penjualan.id_penjualan,
	penjualan.id_pelanggan,
	penjualan.id_barang,
	barang.nama_barang,
	penjualan.harga_barang
	from penjualan
	inner join barang on penjualan.id_barang=barang.id_barang  where penjualan.id_penjualan='$id_retur'"); 
	$jsArray= "var prdName= new Array();\n";
	echo '<select name="id_barang" class="form-control"  onchange="changeValue(this.value)" >';
	echo '<option>-----------</option>';
	while ($row= MySQLi_fetch_array ($retur)){
		echo '<option value="'. $row['id_barang'] .'">'.$row['nama_barang'].'</option>';
		$jsArray .="prdName ['". $row['id_barang'] ."'] = {jual:'".addslashes($row['harga_barang']) ."'};\n";
		}
		echo'</select>'; 
		?>


</div>
</div>	
	
			
<div class ="form-group">
	<label>HARGA </label>
	<div class="input-group">
	<div class="input-group-addon">
	<i class="fa fa-fw fa-dollar"></i>
	</div>
	<input type="text" id="harga_barang" onkeyup="sum();" name="harga_barang" class="form-control">

	<script type="text/javascript">
	<?php echo $jsArray; ?>
	function changeValue(id){
		document.getElementById('harga_barang').value=prdName[id].jual;
	};
	</script>
</div>
</div>				
<div class ="form-group">
	<label>JUMLAH</label>
	<div class="input-group">
	<div class="input-group-addon">
	<i class="fa fa-fw fa-dollar"></i>
	</div>
	<input type="text" required	name="jumlah_retur" id="jumlah_retur" onkeyup="sum();" class="form-control" onkeypress="return hanyaAngka(event)">			
</div>
</div>
<script>
		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
	</script>			
<div class ="form-group">
	<label>TOTAL</label>
	<div class="input-group">
	<div class="input-group-addon">
	<i class="fa fa-fw fa-dollar"></i>
	</div>
	<input type ="text" name="total_retur" id="total"     class="form-control">
</div>
</div>	
                <button type="submit" value="simpan" name="input" class="btn btn-default btn-lg">SUBMIT</button> 
			

</form>
		

</div>
</div>

<?php
}
?>


</body>
</html>
