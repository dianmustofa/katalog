<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Edit Data</title>
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
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
          <div class="col-md-12 ftco-animate text-center mb-5">
          	<p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Data</span></p>
            <h1 class="mb-3 bread">Edit Data</h1>
          </div>
        </div>
      </div>
    </div>

	<section class="ftco-section contact-section bg-light">
      <div class="container">
        <?php
        include 'connect.php';
        
        $user_id = isset($_GET['id']) ? $_GET['id'] : '';

        if (!empty($user_id)) {
            // Query untuk mengambil data user berdasarkan ID
            $sql = "SELECT * FROM KATALOG_ALL_DATA WHERE ID = :user_id";
            $stmt = oci_parse($db, $sql);
            oci_bind_by_name($stmt, ":user_id", $user_id);
            oci_execute($stmt);

            if ($row = oci_fetch_assoc($stmt)) {
                ?>
                <div class="row d-flex mb-5 contact-info">
                <div class="col-md-12 mb-4">
                    <h2 class="h3"><span class="mr-3"><a href="data-detail.php?id=<?php echo $row['ID']; ?>"> <i class="ion-ios-arrow-back"></i></a></span>Edit Data</h2>
                </div>
                <div class="w-100"></div>
                <div class="col-md-3">
                    <p><a><?php echo htmlspecialchars($row['ALIAS_TITLE']); ?></a></p>
                </div>
                <div class="col-md-3">
                    <p><span>Pemilik data:</span> <a><?php echo htmlspecialchars(!empty($row['SKPD']) ? $row['SKPD'] : 'belum ada data', ENT_QUOTES, 'UTF-8'); ?></a></p>
                </div>
                <div class="col-md-3">
                    <p><span>Sifat data:</span> <a><?php echo htmlspecialchars(!empty($row['AKSES']) ? $row['AKSES'] : 'belum ada data', ENT_QUOTES, 'UTF-8'); ?></a></p>
                </div>
                <div class="col-md-3">
                    <p><span>Link data: </span> <a href="<?php echo htmlspecialchars(!empty($row['URLDATA']) ? $row['URLDATA'] : 'belum ada data', ENT_QUOTES, 'UTF-8'); ?>" target="new_blank">klik disini</a></p>
                </div>
                </div>
                <div class="row block-9">
                    <div class="col-md-12 order-md-last d-flex">
                        <form action="update.php" method="POST" class="bg-white p-5 contact-form">
                        <div class="form-group">
                            <input type="hidden" name="ID" class="form-control" value="<?php echo htmlspecialchars($row['ID'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                            <input type="hidden" name="TITLE" class="form-control" value="<?php echo htmlspecialchars($row['TITLE'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                            <label for="alias_title">Alias Title:</label>
                            <input type="text" name="ALIAS_TITLE" class="form-control" value="<?php echo htmlspecialchars($row['ALIAS_TITLE'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                            <input type="hidden" name="OWNERDATA" class="form-control" value="<?php echo htmlspecialchars($row['OWNERDATA'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                            <input type="hidden" name="CREATED" class="form-control" value="<?php echo htmlspecialchars($row['CREATED'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                            <input type="hidden" name="MODIFIED" class="form-control" value="<?php echo htmlspecialchars($row['MODIFIED'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                            <input type="hidden" name="PORTAL" class="form-control" value="<?php echo htmlspecialchars($row['PORTAL'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                            <input type="hidden" name="TIPEDATA" class="form-control" value="<?php echo htmlspecialchars($row['TIPEDATA'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                            <input type="hidden" name="URLDATA" class="form-control" value="<?php echo htmlspecialchars($row['URLDATA'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="akses">Akses:</label>
                            <input type="text" name="AKSES" class="form-control" value="<?php echo htmlspecialchars($row['AKSES'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                            <input type="hidden" name="OWNERFOLDER" class="form-control" value="<?php echo htmlspecialchars($row['OWNERFOLDER'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                            <input type="hidden" name="FOLDER" class="form-control" value="<?php echo htmlspecialchars($row['FOLDER'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                            <input type="hidden" name="NUMVIEWS" class="form-control" value="<?php echo htmlspecialchars($row['NUMVIEWS'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="skpde">SKPD Pemilik data:</label>
                            <input type="text" name="SKPD" class="form-control" value="<?php echo htmlspecialchars($row['SKPD'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori:</label>
                            <input type="text" name="KATEGORI" class="form-control" value="<?php echo htmlspecialchars($row['KATEGORI'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi:</label>
                            <textarea type="text" name="DESKRIPSI_SERVICE" cols="30" rows="7" class="form-control"><?php echo htmlspecialchars($row['DESKRIPSI_SERVICE'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Simpan Data" class="btn btn-primary py-3 px-5">
                        </div>
                        </form>
                    
                    </div>
                </div>
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
    </section>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
		<div class="container">
			<div class="row mb-5">
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Jakartasatu</h2>
						<p>Portal spasial yang menyediakan katalog data spasial jakarta.</p>
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
								<li><span class="icon icon-map-marker"></span><span class="text">Jl. Taman Jatibaru No.17, RT.17/RW.1, Cideng, Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10150</span></li>
								<!-- <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929
											210</span></a></li> -->
								<li><a href="#"><span class="icon icon-envelope"></span><span
											class="text">jakartasatu.jakarta.go.id</span></a></li>
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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>