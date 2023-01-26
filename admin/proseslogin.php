<?php
include 'includekoneksi.php';
session_start();

$user = $_POST['username'];
$password = md5 $_POST['password'];

$query ="select * from login where username ='$user'";
$tampil = mysql_query($koneksi,$query);
$data=mysqli_fetch_array($tampil);

$_SESSION['fullname'] = $data['fullname'];
if ($user == $data['username'] and $password == $data['password'])
{
	$_SESSION['level']=$data['level'];
	
if ($_SESSION['level'] == "admin") {header('location:admin/index.php');}
else if ($_SESSION['level'] == "operator") {header('location:?rafif=operator/index.php');}
}
else { echo "Username and Password not Correct <a href=?rafif=admin/index.php> login</a>";}
?>