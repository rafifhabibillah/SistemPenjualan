<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                         Grafik <small>per <b>ID</b> </small>
                            
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
<?php
	include('includekoneksi.php');
	if(isset($_GET['get'])){
		$bulan=$_GET['get'];
		echo "<center><br>Bulan :".$bulan."</br></center>";
	}
	?>
<title>Grafik Penduduk Indonesia</title>
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="js/highcharts.js" type="text/javascript"></script>
<script src="js/exporting.js" type="text/javascript"></script>
<script type="text/javascript">
	var chart1; // globally available
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container4',
            type: 'column'
         },   
         title: {
            text: 'Data Penjualan barang PerBulanan'
         },
         xAxis: {
            categories: ['Id Barang']
         },
         yAxis: {
            title: {
               text: 'Jumlah barang'
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
$bulan=$_GET['get'];       
	$sql_jumlah   = "SELECT id_pelanggan,sum(jumlah_barang) as Jumlah
from penjualan
WHERE month(tgl_penjualan)='$bulan'
GROUP BY id_pelanggan";
	$hasil = mysqli_query($koneksi,$sql_jumlah); // fungsi utk sql
	while ($data=mysqli_fetch_array($hasil)){
	   $jumlahx = $data['Jumlah'];                 
	               
	  
	  ?>
	  {
		  name: '<?php echo $data['id_pelanggan']; ?>',
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
<div id="container4" style="min-width: 200px; height: 400px; margin: 0 auto"></div>

</body>
</html>
