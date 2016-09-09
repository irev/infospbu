<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Rute SPBU Kota Padang</title>
    <style>
   html { height: 100% }
   #panel{padding:5px;}
      .input {
   height: 25px;
   padding: 2px;
   width: 200px;
      }
   #btn{
     height: 31px;
     background: #267BA8;
     border: none;
     padding: 5px;
     color: #fff;
   }
   #map-canvas { height: 500px; width:1100px; }
   *{
   margin: 0;
   padding: 0;
  }
  
  .wrap {
   background: #f3f8fb;
   width:730px;
   margin:30px auto;
   border: 4px dashed #61b3de;
   border-radius:4px;
   padding: 20px 5px;
  }
  h1 {
   font-family:Georgia, "Times New Roman", Times, serif;
   font-size:24px;
   color:#645348;
   font-style:italic;
   text-decoration:none;
   font-weight:100;
   padding: 10px;
  }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script>
  var directionsDisplay;
  var directionsService = new google.maps.DirectionsService();
  var map;
   
  function initialize() {
    directionsDisplay = new google.maps.DirectionsRenderer();
    

      	// Variabel untuk menyimpan informasi (desc)
		var infoWindow = new google.maps.InfoWindow;
		
		//  Variabel untuk menyimpan peta Roadmap
		var mapOptions = {
          mapTypeId: google.maps.MapTypeId.ROADMAP
        } 
		
		// Pembuatan petanya
		var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
              
        // Variabel untuk menyimpan batas kordinat
		var bounds = new google.maps.LatLngBounds();

		// Pengambilan data dari database
		<?php
      
        mysql_connect('localhost','root','');
	      mysql_select_db('dbspbu');
            $query = mysqli_query($con,"select * from lokasi");
			while ($data = mysqli_fetch_array($query))
			{
				$nama = $data['nama'];
                $oil = $data['oil'];
                $fasilitas = $data['fasilitas'];
                $alamat = $data['alamat'];
				$lat = $data['lat'];
				$lon = $data['lng'];
				
				echo ("addMarker($lat, $lon, '<b>$nama <br>Oil : $oil<br>Fasilitas : $fasilitas <br>$alamat</b>');\n");                   
			}
          ?>
		  
		// Proses membuat marker 
		function addMarker(lat, lng, info) {
			var lokasi = new google.maps.LatLng(lat, lng);
			bounds.extend(lokasi);
			var marker = new google.maps.Marker({
				map: map,
				position: lokasi,
                 icon: 'admin/assets/img/gazstation.png'
			});       
			map.fitBounds(bounds);
			bindInfoWindow(marker, map, infoWindow, info);
		 }
		
		// Menampilkan informasi pada masing-masing marker yang diklik
        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }
      
    directionsDisplay.setPanel(document.getElementById('directions-panel'));
    directionsDisplay.setMap(map);
  }
         google.maps.event.addDomListener(window, 'load', initialize);
 
  function calcRoute() {
      
      
       if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var cntr = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
 var end = document.getElementById('end').value;
    var request = {
     origin:cntr,
     destination:end,
     travelMode: google.maps.TravelMode.DRIVING
    };
    directionsService.route(request, function(response, status) {
   if (status == google.maps.DirectionsStatus.OK) {
     directionsDisplay.setDirections(response);
   }
    });
        
          });
        } else {
          alert('Browsert tidak support geolocation !!');
        }
   
  }
 
  google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body>

  <legend>Rute SPBU Kota Padang</legend>
  
  <div id="panel">
  
    <select class="input" name="end" id="end" >
		<?php

		/* menampilkan data kabupaten */
		$kabupaten = mysql_query("SELECT * FROM lokasi ORDER BY nama ");
		if (mysql_num_rows($kabupaten) > 0)  {
			echo '<option value="">Alamat SPBU...</option>';
			while($l = mysql_fetch_array($kabupaten)) {
				echo '<option value="'.$l['lat'].",".$l['lng'].'">'.$l['nama'].'</option>';
			}
		} else {
			echo '<option value="">tidak ada data SPBUn</option>';
		}
		
		echo $o;
	
		?>
		</select>
    <input id="btn" type="button" value="Search" onclick="calcRoute()">
  <div id="directions-panel"></div>
      </div>
  <div id="map-canvas"></div>
 
  </body>
</html>
