<?php
include('includekoneksi.php');
{
	?>
	
<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Selamat Datang <small>para USER</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- Page Heading -->               
				<div class="row">
	<div class="col-lg-12">
	<div id="diagram"></div>
</div>
</div>
<script src="highcharts/highcharts.js"></script>
<script src="highcharts/exporting.js"></script>

<!DOCTYPE html>
<html>
<meta charset="UTF-5">
<meta http-equiv="content-type" content="text/html; charset=utf-5" />
<head>
<title>Grafik Penduduk Indonesia</title>
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="js/highcharts.js" type="text/javascript"></script>
<script src="js/exporting.js" type="text/javascript"></script>
<script type="text/javascript">
	var chart1; // globally available
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },   
         title: {
            text: 'Data Penjualan '
         },
         xAxis: {
            categories: ['Id Barang']
         },
         yAxis: {
            title: {
               text: 'Jumlah Penjualan'
            }
         },
              series:             
            [
<?php      
// file koneksi php
$server = "localhost";
$username = "root";
$password = "";
$database = "pkl";
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
$sql   = "SELECT * from penjualan "; // file untuk mengakses ke tabel database
$query = mysql_query( $sql );         
	$sql_jumlah   = "SELECT id_barang,count(jumlah_barang) as Jumlah
from penjualan
GROUP BY id_barang";
	$hasil = mysqli_query($koneksi,$sql_jumlah); // fungsi utk sql
	while ($data=mysqli_fetch_array($hasil)){
	   $jumlahx = $data['Jumlah'];                 
	               
	  
	  ?>
	  {
		  name: '<?php echo $data['id_barang']; ?>',
		  data: [<?php echo $jumlahx; ?>]
	  },
	  <?php } ?>
]
});
});	
</script>
</head>
<body>
<!-- fungsi yang di tampilkan dibrowser  -->
<div id="container" style="min-width: 200px; height: 400px; margin: 0 auto"></div>

</body>
</html>
<div class="row">
	<div class="col-lg-12">
	<div id="diagram2"></div>
</div>
</div>
<script src="highcharts/highcharts.js"></script>
<script src="highcharts/exporting.js"></script>

<!DOCTYPE html>
<html>
<meta charset="UTF-5">
<meta http-equiv="content-type" content="text/html; charset=utf-5" />
<head>
<title>Grafik Penduduk Indonesia</title>
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="js/highcharts.js" type="text/javascript"></script>
<script src="js/exporting.js" type="text/javascript"></script>
<script type="text/javascript">
	var chart2; // globally available
$(document).ready(function() {
      chart2 = new Highcharts.Chart({
         chart: {
            renderTo: 'container2',
            type: 'column'
         },   
         title: {
            text: 'Data Penjualan '
         },
         xAxis: {
            categories: ['Bulan']
         },
         yAxis: {
            title: {
               text: 'Jumlah Barang'
            }
         },
              series:             
            [
<?php      
// file koneksi php
$server2 = "localhost";
$username2 = "root";
$password2 = "";
$database2 = "pkl";
mysql_connect($server2,$username2,$password2) or die("Koneksi gagal");
mysql_select_db($database2) or die("Database tidak bisa dibuka");
?>
<?php
$bulan2=array(
	'01'=>'januari',
	'02'=>'februari',
	'03'=>'maret',
	'04'=>'april',
	'05'=>'mei',
	'06'=>'juni',
	'07'=>'juli',
	'08'=>'agustus',
	'09'=>'september',
	'10'=>'oktober',
	'11'=>'november',
	'12'=>'desember');
$sql2=mysqli_query($koneksi,"select * from penjualan");
$data2=mysqli_fetch_array ($sql2);
$tgl_penjualan2=$data2['tgl_penjualan'];
	$sql_jumlah2   = "SELECT tgl_penjualan,count(*)as jumlah_barang
from penjualan
GROUP BY month(tgl_penjualan)";
	$hasil2 = mysqli_query($koneksi,$sql_jumlah2); // fungsi utk sql
	while ($data2=mysqli_fetch_array($hasil2)){
		$date2=$data2['tgl_penjualan'];
  $tampil_bulan2 =$bulan2[date('m',strtotime($date2))];
	   $jumlahx2 = $data2['jumlah_barang'];                 
	               
	  
	  ?>
	  {
		  name: '<?php echo $tampil_bulan2; ?>',
		  data: [<?php echo $jumlahx2; ?>]
	  },
	  <?php } ?>
]
});
});	
</script>
</head>
<body>
<!-- fungsi yang di tampilkan dibrowser  -->
<div id="container2" style="min-width: 200px; height: 400px; margin: 0 auto"></div>

</body>
</html>

				
	<?php
}
?>