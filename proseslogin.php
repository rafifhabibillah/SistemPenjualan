<?php
include 'includekoneksi.php';
session_start();

$user = $_POST['username'];
$password = md5($_POST['password']);

$query ="select * from login where username ='$user'";
$tampil = mysqli_query($koneksi,$query);
$data=mysqli_fetch_array($tampil);

$_SESSION['fullname'] = $data['fullname'];
if ($user == $data['username'] and $password == $data['password'])
{
	$_SESSION['level']= $data['level'];
	
if ($_SESSION['level'] == "admin") {header('location:admin/index.php?rafif=isi_index.php');}
else if ($_SESSION['level'] == "operator") {header('location:operator/index.php');}
}
else { echo "Username and Password not Correct <a href=index.php> login</a>";}
?>