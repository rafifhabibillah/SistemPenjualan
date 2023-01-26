<?php
include('includekoneksi.php');
{
	?>
	
<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small>Selamat Datang</small> &nbsp;<big><b><?php echo $_SESSION['fullname'];?></b></big>
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
				<section class="content">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> Grafik Per ID Barang</h3>
                            </div>
                            <div class="panel-body">
                                <div id="chart1"></div>
                                <div class="text-right">
                                    <?php
					include_once('diagram.php');
				?>

                                </div>
                            </div>
                        </div>
                    </div>
					</section>
			
				<section class="content">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> Grafik Bulan dalam Setahun </h3>
                            </div>
                            <div class="panel-body">
                                <div id="chart2"></div>
                                <div class="text-left">
								<?php
								
							include_once('diagram2.php');
							?>
                                </div>
                            </div>
                        </div>
                    </div>
			</section>
			<section class="content">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> Grafik Per ID Pelanggan </h3>
                            </div>
                            <div class="panel-body">
                                <div id="chart1"></div>
                                <div class="text-right">
                                    <?php
					include_once('diagramcoba.php');
				?>

                                </div>
                            </div>
                        </div>
                    </div>
					</section>					
			</div>
				
	<?php
}
?>