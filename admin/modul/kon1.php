<?php
	$db_server		= "localhost";
	$db_uname		= "root";
	$db_passwd		= "";
	$db_database	= "dbspbu";
	mysql_connect($db_server,$db_uname,$db_passwd) or die("Server Connection Error");
	mysql_select_db($db_database) or die("Database Connection Error");
?>