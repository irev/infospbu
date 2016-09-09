    <script src="//maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyBnTC-LlbsXciFrjDTt51-G1NqjwQ68fhg"  type="text/javascript"></script>
<script type="text/javascript">
var peta;
var koorAwal = new google.maps.LatLng(-0.7864794500552789, 100.65369380638003);
//var icon_pin ='assets/icon/tower1.png';
function peta_awal(){
   //console.log(set_icon_tanda(jenis));
   // set_icon_tanda(jenis);
    var settingpeta = {
        zoom: 11,
        center: koorAwal,
       // icon: icon_pin,
        mapTypeId: google.maps.MapTypeId.ROADMAP 
        };
    peta = new google.maps.Map(document.getElementById("kanvaspeta"),settingpeta);
    google.maps.event.addListener(peta,'click',function(event){
        tandai(event.latLng);
    }); 
}

</script>


<?php
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
                <td>$data[alamat] </td>
				<td>$data[lat]</td>
				<td>$data[lng]</td>
				<td><img src='admin/img/".$data['gambar']."' width='200px' height='200px'/><button name='$data[nama]'  onclick=\"views_peta('$data[nama]','$data[oil]','$data[fasilitas]')\">View</button></td>
				
			
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


<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>
<div id="exampleModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
      </div>
       <div class="modal-body">
<b>OIL : </b>

      <p class="oil"></p>
<b>FASILITAS : </b>

      <p class="fasilitas"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
function views_peta(name,oil,fasilitas){
$('#exampleModal').modal('show');
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text(name)
  modal.find('.oil').text('OIL' + oil)
  modal.find('.fasilitas').text('FASILITAS ' + fasilitas)
  modal.find('.modal-body input').val(recipient)
})
}
</script>