<?php
include('includekoneksi.php');
{
	?>
	<p align="center"><b> Tabel Pembelian </b></p>
	<a href ="?rafif=admin/input_pembelian.php" class="btn btn-warning btn-XS">TAMBAH DATA</a>
<br>
<br>
<div class="row">
	<div class="col-lg-12">
	<div class="table-responsive">
	<table class="table table-bordered table-hover table-stripped">
	<tr>
	<th>NO</th>
	<th>ID PEMBELIAN</th>
	<th>TANGGAL PEMBELIAN</th>
	<th>NAMA SUPPLIER</th>
	<th>NAMA BARANG</th>
	<th>HARGA BELI</th>
	<th>JUMLAH BELI</th>
	<th>TOTAL</th>
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
	$queri="select pembelian.id_pembelian,pembelian.tgl_pembelian,supplier.nama_supplier,barang.nama_barang,barang.harga_beli,
	pembelian.jumlah_beli,pembelian.total from pembelian
	inner join barang on pembelian.id_barang=barang.id_barang
	inner join supplier on pembelian.id_supplier=supplier.id_supplier limit $posisi,$batas";
	$hasil=mysqli_query($koneksi,$queri);
	$no = $posisi + 1;
	{
		?>
	<?php while ($data=mysqli_fetch_array($hasil)){ ?>
	
		<tr>
	<th><?php echo $no++;?></th>
	<th><?php echo $data['id_pembelian'];?></th>
	<th><?php echo $data['tgl_pembelian'];?></th>
	<th><?php echo $data['nama_supplier'];?></th>
	<th><?php echo $data['nama_barang'];?></th>
	<th><?php echo $data['harga_beli'];?></th>
	<th><?php echo $data['jumlah_beli'];?></th>
	<th><?php echo $data['total'];?></th>
	<th>
	<a href="?rafif=admin/edit_pembelian.php&id_pembelian=<?php echo $data['id_pembelian'];?>" class="btn btn-primary btn-md"><i class="fa fa-edit">edit</i></a>
	<a href="?rafif=admin/hapus_pembelian.php&id_pembelian=<?php echo $data['id_pembelian'];?>" class="btn btn-danger btn-md"><i class="fa fa-trash">Hapus</i></a>
	</th>
	
	</tr>
	<?php 
	}
	}
	?>
	</table>
	<div style="margin-top:10px; float:left;">
            <?php
                $jml = mysqli_num_rows(mysqli_query($koneksi, "select * from pembelian "));
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
                <li><a href="?rafif=pembelian.php&hal=1">First</a></li>
                <li><a href="?rafif=pembelian.php&hal=<?php echo $link_prev; ?>">&laquo;</a></li>
            <?php        
            }        
            ?>
				<?php
                $jml_hal = ceil($jml / $batas);
                for($i=1; $i<=$jml_hal; $i++){
                    if($i != $hal){
                        echo "<li><a href='?rafif=pembelian.php&hal=$i'>$i</a></li>";
                    } else{
                        echo "<li><a href='?rafif=pembelian.php&hal=$i'>$i</a></li>";
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
                <li><a href="?rafif=pembelian.php&hal=<?php echo $link_next; ?>">&raquo;</a></li>
            <li><a href="?rafif=pembelian.php&hal=<?php echo $jml_hal; ?>">Last</a></li>
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
	<button onClick="print_d()" class="btn btn-success btn-lg" >Print Document</button>
   
 <script>
		function print_d(){
			window.open("?rafif=print_pembelian.php","_blank");
		}
	</script>
	<?php
}
?>