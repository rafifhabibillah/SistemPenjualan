<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i>
                         Search Bulan Penjualan 
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
	<div class="col-lg-3">
	<div class="form-group">
	<form action="?rafif=admin/tampilbulan2.php" method="post">
	<a href ="?rafif=admin/penjualan.php" class="btn btn-info btn-XS">Kembali</a>
	<br>
	<br>
	<select class="form-control" name="bulan">
<option></option>
<option value="01">Januari</a></option>
<option value="02">Februari</a></option>
<option value="03">Maret</a></option>
<option value="04">April</a></option>
<option value="05">Mei</a></option>
<option value="06">Juni</a></option>
<option value="07">Juli</a></option>
<option value="08">Agustus</a></option>
<option value="09">September</a></option>
<option value="10">Oktober</a></option>
<option value="11">November</a></option>
<option value="12">Desember</a></option>
	</select>
<button type="submit" class="btn btn-default btn-m">search<span class="glyphicon glyphicon-search"></span></button>
</form>
</div>
	<?php
}
?>