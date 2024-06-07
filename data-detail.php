<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Skillhunt - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- css dan js esri -->
    <!-- <link rel="stylesheet" href="https://js.arcgis.com/4.29/esri/themes/light/main.css" /> -->
    <!-- <script src="https://js.arcgis.com/4.29/"></script> -->

    <style>
      html,
      body,
      #viewDiv {
        padding: 0;
        margin: 0;
        height: 100%;
        width: 100%;
      }
    </style>

    <script>
      require(["esri/Map", "esri/views/MapView", "esri/layers/FeatureLayer"], (Map, MapView, FeatureLayer) => {
        const map = new Map({
          basemap: "hybrid"
        });

        const view = new MapView({
          container: "viewDiv",
          map: map,

          extent: {
            // autocasts as new Extent()
            xmin: -9177811,
            ymin: 4247000,
            xmax: -9176791,
            ymax: 4247784,
            spatialReference: 102100
          }
        });

        /********************
         * Add feature layer
         ********************/

        // Carbon storage of trees in Warren Wilson College.
        const featureLayer = new FeatureLayer({
          url: "https://services.arcgis.com/V6ZHFr6zdgNZuVG0/arcgis/rest/services/Landscape_Trees/FeatureServer/0"
        });

        map.add(featureLayer);
      });
    </script>

  </head>
  <body>

    <!-- <div id="viewDiv"></div> -->
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container-fluid px-md-4	">
	      <a class="navbar-brand" href="index.html">Jakartasatu</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
				    <li class="nav-item active"><a href="data.php" class="nav-link">Katalog Data</a></li>
            <!-- <li class="nav-item"><a href="peta.php" class="nav-link">Katalog Peta</a></li> -->
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
    </div>

	<section class="ftco-section bg-light">
      <div class="container">
        <h3 class="mb-3 bread"> <span class="mr-3"><a href="data.php"> <i class="ion-ios-arrow-back"></i></a></span> <span>Detail Data</span></h3>
        <div class="row">
        
        <div class="col-md-12 col-lg-8 mb-5">
        <?php
        include 'connect.php';

        // Mengambil ID dari URL
        $user_id = isset($_GET['id']) ? $_GET['id'] : '';
        if (!empty($user_id)) {
            // Query untuk mengambil data user berdasarkan ID
            $sql = "SELECT * FROM KATALOG_ALL_DATA WHERE ID = :user_id";
            $stmt = oci_parse($db, $sql);
            oci_bind_by_name($stmt, ":user_id", $user_id);
            oci_execute($stmt);

            if ($row = oci_fetch_assoc($stmt)) {
                ?>
                <form action="#" class="p-5 bg-white">
                    <div class="row form-group">
                        <div class="col-md-12"><h3> <?php echo htmlspecialchars($row['ALIAS_TITLE']); ?></h3></div>
                        <div class="col-md-12"><p>Deskripsi <br><?php echo htmlspecialchars(!empty($row['DESKRIPSI_SERVICE']) ? $row['DESKRIPSI_SERVICE'] : 'belum ada data', ENT_QUOTES, 'UTF-8'); ?></p></div>
                        <div class="col-md-12">
                          <div class="col-md-6">
                            <p>Waktu Pembuatan: <?php echo htmlspecialchars(!empty($row['CREATED']) ? $row['CREATED'] : 'belum ada data', ENT_QUOTES, 'UTF-8'); ?></p>
                          </div>
                          <div class="col-md-6">
                            <p>Jumlah dilihat : <?php echo $row['NUMVIEWS']; ?> </p>
                          </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12"><h3>Peta</h3></div>
                        <div class="col-md-12 mb-3 mb-md-0">
                            <div class="container" style="width: 500px;border: 0.5px solid gray;padding: 100px;margin: 20px;"></div>
                            <div id="viewDiv"></div>
                        </div>
                    </div>
                </form>
                <?php
            } else {
                echo "<p>Data not found.</p>";
            }
        } else {
            echo "<p>Invalid ID.</p>";
        }

        // Tutup koneksi
        oci_close($db);
        ?>
    </div>

          <div class="col-lg-4">
            <div class="p-4 mb-3 bg-white" style="max-width: 100%;">
              <h3 class="h5 text-black mb-3">Metadata</h3>
              <p class="mb-0 font-weight-bold">Pemilik Data</p>
              <p class="mb-4"><?php echo htmlspecialchars(!empty($row['SKPD']) ? $row['SKPD'] : 'belum ada data', ENT_QUOTES, 'UTF-8'); ?></p>

              <p class="mb-0 font-weight-bold">Tipe Data</p>
              <p class="mb-4"><?php echo htmlspecialchars(!empty($row['type']) ? $row['type'] : 'belum ada data', ENT_QUOTES, 'UTF-8'); ?></p>

              <p class="mb-0 font-weight-bold">Sifat Data</p>
              <p class="mb-4"><?php echo htmlspecialchars(!empty($row['AKSES']) ? $row['AKSES'] : 'belum ada data', ENT_QUOTES, 'UTF-8'); ?></p>

              <p class="mb-0 font-weight-bold">Kategori Data</p>
              <p class="mb-4"><?php echo htmlspecialchars(!empty($row['KATEGORI']) ? $row['KATEGORI'] : 'belum ada data', ENT_QUOTES, 'UTF-8'); ?></p>

              <p class="mb-0 font-weight-bold">URL Service</p>
              <p class="mb-4" style="word-wrap: break-word; overflow-wrap: break-word;"><a href="#"><?php echo htmlspecialchars(!empty($row['URL']) ? $row['URL'] : 'belum ada data', ENT_QUOTES, 'UTF-8'); ?></a></p>

            </div>
            
            <!-- <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">Editing Data</h3>
              <p>Anda dapat melakuka perubahan data dengan akses tombol "Edit data" dibawah ini.</p>
              <p><a href="#" class="btn btn-primary  py-2 px-4 disabled">Edit data</a></p>
            </div> -->
          </div>
        </div>
      </div>
    </section>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
		<div class="container">
			<div class="row mb-5">
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Skillhunt Jobboard</h2>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
							there live the blind texts.</p>
						<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
							<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Have a Questions?</h2>
						<div class="block-23 mb-3">
							<ul>
								<li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain
										View, San Francisco, California, USA</span></li>
								<!-- <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929
											210</span></a></li> -->
								<li><a href="#"><span class="icon icon-envelope"></span><span
											class="text">info@yourdomain.com</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script> -->
  <!-- <script src="js/google-map.js"></script> -->
  <script src="js/main.js"></script>
  
    
  </body>
</html>