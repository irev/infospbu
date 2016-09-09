<?php
switch($_GET[aksi]){
default:
		

include "modul/kon1.php"; //panggil script koneksi
include "modul/ClassPaging.php"; //Panggil classPaging

//buat batas berita yang akan ditampilkan dalam setiap halaman
$limit = 5; 

//buat query
$query = new CnnNav($limit,'lokasi','*','idlokasi'); // sama saja dengan select * from daftar where id limit

//jalankan querynya
$result = $query ->getResult();
//perintah diatas sama dengan perintah mysql_query
?>	
		
  			<legend>Daftar SPBU</legend>
			<a class="btn btn-primary" href="?link=daftarspbu&aksi=tambah"><i class="icon-plus"></i> &nbsp; Tambah</a>
			<table  class="table table-bordered table-hover">
			  <tr>
				<th>NO</th>
				<th>NAMA</th>
                <th>OIL</th>
                <th>FASILITAS</th>
                <th>ALAMAT</th>
				<th>LATITUDE</th>
				<th>LONGITUDE </th>
                <th>GAMBAR </th> 
				<Th>AKSI</Th>
			  </tr>
			  <?PHP
				//membuat penomoran posting
				$nomor = ($limit * $_GET['offset'])+1; 
				while($data = mysql_fetch_array($result)){				
			  echo "
			  <tr>
				<td>$nomor</td>      
				<td>$data[nama]</td>
                 <td>$data[oil]</td>
                 <td>$data[fasilitas]</td>
                <td>$data[alamat]</td>
				<td>$data[lat]</td>
				<td>$data[lng]</td>
				<td><img src='img/".$data['gambar']."' width='200px' height='200px'/></td>
				
			<td><a class='btn btn-mini btn-success' href='?link=daftarspbu&aksi=edit&id=$data[idlokasi]'><i class='icon-edit'></i>Edit</a> / 
			<a class='btn btn-mini btn-success ' href='aksi/del.php?id=$data[idlokasi]'><i class='icon-trash'></i>Hapus</a></td>
			  </tr>";
			  $nomor++;
			  }
			  ?>
			  <tr>
				<td>
					<?php 
						$query->printNav(); //Cetak paging
					?>
				</td>
			  </tr>
			</table>
			
<?php
break;
case "tambah":
?> 
 <legend>Tambah</legend>

				<form class="form-horizontal" method="post" enctype="multipart/form-data" >
               <div class="control-group">
					<label class="control-label">NAMA</label>
					<div class="controls">
					  <input type="text" placeholder="Masukkan nama" name="nama"  class="input-text" required/>
					</div>
				  </div>
				  
				   <div class="control-group">
					<label class="control-label">OIL</label>
					<div class="controls">
                   <textarea cols="150" rows="5" name="oil" class="input-text" placeholder="Masukkan Oil" required></textarea>
					
					  
					</div>
				  </div>
				  
				   <div class="control-group">
					<label class="control-label">FASILITAS</label>
					<div class="controls">
					
					 	 <textarea cols="150" rows="5" name="fasilitas" placeholder="Masukkan fasilitas" class="input-text" required></textarea>
					</div>
				  </div>
				  
				  <div class="control-group">
					<label class="control-label">ALAMAT</label>
					<div class="controls">
					  	  <textarea cols="150" rows="5" name="alamat" placeholder="Masukkan alamat" class="input-text" required></textarea>
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label">LATITUDE</label>
					<div class="controls">
					  <input type="text" placeholder="Masukkan latitude" name="lat"  class="input-text" required/>
					</div>
				  </div>
                <div class="control-group">
					<label class="control-label">LANGITUDE</label>
					<div class="controls">
					  <input type="text" placeholder="Masukkan langitude" name="lng"  class="input-text" required/>
					</div>
				  </div>	
				  <div class="control-group">
				  <label class="control-label">GAMBAR</label>
					<div class="controls">					
					
    <input type="file" name="gambar" required /> <br/>
             <td colspan="4">Upload Gambar (Ukuran Maks = 1 MB) : </td>
       
					</div>
				  </div>
				  <div class="control-group">
				  
					<div class="controls">					
					 <button type="submit" class="btn btn-success" name="aksi" value="Tambah" >Tambah</button>
					</div>
				  </div>
				</form>
<?php
break;
case "edit":
?>	
	<legend>Edit</legend>
	<?php
		$daftar=mysql_query("SELECT * from lokasi where idlokasi='$_GET[id]'");
		$data=mysql_fetch_array($daftar);
      
	?>
			<form class="form-horizontal" action="aksi/edit.php"  method="POST" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $data['idlokasi']; ?>" />
				  <div class="control-group">
					<label class="control-label">Nama SPBU</label>
					<div class="controls">
					  <input type="text"  name="nama"  value="<?php echo $data['nama']  ;?> "/>
					</div>
				  </div>
				  
				   <div class="control-group">
					<label class="control-label">Oil</label>
					<div class="controls">
                  <textarea cols="150" rows="5" name="oil" class="input-text"> <?php echo $data['oil']  ;?></textarea>
					
					</div>
				  </div>
				  
				   <div class="control-group">
					<label class="control-label">Fasilitas</label>
					<div class="controls">
                   <textarea cols="150" rows="5" name="fasilitas" class="input-text"> <?php echo $data['fasilitas']  ;?></textarea>
					  
					</div>
				  </div>
				  
				   <div class="control-group">
					<label class="control-label">Alamat SPBU</label>
					<div class="controls">
                   <textarea cols="150" rows="5" name="alamat" class="input-text"> <?php echo $data['alamat']  ;?></textarea>
					 
					</div>
				  </div>
				  
				  
				  <div class="control-group">
					<label class="control-label">Latitude</label>
					<div class="controls">
					  <input type="text"  name="lat" value="<?php echo $data['lat'] ;?>"/>
					</div>
				  </div>
                <div class="control-group">
					<label class="control-label">Longitude</label>
					<div class="controls">
					  <input type="text"  name="lng" value="<?php echo $data['lng'] ;?>"/>
					</div>
				  </div>	
				  <div class="control-group">
				  <label class="control-label">Gambar</label>
					<div class="controls">
					
				 <img src="img/<?php echo $data['gambar'];?>"  alt="" width="150" border="0"/> 
                                  <br><br> 

						<input type="file" name="gambar"  value="<?php echo $data['gambar']; ?>"  /> <br/>
             <td colspan="4">Upload Gambar (Ukuran Maks = 1 MB) : </td>
       
					
					</div>
				  </div>
				  <div class="control-group">
				  
					<div class="controls">					
					  <button type="submit" class="btn btn-success" name="edit" value="Edit" >Tambah</button>
					</div>
				  </div>
				</form>
				
	
<?php
}
?>

<?php

//data dari lokasi


 
 if (isset($_POST['aksi'])){
      $nama = $_POST["nama"];
     $oil = $_POST["oil"];
     $fasilitas = $_POST["fasilitas"];
     $alamat = $_POST["alamat"];
$lat = $_POST["lat"];
$lng = $_POST["lng"];

	$fileName = $_FILES['gambar']['name'];


$simpan=mysql_query("INSERT INTO lokasi(nama,oil,fasilitas,alamat,lat,lng,gambar)
		VALUES('$nama','$oil','$fasilitas','$alamat','$lat','$lng','$fileName')");

     move_uploaded_file($_FILES['gambar']['tmp_name'], "img/".$_FILES['gambar']['name']);
		
	if($simpan)
	{
	echo "
     <script type=\"text/javascript\">
     alert(\"Data berhasil masuk ke database\")
    window.location = \"../?link=daftarspbu\"
     ;
     </script>";
       // header("location: ../?link=daftarspbu");
	}
	else
	{
	echo "
     <script type=\"text/javascript\">
     alert(\"Data tidak masuk ke database\")
      window.location = \"../?link=daftarspbu\"
     ;
     </script>";
      //  header("location: ../?link=daftarspbu");
	}
    
     
 




    
	} 
?>
