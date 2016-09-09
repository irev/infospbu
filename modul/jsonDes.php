<!--script src="//maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyBnTC-LlbsXciFrjDTt51-G1NqjwQ68fhg"  type="text/javascript"></script-->

<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script-->
<script src="../assets/js/2.2.4.jquery.min.js"></script>

<script type="text/javascript">

function Posisi_awal(){
 $.ajax( {
 	method: "GET",
        url:'posisi_saat_ini.php',
        dataType: "html",
        success:function(data) {
       // $('#stage').load(data);
        console.log(data);
       // alert('wa');
        }
    });
//console.log(aj);


}
//setInterval( function(){ Posisi_awal() }, 3000);
//Posisi_awal();

function posisiku(tujuan){
navigator.geolocation.getCurrentPosition(function(position) {
	var lat = position.coords.latitude; 
	var lon = position.coords.longitude;
	var kor = lat +','+ lon;
    //posisi_awal(kor,tujuan);
    posisi_awal2(kor,tujuan);
});
}

function posisi_awal(Mykor, dest){
	
	url = 'http://maps.googleapis.com/maps/api/distancematrix/json?';
    $.ajax({
   // type: 'GET',
    url: url,
    async: false,
    dataType: 'text',
    data: { origins : Mykor, destinations : dest, language:'id-ID',  sensor:'false' },
    success: function(data){
    	document.write(data.rows[0].elements[0].distance.text);
    	//console.log(data.rows[0].elements[0].distance.text);
    	//alert(data.rows[0].elements[0].distance.text);

var out = "";
    var i;
    for(i = 0; i < arr.length; i++) {
        out += '<a href="' + arr[i].url + '">' +
        arr[i].display + '</a><br>';
    }
    document.getElementById("stage").innerHTML = out;



    	
    }
});
}

function posisi_awal2(Mykor, dest){
url = 'http://maps.googleapis.com/maps/api/distancematrix/json?';
$.getJSON(url, { origins : Mykor, destinations : dest, language:'id-ID',  sensor:'false' } ,function(data){
	//console.log(data.rows[0].elements[0].distance.text);
	//document.write(data.rows[0].elements[0].distance.text);

});
}







</script>

<?php 
 include "kon1.php";
$posisispbu = mysql_query("SELECT * FROM lokasi ORDER BY nama ");
		if (mysql_num_rows($posisispbu) > 0)  {
			while($l = mysql_fetch_array($posisispbu)) {

				$tujuan = $l['lat'].','.$l['lng'];
				echo "<script>posisiku( '".$tujuan."' )</script>";

			}
		}
 ?>
<div id="posisi"></div>
<div id="stage"></div>