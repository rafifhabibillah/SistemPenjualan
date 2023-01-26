<html>
<head>
	<title>form LOGIN </title>
	<link href="style/style.css"rel="stylesheet"type="text/css"media="screen"/>
	</head>
<body>
<?php
include 'includekoneksi.php';
	error_reporting(0);
	session_start();
if ($_SESSION['level'] == "admin") 
{ header('location:admin/index.php');
}
else if ($_SESSION['level'] == "operator") 
{ header('location:operator/index.php');
}
?>

	<form action="proseslogin.php" method="post" name="input">
	<table>
	
	<td colspan="2"><h2>Login Disini</h2></td>
	</tr>
	<tr>
	<td>username</td>
	<td><input type="text" name="username" placeholder="username"></td>
	</tr>
	<tr>
	<td>Password</td>
	<td><input type="password" name="password" placeholder="password"></td>
	</tr>
	<tr>
	<td>&nbsp;</td>
	<td><input type="submit"name="Login"value="Login">
		<input type="reset"name="reset"value="Reset"></td>
	</tr>
	</table>
	</form>
	</body>
	</html>