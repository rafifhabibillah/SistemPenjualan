<?php
include('includekoneksi.php');
{
	?>
	
<p align="center"><b> TABEL KATEGORI </b></p>
<a href ="?rafif=input_kategori.php" class="btn btn-warning btn-XS">TAMBAH DATA</a>
<br>
<br>
<div class="row">
	<div class="col-lg-12">
	<div class="table-responsive">
<table class="table table-bordered table-hover table-stripped">
	<tr>
	<th>NO</th>
	<th>ID KATEGORI</th>
	<th>KATEGORI</th>
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
	$queri="select * from kategori limit $posisi,$batas";
	$hasil=mysqli_query($koneksi,$queri);
	$no = $posisi + 1;
	{
	?>
	<?php while ($data=mysqli_fetch_array($hasil)){
		?>
	<tr>
	<th><?php echo $no++;?></th>
	<th><?php echo $data['id_kategori'];?></th>
	<th><?php echo $data['kategori'];?></th>
	<th>
	<a href="?rafif=admin/edit_kategori.php&id_kategori=<?php echo $data['id_barang']; ?>"  class="btn btn-primary btn-md"><i class="fa fa-edit"></i> Edit</a>
    <a href="?rafif=admin/hapus_kategori.php&id_kategori=<?php echo $data['id_barang']; ?>" class="btn btn-danger btn-md"><i class="fa fa-trash"></i> Hapus</a>
	</tr>
	<?php
	}
	}
	?>
	</table>
	<div style="margin-top:10px; float:left;">
            <?php
                $jml = mysqli_num_rows(mysqli_query($koneksi, "select * from kategori "));
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
                <li><a href="?rafif=kategori.php&hal=1">First</a></li>
                <li><a href="?rafif=kategori.php&hal=<?php echo $link_prev; ?>">&laquo;</a></li>
            <?php        
            }        
            ?>
				<?php
                $jml_hal = ceil($jml / $batas);
                for($i=1; $i<=$jml_hal; $i++){
                    if($i != $hal){
                        echo "<li><a href='?rafif=kategori.php&hal=$i'>$i</a></li>";
                    } else{
                        echo "<li><a href='?rafif=kategori.php&hal=$i'>$i</a></li>";
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
                <li><a href="?rafif=kategori.php&hal=<?php echo $link_next; ?>">&raquo;</a></li>
            <li><a href="?rafif=kategori.php&hal=<?php echo $jml_hal; ?>">Last</a></li>
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
			window.open("?rafif=print_kategori.php","_blank");
		}
	</script>
	<?php
}
?>