<script src="//maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyBnTC-LlbsXciFrjDTt51-G1NqjwQ68fhg"  type="text/javascript"></script>
<div id="saat-ini">Posisi Saat ini ?</div>
<script>
navigator.geolocation.getCurrentPosition(function(position) {
  //var cntr = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
 // console.log(position.coords.latitude+' l '+ position.coords.longitude);
  var px = position.coords.latitude; 
  var py = position.coords.longitude;
 document.getElementById('saat-ini').innerHTML ='LOL';
});
 </script> 