<!DOCTYPE html>
<html>
<head>
    <!--script src="//maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyBnTC-LlbsXciFrjDTt51-G1NqjwQ68fhg"  type="text/javascript"></script-->
</head>
<body>
 <div id="msg">Sedang Mencari SPBU terdekat..</div>
<?php 
 include "kon1.php";
 $posisispbu = mysql_query("SELECT * FROM lokasi ORDER BY nama ");
  $jumlah=mysql_num_rows($posisispbu);
 for ($i = 0; $i  < $jumlah; $i++) {
//echo '<div id="id_'.$i.'">'.$i.'</div>';
 }


 ?>
 <!--div id="id_1"></div-->
<script>
navigator.geolocation.getCurrentPosition(function(position) {
  //var cntr = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
  console.log(position.coords.latitude+' l '+ position.coords.longitude);
  var px = position.coords.latitude; 
  var py = position.coords.longitude;
  var jsonn =JSON.stringify({ posisi_saat_ini: px+','+py }); 
 //document.getElementById("saat-ini").innerHTML ='{"posisi_saat_ini" : "'+px+','+py+'"}';
 if(px !=='' && py !==''){
   for (var i = 0; i  < <?php echo $jumlah ?>; i++) {
    ambil_jarak(px+','+py);
 }
} 
 
});

var xmlhttp = new XMLHttpRequest();
var myArr = new Array();
var id_SPBU = new Array();
var nama_SPBU = new Array();
var jarak_SPBU = new Array();
//var url = "test_json_text.txt";
//var url = "test_json_map.txt";
//var url = "test_json_map.txt";

//var url = "http://maps.googleapis.com/maps/api/distancematrix/json?&origins=-6.2087634%2C106.84559899999999&destinations=-0.840053%2C100.358816&language=id-ID&sensor=false";
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var myArr = JSON.parse(this.responseText);
        console.log(myArr.length);
        console.log(myArr);
        myFunction(myArr); 
        //var jarak = JSON.parse(this.responseText).rows[0].elements[0].distance.text; 
        //var jarak = JSON.parse(this.responseText)[22].SPBU["0"].rows["0"].elements["0"].distance.text; 
        <?php for ($i = 0; $i  < $jumlah; $i++) { 
        echo 'var jarak_'.$i.' = JSON.parse(this.responseText)['.$i.'].SPBU["0"].rows["0"].elements["0"].distance.text;
            //tampil(\'jarak_'.$i.'\');
            ////document.getElementById("id_'.$i.'").innerHTML = jarak_'.$i.';
        ';
        }
        ?>
        
    }
};

function ambil_jarak(posisiku){
    var url = "modul/cari_jalan_singkat.php?";
    //var url = "cari_jalan_singkat.php?";
    console.log(url);
    xmlhttp.open("GET", url+"&origins="+posisiku, true);
    xmlhttp.send();
}


function tampil(jarak){
   //alert(jarak);
    //for (var i = 0; i  < <?php echo $jumlah ?>; i++) {
   // document.getElementById("id_"+ i).innerHTML = jarak;
   //  }
}

for (var i = 0; i  < <?php echo $jumlah ?>; i++) {
    //ambil_jarak();
  //  ambil_jarak(px+','+py);

}

function myFunction(arr) {
    var out = "";
    var adrs = "";
    var i;
    for(i = 0; i < arr.length; i++) {
      //  adrs += arr[i].SPBU["1"].destination_addresses;
        //
       // out += arr[i].SPBU["1"].rows["0"].elements["0"].distance.value; //tampil semua jarak 
        // pushArray(jarak, alamat, idlokasi)
        pushArray(arr[i].SPBU["1"].rows["0"].elements["0"].distance.value, arr[i].SPBU["1"].destination_addresses["0"], arr[i].SPBU["0"].id); // masukan kedaftar array 
        //document.getElementById("id_"+i).innerHTML = out+',';
        //document.getElementById("id_"+i).innerHTML = adrs+',';
    }
   

    //document.getElementById("id01").innerHTML = out;
}


function pushArray(out,adrs,id){
     idlok  = id_SPBU.push(id); // Push array alamat
     alamat = nama_SPBU.push(adrs); // Push array alamat
     jarak  = jarak_SPBU.push(out); // Push array jarak
    
// fungsi array mix
Array.prototype.max = function() {
return Math.max.apply(null, this);
};
// fungsi array mix
Array.prototype.min = function() {
  return Math.min.apply(null, this);
};
// CARI INDEX ARRAY
 var indexMaksimal = jarak_SPBU.indexOf(jarak_SPBU.max()); // ambil indek jarak maksimal 
 var indexMinimal  = jarak_SPBU.indexOf(jarak_SPBU.min()); // ambil indek jarak minimal 
//OUT PUT
document.getElementById("tampil-jarak").innerHTML = '<hr><div class="alert alert-info"> KOORDINAT =  <input class="input" name="end" id="end" value="'+id_SPBU[Math.abs(indexMinimal)]+'"><a class="btn btn-xs bg-blue view" href="#" onclick="calcRoute()"><i class="fa fa-map-marker"></i> GO </a> <br>Jarak terjauh = '+ Math.floor(jarak_SPBU.max()/1000) + ' Km, index array ='+indexMaksimal+'<br> Jarak terdekat = '+  Math.floor(jarak_SPBU.min()/1000) + ' Km, <br> index array = '+ indexMinimal +"<br> LOKASI = "+ nama_SPBU[Math.abs(indexMinimal)]+'</div><hr>';
//document.getElementById("alamat").innerHTML = nama_SPBU +' '+ nama_SPBU[Math.abs(indexMinimal)] +'<br> Jarak terjauh = '+ nama_SPBU + ' Km  <br> Jarak terdekat = '+ nama_SPBU;
         console.log(id_SPBU[Math.abs(indexMinimal)]);
         console.log(nama_SPBU[Math.abs(indexMinimal)]);
         console.log(jarak_SPBU[Math.abs(indexMinimal)]);
}

$("#msg").delay(5000).hide(0);
</script>
<div id="alamat"></div>
<div id="tampil-jarak"></div>
</body>
</html>


