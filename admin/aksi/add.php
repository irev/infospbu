
<?php 
include "../modul/kon.php";

 $nama = $_POST["nama"];
     $oil = $_POST["oil"];
     $fasilitas = $_POST["fasilitas"];
     $alamat = $_POST["alamat"];
$lat = $_POST["lat"];
$lng = $_POST["lng"];

	$fileName = $_FILES['gambar']['name'];



	

$simpan=mysql_query("INSERT INTO lokasi(nama,oil,fasilitas,alamat,lat,lng,gambar)
		VALUES('$nama','$oil','$fasilitas','$alamat',$lat','$lng','$fileName')");
move_uploaded_file($_FILES['gambar']['tmp_name'], "img/".$_FILES['gambar']['name']);
		
	if($simpan)
	{
	echo "
     <script type=\"text/javascript\">
     alert(\"Data berhasil masuk ke database\")
    
     ;
     </script>";
        header("location: ../?link=daftarspbu");
	}
	else
	{
	echo "
     <script type=\"text/javascript\">
     alert(\"Data tidak masuk ke database\")
     
     ;
     </script>";
        header("location: ../?link=daftarspbu");
	}
?>