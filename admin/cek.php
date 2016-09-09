<?php
include "modul/kon1.php";

$user 	= $_POST['user'];
$pwd   	= $_POST['pw'];

$hasil  = mysql_query("SELECT * FROM admin WHERE username='$user' AND
						password='$pwd'");
$hitung = mysql_num_rows($hasil);
$data   = mysql_fetch_array($hasil);

if ($hitung > 0){
	session_start();
	$_SESSION['username'] = $data['username'];
	$_SESSION['password'] = $data['pass'];
	$_SESSION['nama'] = $data['nama'];
	
	header('Location:index.php');
}else{
   header("location: ../login.php");
}
?>