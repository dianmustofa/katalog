<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Katalog Jakartasatu</title>
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
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container-fluid px-md-4	">
			<a class="navbar-brand" href="index.html">Jakartasatu</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
				aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active"><a href="#" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="data.php" class="nav-link">Katalog Data</a></li>
                    <!-- <li class="nav-item"><a href="peta.php" class="nav-link">Katalog Peta</a></li> -->
				</ul>
			</div>
		</div>
	</nav>
	<!-- END nav -->
    
    <div class="hero-wrap img" style="background-image: url(images/bg_1.jpg);">
      <div class="overlay"></div>
      	<div class="container">
      		<div class="row d-md-flex no-gutters slider-text align-items-center justify-content-center">
	        	<div class="col-md-10 d-flex align-items-center ftco-animate">
	        		<div class="text text-center pt-5 mt-md-5">
					<?php
						// Database connection string
                        include 'connect.php';

						// Query to get the count of 'TITLE' column from 'data' table
						$sql = "SELECT COUNT(TITLE) AS total FROM KATALOG_ALL_DATA";
						$result = oci_parse($db, $sql);
						oci_execute($result);

						if ($row = oci_fetch_assoc($result)) {
							$total = $row['TOTAL'];

						// Query to get the count of 'TITLE' column from 'table1'
						$sql1 = "SELECT COUNT(TITLE) AS total1 FROM KATALOG_ALL_DATA";
						$result1 = oci_parse($db, $sql1);
						oci_execute($result1);

						// Query to get the count of 'TITLE' column from 'table2'
						$sql2 = "SELECT COUNT(DISTINCT SUBMENU) AS total2 FROM KATALOG_PETA_JKT1";
						$result2 = oci_parse($db, $sql2);
						oci_execute($result2);

						// Query to get the count of 'TITLE' column from 'table3'
						$sql3 = "SELECT COUNT(DISTINCT TITLE) AS total3 FROM KATALOG_PETA_JKT1";
						// SELECT group_column, COUNT(jumlah) AS total2 FROM table2 GROUP BY group_column
						$result3 = oci_parse($db, $sql3);
						oci_execute($result3);

						if ($row1 = oci_fetch_assoc($result1)) {
							$total1 = $row1['TOTAL1'];
						}

						if ($row2 = oci_fetch_assoc($result2)) {
							$total2 = $row2['TOTAL2'];
						}

						if ($row3 = oci_fetch_assoc($result3)) {
							$total3 = $row3['TOTAL3'];
						}

						?>

						

						<p class="mb-4">Temukan peta dan data spasial</p>
						<h1 class="mb-5">Katalog Peta dan Data Spasial</h1>
						<div class="ftco-counter ftco-no-pt ftco-no-pb">
							<div class="row">
								<div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
									<div class="block-18">
										<div class="text d-flex">
											<div class="icon mr-2">
												<span class="flaticon-worldwide"></span>
											</div>
											<div class="desc text-left">
												
												<strong class="number" data-number="<?php echo $total1; ?>"><?php echo $total1; ?></strong>
												<span>Data Spasial</span>
											</div>
										</div>
									</div>
								</div>
								<!-- Add other similar HTML blocks for other counters -->
								<div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
									<div class="block-18">
										<div class="text d-flex">
											<div class="icon mr-2">
												<span class="flaticon-worldwide"></span>
											</div>
											<div class="desc text-left">
												<strong class="number" data-number="<?php echo $total2; ?>"><?php echo $total2; ?></strong>
												<span>Simpul Jaringan</span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
									<div class="block-18">
										<div class="text d-flex">
											<div class="icon mr-2">
												<span class="flaticon-worldwide"></span>
											</div>
											<div class="desc text-left">
												<strong class="number" data-number="<?php echo $total3; ?>"><?php echo $total3; ?></strong>
												<span>Peta dan Dashboard</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<?php
						} else {
							echo "Tidak ada data ditemukan";
						}
						// Close the database connection
						oci_close($db);
					?>

						
			        </div>

	        	</div>
	    	</div>
      	</div>
    </div>
  

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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>