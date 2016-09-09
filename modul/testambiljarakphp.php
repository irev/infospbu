    <script src="//maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyBnTC-LlbsXciFrjDTt51-G1NqjwQ68fhg"  type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


<script>
/*   navigator.geolocation.getCurrentPosition(function(position) {
            var cntr = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            console.log(position.coords.latitude+' l '+ position.coords.longitude);
    
 

 var end = document.getElementById('end').value;
    var request = {
     origin:cntr,
     destination:end,
     travelMode: google.maps.TravelMode.DRIVING
    };
    directionsService.route(request, function(response, status) {
        $('#loading').hide();
   if (status == google.maps.DirectionsStatus.OK) {
     directionsDisplay.setDirections(response);
   }
        
    });
   
        
          });*/ 

</script>



<?php 
 include "kon1.php";
/*
		$js_posisi = "<script>
			   				navigator.geolocation.getCurrentPosition(function(position) {
			            		var cntr = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
			            		//console.log(position.coords.latitude+' l '+ position.coords.longitude);
			            		var px = position.coords.latitude; 
			            		var py = position.coords.longitude;	
								var pss = 'http://maps.googleapis.com/maps/api/distancematrix/json?origins=' + px +','+ py + '&destinations=".$l['lat'].",".$l['lng']." &language=id-ID&sensor=false';
								console.log(pss);

			         		});
						</script>";
		echo $js_posisi;
*/

		$posisispbu = mysql_query("SELECT * FROM lokasi ORDER BY nama ");
		if (mysql_num_rows($posisispbu) > 0)  {
			//echo '<ul>';

				 
			//while($l = mysql_fetch_array($posisispbu)) {
			//	echo '<li>'.$l['lat'].",".$l['lng'].' | '.$l['nama'].'</li>';
			//}
			//echo' </ul>';

			

			while($l = mysql_fetch_array($posisispbu)) {
               // echo "<br>http://maps.googleapis.com/maps/api/distancematrix/json?origins=-7.7738745,110.4225731&destinations=".$l['lat'].",".$l['lng']." &language=id-ID&sensor=false";
			echo $iss =  "<script>
			   				navigator.geolocation.getCurrentPosition(function(position) {
			            		var cntr = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
			            		//console.log(position.coords.latitude+' l '+ position.coords.longitude);
			            		var px = position.coords.latitude; 
			            		var py = position.coords.longitude;	
								var pss = 'http://maps.googleapis.com/maps/api/distancematrix/json?origins=' + px +','+ py + '&destinations=".$l['lat'].",".$l['lng']." &language=id-ID&sensor=false';
								console.log(pss);
								//document.write(pss);
								";

			echo"           	
			         		});
						</script>";

			}
			
		}
 ?>
 
<?php
// ambil posisi sekarang
$data = file_get_contents("http://maps.googleapis.com/maps/api/distancematrix/json?origins=-7.7738745,110.4225731&destinations=-6.2087634,106.84559899999999&language=id-ID&sensor=false");
$data = json_decode($data); 
echo '<br><hr>' .json_encode($data).'<hr>';
$distance = 0;
foreach($data->rows[0]->elements as $road) {
   $time += $road->duration->value;
   $distance += $road->distance->value;
}
echo "<hr>Jarak: ".$distance." m atau " .floor($distance / 1000). " km
<br><hr>";

// ambil posisi sekarang 2
$data2 = file_get_contents("http://maps.googleapis.com/maps/api/distancematrix/json?origins=-0.9115122999999999,100.3470227&destinations=-0.910095,100.354544&language=id-ID&sensor=false");
$data2 = json_decode($data2); 
echo '<br><hr>' .json_encode($data2).'<hr>';
$distance2 = 0;
foreach($data2->rows[0]->elements as $road2) {
   $time2 += $road2->duration->value;
  $distance2 += $road2->distance->value;
}
 echo "<hr>Jarak: ".$distance2." m atau " .floor($distance2 / 1000). " km
<br><hr>";

$numbers = array( $distance, $distance2);
echo $min = 'terdekat = '.floor(min($numbers)/1000).' km<hr>' ;




echo "Asal: ".$data->destination_addresses[0];
echo "<br>";
echo "Tujuan: ".$data->origin_addresses[0];
echo "<br>";
echo "Estimasi Waktu: ".$time." detik atau setara dengan " . gmdate('H', $time) . " jam " . gmdate('i', $time) . " menit";
echo "<br>";
echo "Jarak: ".$distance." m atau " .floor($distance / 1000). " km";
echo "<br>";
?>