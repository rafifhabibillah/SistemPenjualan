<?php
include('includekoneksi.php');
{
	?>
	<p align="center"><b> Tabel Penjualan </b></p>
	<a href ="?rafif=admin/input_penjualan.php" class="btn btn-warning btn-XS">TAMBAH DATA</a>
<br>
<br>
<div class="row">
	<div class="col-lg-12">
	<div class="table-responsive">
	<table class="table table-bordered table-hover table-stripped">
	<tr>
	<th>NO</th>
	<th>ID PENJUALAN</th>
	<th>TANGGAL PENJUALAN</th>
	<th>NAMA PELANGGAN</th>
	<th>NAMA BARANG</th>
	<th>HARGA BARANG</th>
	<th>JUMLAH BARANG</th>
	<th>TOTAL HARGA</th>
	<th>Action</th>
	</tr>
	<?php
	$no=1;
	$batas = 5;
    $hal = @$_GET['hal'];
    if(empty($hal)) {
    $posisi = 0;
    $hal = 1;
    } else {
    $posisi = ($hal - 1) * $batas;
    }
	$queri="select penjualan.id_penjualan,penjualan.tgl_penjualan,pelanggan.nama_pelanggan,barang.nama_barang,penjualan.harga_barang,
	penjualan.jumlah_barang,penjualan.total_harga from penjualan
	inner join barang on penjualan.id_barang=barang.id_barang
	inner join pelanggan on penjualan.id_pelanggan=pelanggan.id_pelanggan limit $posisi,$batas";
	$hasil=mysqli_query($koneksi,$queri);
	$no = $posisi + 1;
	{
	?>
	<?php while ($data=mysqli_fetch_array($hasil)){ ?>
	
		<tr>
	<th><?php echo $no++;?></th>
	<th><?php echo $data['id_penjualan'];?></th>
	<th><?php echo $data['tgl_penjualan'];?></th>
	<th><?php echo $data['nama_pelanggan'];?></th>
	<th><?php echo $data['nama_barang'];?></th>
	<th><?php echo $data['harga_barang'];?></th>
	<th><?php echo $data['jumlah_barang'];?></th>
	<th><?php echo $data['total_harga'];?></th>
	<th>
	<a href="?rafif=admin/edit_penjualan.php&id_penjualan=<?php echo $data['id_penjualan'];?>" class="btn btn-primary btn-md"><i class="fa fa-edit">edit</i></a>
	<a href="?rafif=admin/hapus_penjualan.php&id_penjualan=<?php echo $data['id_penjualan'];?>" class="btn btn-danger btn-md"><i class="fa fa-trash">Hapus</i></a>
	</th>
	
	</tr>
	<?php 
	}
	}
	?>
	</table>
	<div style="margin-top:10px; float:left;">
            <?php
                $jml = mysqli_num_rows(mysqli_query($koneksi, "select * from penjualan "));
                echo "Jumlah data : <b>".$jml."</b>"; 
            ?>
        </div>
            <div style="margin-top:10px; float:right;">
					 <div>
        <ul class="pagination"> 
			<?php        
            if($hal == 1){ // Jika page adalah page ke 1, maka disable link PREV        
                ?>          
                <li class="disabled"><a href="#">First</a></li>
                <li class="disabled"><a href="#">&laquo;</a></li>
                <?php        
            }else{ // Jika page bukan page ke 1          
                $link_prev = ($hal > 1)? $hal - 1 : 1;        
                ?>          
                <li><a href="?rafif=penjualan.php&hal=1">First</a></li>
                <li><a href="?rafif=penjualan.php&hal=<?php echo $link_prev; ?>">&laquo;</a></li>
            <?php        
            }        
            ?>
				<?php
                $jml_hal = ceil($jml / $batas);
                for($i=1; $i<=$jml_hal; $i++){
                    if($i != $hal){
                        echo "<li><a href='?rafif=penjualan.php&hal=$i'>$i</a></li>";
                    } else{
                        echo "<li><a href='?rafif=penjualan.php&hal=$i'>$i</a></li>";
                    }
                }
                ?>
				
				
				<?php        
            // Jika page sama dengan jumlah page, maka disable link NEXT nya        
            // Artinya page tersebut adalah page terakhir        
            if($hal == $jml_hal){ // Jika page terakhir        
                ?>          
                <li class="disabled"><a href="#">&raquo;</a></li>
                <li class="disabled"><a href="#">Last</a></li>
                <?php        
            }else{ // Jika Bukan page terakhir          
                $link_next = ($hal < $jml_hal)? $hal + 1 : $jml_hal;        
                ?>          
                <li><a href="?rafif=penjualan.php&hal=<?php echo $link_next; ?>">&raquo;</a></li>
            <li><a href="?rafif=penjualan.php&hal=<?php echo $jml_hal; ?>">Last</a></li>
            <?php        
            }        
            ?>  
			</ul>
	</div>
	</div>
	</div>
</div>
</div>
&nbsp;
&nbsp;
	<button onClick="print_c()" class="btn btn-success btn-lg" >Print Document</button>
   
 <script>
		function print_c(){
			window.open("?rafif=print_penjualan.php","_blank");
		}
	</script>
	<div class="col-lg-4">
	<div class="form-group">
	<select onchange="document.location.href=this.options[this.selectedIndex].value;"class="form-control">
<option></option>
<option value="?rafif=tabel_penjualan.php">Tabel Penjualan</a></option>
<option value="?rafif=tampil_per_id.php">Semua Per Id</a></option>
<option value="?rafif=tampil_per_idbarang.php">Semua Per Barang</a></option>
<option value="?rafif=tampil_per_tanggal.php">Tampil Dalam Setahun</a></option>
<option value="?rafif=menu-bulan.php">Bulan Per Pelanggan</a></option>
<option value="?rafif=menu-bulan2.php">Bulan Per Barang</a></option>
</select>
</div>
</div>
	<br>
	<?php
}
?>