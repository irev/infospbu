<!--div id="saat-ini">{"posisi_saat_ini" : "0"}</div-->
<script>
navigator.geolocation.getCurrentPosition(function(position) {
  //var cntr = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
  console.log(position.coords.latitude+' l '+ position.coords.longitude);
  var px = position.coords.latitude; 
  var py = position.coords.longitude;
  var jsonn =JSON.stringify({ posisi_saat_ini: px+','+py }); 
 //document.getElementById("saat-ini").innerHTML ='{"posisi_saat_ini" : "'+px+','+py+'"}';
 document.write(jsonn);
});






 </script> 

<?php 

//json_encode(value)
 ?>