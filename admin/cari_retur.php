<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i>
                         Search Retur 
                            </i>
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

            </div>
            <!-- /.container-fluid -->

        </div>
<?php
include('includekoneksi.php');
{
	?>

	<div class="row">
	<div class="col-lg-6">
<form action="?rafif=pencarian_retur.php" method="POST" name="input" enctype="multipart/form-data">
	<label>PENCARIAN</label>
	<input type="text" name="id_retur" class="form-control">

<br><button type="submit">search</button>	
	
	
	<?php
}
?>