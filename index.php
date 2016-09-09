<?php
include "modul/kon.php";
ERROR_REPORTING(0);//echo $_SERVER['QUERY_STRING'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Ap Informasi SPBU</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
	
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
	<style type="text/css">
      body {
        padding-top: 10px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

  
  </head>

  <body >
 
    <div class="container well" >

     
		
		<!-- /.carousel -->
         <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="navbar navbar-inverse ">
          <div class="navbar-inner">
            <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            
            <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
            <div class="nav-collapse collapse">
              <ul class="nav">
                <li >
					<a href="index.php" >
						<img src="assets/img/r.png" alt="Beranda">
						<span>Beranda</span>
					</a>
				</li>
                
              
				<li>
					<a href="./?link=maps">
						<img src="assets/img/map.png" alt="Maps SPBU">
						<span>Maps SPBU</span>
					</a>
				</li>  
				<li>
					<a href="./?link=daftarspbu">
						<img src="assets/img/Gas.png" alt="Daftar SPBU">
						<span>Daftar SPBU</span>
					</a>
				</li> 
                  <li>
					<a href="./?link=rute">
						<img src="assets/img/Map2.png" alt="Rute SPBU">
						<span>Rute SPBU</span>
					</a>
				</li> 
				
					<li>
					<a href="login.php">
						<img src="assets/img/o.png" alt="">
						<span>Login</span>
					</a>
				</li>  
              </ul>
            </div><!--/.nav-collapse -->
          </div><!-- /.navbar-inner -->
        </div><!-- /.navbar -->
      <!-- Example row of columns -->
      <div class="row-fluid">
        <div class="span12">			
			<div class="span12 wellwhite">
			<?php
					if($_GET['link']=='maps'){
						include "modul/maps.php";
					}elseif($_GET['link']=='daftarspbu'){
						include "modul/daftar.php";
					}elseif($_GET['link']=='rute'){
						include "modul/rute.php";
					}else{
						echo "
						<legend>Selamat Datang </legend>
							<p>Halaman ini akan menampilkan informasi dan pencarian SPBU di Kota Padang.</p>";
					}
				?>         
			</div>		
        </div>        
      </div>


      <footer class="well">

		<div><center>Copyright: DAVID MAULANA &copy; 2016.</div>
      </footer>
    
</div> <!-- /container -->
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script> 
	<script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>
