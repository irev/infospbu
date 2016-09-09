<?php 
 include "kon1.php";
//header('content-type: application/json; charset=utf-8');
//echo $json = file_get_contents('http://maps.googleapis.com/maps/api/distancematrix/json?&origins=-6.2087634%2C106.84559899999999&destinations=-0.840053%2C100.358816&language=id-ID&sensor=false');
// $data = json_encode($json);

//$data = json_decode(utf8_encode($json),true);
//var_dump($data);
echo "[";
if(isset($_GET['origins'])){
$dari = $_GET['origins'];
			
	        $posisispbu = mysql_query("SELECT * FROM lokasi ORDER BY nama ");
			$i=0;
			while($l = mysql_fetch_array($posisispbu)) {	
				echo $json = '{ "SPBU":[{"id":"'.$l['lat'].",".$l['lng'].'"},'.file_get_contents("http://maps.googleapis.com/maps/api/distancematrix/json?&origins=".$dari."&destinations=".$l['lat'].",".$l['lng']."&language=id-ID&sensor=false")."]},";
			$i++;
			}
echo '{"total":"'.mysql_num_rows($posisispbu).'"}';
} 
echo "]";
?>