<html>
<head>
	<title>Coba Casading Content Style</title>
		<link href="style/style.css"rel="stylesheet"type="text/css"media="screen"/>

		</head>
<body bgcolor="black">
<div id="container">
<div id="wrapper">
<div id="header"></div>
<hr color="white">
<div id="content">
<div id="artikel">
<?php
include('content.php');
?></div>
<div id="sidebar">
<hr size="4" color="yellow" align="right">
<p align="right"><font face="Arial Black"size="6" color="white"><u>&nbsp;MENU&nbsp;</u></font>
<ul><li>INPUT<ul>
<li><a href='?rafif=input.php'>BARANG</a></li>
<li><a href='?rafif=input_kategori.php'>KATEGORI</a></li>
<li><a href='?rafif=input_pelanggan.php'>PELANGGAN</a></li>
<li><a href='?rafif=input_penjualan.php'>PENJUALAN</a></li></ul>
</li>
</ul>
<ul><li>TABEL<ul>
<li><a href='?rafif=tampil.php'>BARANG</a></li>
<li><a href='?rafif=kategori.php'>KATEGORI</a></li>
<li><a href='?rafif=pelanggan.php'>PELANGGAN</a></li>
<li><a href='?rafif=tabel_penjualan.php'>PENJUALAN</a></li></ul>
</li>
</ul>

</div>
<div style="clear:both"></div> 
</div>
<hr color="white">
<br>
<div id="footer"></div>
 </div>
 </div>
</body>
</html>