<!DOCTYPE html>
<html lang="en">

<head>

<?php
session_start();
include('includekoneksi.php');
if (!($_SESSION['level']=="admin")) {
    header('Location:../admin/index.php');
}
?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Desaign Online Shop by : Muhammad Rafif Habibillah</title>

    <!-- Bootstrap Core CSS -->
    <link href="../artikel/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../artikel/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../artikel/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../artikel/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="?rafif=admin/isi_index.php"><big><b>Crypton Mart</b></big></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <li><a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a></li>
                </li>
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="../logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="?rafif=admin/isi_index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    
					<li><a href="javascript:;" data-toggle="collapse" data-target="#Barang"><i class="fa fa-fw fa-glass"></i> Barang <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="Barang" class="collapse">
                            <li>
                                <a href="?rafif=admin/input.php"><i class="fa fa-pencil"></i> Input Barang</a>
                            </li>
							<li>
                                <a href="?rafif=admin/tampil.php"><i class="fa fa-fw fa-newspaper-o"></i> Tabel Barang</a>
                            </li>
					</ul></li>		
                    <li><a href="javascript:;" data-toggle="collapse" data-target="#Kategori"><i class="fa fa-fw fa-magic"></i> Kategori Barang <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="Kategori" class="collapse">
						<li>
                                <a href="?rafif=admin/input_kategori.php"><i class="fa fa-pencil"></i> Input Kategori</a>
                            </li>
						<li>
                                <a href="?rafif=admin/kategori.php"><i class="fa fa-fw fa-newspaper-o"></i> Tabel Kategori</a>
                            </li>
					</ul></li>
                    <li><a href="javascript:;" data-toggle="collapse" data-target="#Pelanggan"><i class="fa fa-user"></i>  &nbsp;&nbsp;Pelanggan <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="Pelanggan" class="collapse">
						<li>
                                <a href="?rafif=admin/input_pelanggan.php"><i class="fa fa-pencil"></i> Input Pelanggan</a>
                            </li>
						<li>
                                <a href="?rafif=admin/pelanggan.php"><i class="fa fa-fw fa-newspaper-o"></i> Tabel Pelanggan</a>
                            </li>
					</ul></li>
					<li><a href="javascript:;" data-toggle="collapse" data-target="#Penjualan"><i class="fa fa-fw fa-fighter-jet"></i> Penjualan Barang <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="Penjualan" class="collapse">
						<li>
                                <a href="?rafif=admin/input_penjualan.php"><i class="fa fa-pencil"></i> Input Penjualan</a>
                            </li>
						<li>
                                <a href="?rafif=admin/penjualan.php"><i class="fa fa-fw fa-newspaper-o"></i> Tabel Penjualan</a>
                            </li>
					</ul></li>
					<li><a href="javascript:;" data-toggle="collapse" data-target="#Pembelian"><i class="fa fa-fw fa-laptop"></i> Pembelian Barang <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="Pembelian" class="collapse">
						<li>
                                <a href="?rafif=admin/menu_pembelian.php"><i class="fa fa-pencil"></i> Input Pembelian</a>
                            </li>
						<li>
                                <a href="?rafif=admin/tabel_pembelian.php"><i class="fa fa-fw fa-newspaper-o"></i> Tabel Pembelian</a>
                            </li>
					</ul></li>
					<li><a href="javascript:;" data-toggle="collapse" data-target="#Supplier"><i class="fa fa-fw fa-plane"></i> Supplier Barang <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="Supplier" class="collapse">
						<li>
                                <a href="?rafif=admin/input_supplier.php"><i class="fa fa-pencil"></i> Input Supplier</a>
                            </li>
						<li>
                                <a href="?rafif=admin/supplier.php"><i class="fa fa-fw fa-newspaper-o"></i> Tabel Supplier</a>
                            </li>
                        </ul></li>
					<li><a href="?rafif=admin/cari_retur.php"><i class="fa fa-fw fa-align-left"></i> Retur Penjualan </a>
					</li>
                </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
				<div class="row">
				<?php
					include('../content.php');
				?>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../artikel/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../artikel/js/bootstrap.min.js"></script>

	</body>

</html>
