<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i>
                         Menu Pembelian
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
	<div class="col-lg-12">
	<div class="form-group">
<select onchange="document.location.href=this.options[this.selectedIndex].value;"class="form-control">
<option></option>
<option value="?rafif=input_pembelian.php">Lama</a></option>
<option value="?rafif=input_pembelian_baru.php">baru</a></option>
</select>
</div>
	<?php
}
?>