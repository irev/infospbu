<?php include "kon.php"; ?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Maps SPBU</title>
  <style type='text/css'>
  #peta {
  width: 1100px;
  height: 500px;

} </style>
 
  <script src="//maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyCN6mGFJiNjjIjt3JLz4LqVsSykIxym_XU"  type="text/javascript"></script>

   <script type="text/javascript">
    

       var marker;
      function initialize() {
		  
		// Variabel untuk menyimpan informasi (desc)
		var infoWindow = new google.maps.InfoWindow;
		
		//  Variabel untuk menyimpan peta Roadmap
		var mapOptions = {
          mapTypeId: google.maps.MapTypeId.ROADMAP
        } 
		
		// Pembuatan petanya
		var map = new google.maps.Map(document.getElementById('peta'), mapOptions);
              
        // Variabel untuk menyimpan batas kordinat
		var bounds = new google.maps.LatLngBounds();

		// Pengambilan data dari database
		<?php
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
                 animation: google.maps.Animation.DROP,
                 icon: 'assets/img/gazstation.png'
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
 
        }
      google.maps.event.addDomListener(window, 'load', initialize);
       
	</script>
  </head>
  <body>
    <legend>Maps SPBU</legend>
    <div id="peta"></div>

  </body>
</html>