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
