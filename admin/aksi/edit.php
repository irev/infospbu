<?php
include "../modul/kon1.php";
ERROR_REPORTING(0);


 $filename = addslashes(file_get_contents($_FILES['gambar']['tmp_name']));
$image=$_FILES['gambar']['name'];
    $move=move_uploaded_file($_FILES['gambar']['tmp_name'],'../img/'.$_FILES['gambar']['name']);
        if(empty($image))   //jika gambar kosong atau tidak di ganti
            {
                $update=mysql_query("UPDATE lokasi SET nama='$_POST[nama]', 
                                oil='$_POST[oil]',
                                fasilitas='$_POST[fasilitas]',
                                alamat='$_POST[alamat]',
                                lat='$_POST[lat]',
                                lng='$_POST[lng]'
                            WHERE idlokasi='$_POST[id]'") or die ("gagal update ");
                echo "<script>alert ('data telah di update 1');document.location='../?link=daftarspbu' </script> ";
            }
        else if (!empty($image)) // jika gambar di ganti
            {
                $update=mysql_query("UPDATE lokasi SET nama='$_POST[nama]', 
                                oil='$_POST[oil]',
                                fasilitas='$_POST[fasilitas]',
                                alamat='$_POST[alamat]',
                                lat='$_POST[lat]',
                                lng='$_POST[lng]',
                                gambar='$image' 
                            WHERE idlokasi='$_POST[id]'") or die ("gagal update gambar ");
                echo "<script>alert ('data telah di update 2');document.location='../?link=daftarspbu' </script> ";
            }


?>


