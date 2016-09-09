<?php
include "../modul/kon1.php";

mysql_query("DELETE FROM lokasi WHERE idlokasi='$_GET[id]'");

header("location: ../?link=daftarspbu");
?>