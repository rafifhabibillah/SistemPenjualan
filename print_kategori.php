<?php
	include 'includekoneksi.php';{
	
?>
<html>
<head>
	<title>Data kategori</title>
    <link href="style_print.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div class="row">
<div class="col-lg-12">
<div class="table-responsive">
	<table class="table table-bordered table-hover table-striped" border="1"width="90%" style="border-collapse:collapse;" align="center">
    	<tr>
		<th>ID KATEGORI</th>
<th>KATEGORI</th>

        </tr>
		<?php
		$queri="select * from kategori";//menampilkan semua data dari table device
$data = mysqli_query ($koneksi,$queri); //funggsi untuk sql
?>
        <?php while($hasil = mysqli_fetch_array($data)){ ?>
        <tr id="rowHover">
        	
            <th><?php echo $hasil['id_kategori'] ?></th>
            <th><?php echo $hasil['kategori'] ?></th>
			
        </tr>
        <?php } ?>
		</div>
</div>
</div>
    </table>
    <script>
		window.load = print_d();
		function print_d(){
			window.print();
		}
	</script>
	<?php
}
?>
</body>
</html>