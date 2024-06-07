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
    <style>
        .truncate {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
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
					<p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i
									class="ion-ios-arrow-forward"></i></a></span> <span>Katalog Data</span></p>
					<h1 class="mb-3 bread">Katalog Data</h1>
				</div>
			</div>
		</div>
	</div>

	<section class="ftco-section ftco-no-pb bg-light">
		<div class="container">
			<div class="row">
				<div class="ftco-search">
					<div class="row">
						<div class="col-md-12 tab-wrap">

							<div class="tab-content p-4" id="v-pills-tabContent">

								<div class="tab-pane fade show active" id="v-pills-1" role="tabpanel"
									aria-labelledby="v-pills-nextgen-tab">

									<form action="#" method="GET" class="search-job">
										<div class="row no-gutters">
											<div class="col-md mr-md-2">
												<div class="form-group">
													<div class="form-field">
														<div class="icon"><span class="icon-search"></span></div>
														<input type="text" name="search" class="form-control" placeholder=" Temukan data..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search'], ENT_QUOTES, 'UTF-8') : ''; ?>">
													</div>
												</div>
											</div>
											<div class="col-md mr-md-2">
												<div class="form-group">
													<div class="form-field">
														<div class="select-wrap">
															<div class="icon"><span class="ion-ios-arrow-down"></span>
															</div>
															<select name="simpul_jaringan" id="" class="form-control">
                                                                <option value="">Simpul Jaringan</option>
                                                                <?php
                                                                include 'connect.php';
                                                                $query = "SELECT DISTINCT SKPD FROM KATALOG_ALL_DATA ORDER BY SKPD";
                                                                $stmt = oci_parse($db, $query);
                                                                oci_execute($stmt);
                                                                while ($row = oci_fetch_assoc($stmt)) {
                                                                    $simpul_jaringan = $row['SKPD'];
                                                                    $selected = (isset($_GET['simpul_jaringan']) && $_GET['simpul_jaringan'] == $simpul_jaringan) ? 'selected' : '';
                                                                    echo '<option value="' . htmlspecialchars($simpul_jaringan, ENT_QUOTES, 'UTF-8') . '" ' . $selected . '>' . htmlspecialchars($simpul_jaringan, ENT_QUOTES, 'UTF-8') . '</option>';
                                                                }
                                                                oci_free_statement($stmt);
                                                                ?>
                                                            </select>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md mr-md-2">
												<div class="form-group">
                                                <div class="form-field">
														<div class="select-wrap">
															<div class="icon"><span class="ion-ios-arrow-down"></span>
															</div>
															<select name="kategori" id="" class="form-control">
                                                                <option value="">Kategori</option>
                                                                <?php
                                                                $query_kategori = "SELECT DISTINCT KATEGORI FROM KATALOG_ALL_DATA ORDER BY KATEGORI";
                                                                $stmt = oci_parse($db, $query_kategori);
                                                                oci_execute($stmt);
                                                                while ($row = oci_fetch_assoc($stmt)) {
                                                                    $kategori = $row['KATEGORI'];
                                                                    $selected = (isset($_GET['kategori']) && $_GET['kategori'] == $kategori) ? 'selected' : '';
                                                                    echo '<option value="' . htmlspecialchars($kategori, ENT_QUOTES, 'UTF-8') . '" ' . $selected . '>' . htmlspecialchars($kategori, ENT_QUOTES, 'UTF-8') . '</option>';
                                                                }
                                                                oci_free_statement($stmt);
                                                                ?>
                                                            </select>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md">
												<div class="form-group">
                                                    <div class="form-field">
                                                    <?php if (!isset($_GET['search']) && !isset($_GET['simpul_jaringan']) && !isset($_GET['kategori']) && !isset($_GET['tipe_data'])): ?>
                                                        <button type="submit" class="form-control btn btn-primary">Temukan</button>
                                                    <?php endif; ?>

                                                    <?php if (isset($_GET['search']) || isset($_GET['simpul_jaringan']) || isset($_GET['kategori']) || isset($_GET['tipe_data'])): ?>
                                                        <a href="?page=1" class="btn btn-danger nav-link">Clear Pencarian</a>
                                                    <?php endif; ?>
													</div>
												</div>
											</div>
										</div>
									</form>

								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

    <section class="ftco-section bg-light">
        <div class="container">

            <div class="row">
                
                <div class="col-lg-9 pr-lg-4">
                    <div class="row">
                        <?php
                        // Database connection string
                        include 'connect.php';

                        // Determine the number of records per page
                        $records_per_page = 20;

                        // Get the current page from the URL parameter, default to page 1 if not set
                        $current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;
                        if ($current_page < 1) {
                            $current_page = 1;
                        }

                        // Calculate the offset for the SQL query
                        $offset = ($current_page - 1) * $records_per_page;

                        // Prepare the search and filter query
                        $search_query = isset($_GET['search']) ? $_GET['search'] : '';
                        $simpul_jaringan = isset($_GET['simpul_jaringan']) ? $_GET['simpul_jaringan'] : '';
					    $kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';
                        $tipe_data = isset($_GET['tipe_data']) ? $_GET['tipe_data'] : [];

                        $where_conditions = [];
                        $params = [];

                        if (!empty($search_query)) {
                            $where_conditions[] = "LOWER(ALIAS_TITLE) LIKE LOWER(:search_query)";
                            $params[':search_query'] = '%' . strtolower($search_query) . '%';
                        }

                        if (!empty($simpul_jaringan)) {
                            $where_conditions[] = "SKPD = :simpul_jaringan";
                            $params[':simpul_jaringan'] = $simpul_jaringan;
                        }
    
                        if (!empty($kategori)) {
                            $where_conditions[] = "KATEGORI = :kategori";
                            $params[':kategori'] = $kategori;
                        }

                        if (!empty($tipe_data) && !in_array('Semua', $tipe_data)) {
                            $placeholders = [];
                            foreach ($tipe_data as $key => $value) {
                                $placeholder = ":tipe_data_$key";
                                $placeholders[] = $placeholder;
                                $params[$placeholder] = $value;
                            }
                            $where_conditions[] = "AKSES IN (" . implode(', ', $placeholders) . ")";
                        }

                        $where_sql = "";
                        if (!empty($where_conditions)) {
                            $where_sql = "WHERE " . implode(' AND ', $where_conditions);
                        }

                        $sql = "SELECT * FROM KATALOG_ALL_DATA $where_sql OFFSET :offset ROWS FETCH NEXT :records_per_page ROWS ONLY";
                        $total_records_query = "SELECT COUNT(*) as total FROM KATALOG_ALL_DATA $where_sql";

                        // Query to count total records
                        $total_stmt = oci_parse($db, $total_records_query);
                        foreach ($params as $param => $value) {
                            oci_bind_by_name($total_stmt, $param, $params[$param]);
                        }
                        oci_execute($total_stmt);
                        $total_records_row = oci_fetch_assoc($total_stmt);
                        $total_records = $total_records_row['TOTAL'];

                        // Calculate total pages
                        $total_pages = ceil($total_records / $records_per_page);

                        // Query to fetch data
                        $stmt = oci_parse($db, $sql);
                        foreach ($params as $param => $value) {
                            oci_bind_by_name($stmt, $param, $params[$param]);
                        }
                        oci_bind_by_name($stmt, ":offset", $offset, -1, OCI_B_INT);
                        oci_bind_by_name($stmt, ":records_per_page", $records_per_page, -1, OCI_B_INT);
                        oci_execute($stmt);

                        // Fetch and display data
                        while ($data = oci_fetch_assoc($stmt)) {
                            ?>
                            <div class="col-md-12 ftco-animate">
                                <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
                                    <div class="one-third mb-4 mb-md-0">
                                        <div class="job-post-item-header align-items-center">
                                            <span class="subbadge"><?php echo htmlspecialchars($data['AKSES'], ENT_QUOTES, 'UTF-8'); ?></span>
                                            <h2 class="mr-3 text-black  truncate"><a href="data-detail.php?id=<?php echo $data['ID']; ?>"><?php echo htmlspecialchars($data['ALIAS_TITLE'], ENT_QUOTES, 'UTF-8'); ?></a></h2>
                                        </div>
                                        <div class="job-post-item-body d-block d-md-flex">
                                            <div class="mr-3"><span class="icon-layers"></span> <a href="#"><?php echo htmlspecialchars(!empty($data['KATEGORI']) ? $data['KATEGORI'] : 'belum ada data', ENT_QUOTES, 'UTF-8'); ?></a></div>
                                            <div><span class="icon-my_location"></span> <span><?php echo htmlspecialchars(!empty($data['SKPD']) ? $data['SKPD'] : 'belum ada data', ENT_QUOTES, 'UTF-8'); ?></span></div>
                                        </div>
                                    </div>
                                    <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
                                        <a href="data-detail.php?id=<?php echo $data['ID']; ?>" class="btn btn-primary py-2">Detail</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }

                        // Display pagination
                        if ($total_pages > 1) {
                            echo '<div class="row mt-5">';
                            echo '<div class="col text-center">';
                            echo '<div class="pagination" style="display: inline-block;">';
                        
                            // Previous Button
                            if ($current_page > 1) {
                                echo '<a href="?page=' . ($current_page - 1) . '" class="btn btn-outline-primary" style="margin-right: 10px;">&lt; Previous</a>';
                            } else {
                                echo '<button class="btn btn-outline-secondary disabled" disabled>&lt; Previous</button>';
                            }
                        
                            // Display ellipsis if needed
                            if ($current_page > 3) {
                                echo '<span class="pagination-link" style="margin-right: 10px;">...</span>';
                            }
                        
                            // Page Numbers
                            for ($i = max(1, $current_page - 1); $i <= min($current_page + 1, $total_pages); $i++) {
                                if ($i == $current_page) {
                                    echo '<button class="btn btn-outline-primary active" style="margin-right: 10px;">' . $i . '</button>';
                                } else {
                                    echo '<a href="?page=' . $i . '" class="btn btn-outline-primary" style="margin-right: 10px;">' . $i . '</a>';
                                }
                            }
                        
                            // Display ellipsis if needed
                            if ($current_page < $total_pages - 2) {
                                echo '<span class="pagination-link" style="margin-right: 10px;">...</span>';
                            }
                        
                            // Next Button
                            if ($current_page < $total_pages) {
                                echo '<a href="?page=' . ($current_page + 1) . '" class="btn btn-outline-primary" style="margin-right: 10px;">Next &gt;</a>';
                            } else {
                                echo '<button class="btn btn-outline-secondary disabled" disabled>Next &gt;</button>';
                            }
                        
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                        
                        
                    
                        // Close the database connection
                        oci_free_statement($stmt);
                        oci_free_statement($total_stmt);
                        oci_close($db);
                        ?>
                    </div>
                </div>
                <div class="col-lg-3 sidebar">
                <div class="sidebar-box bg-white p-4 ftco-animate">
						<h3 class="heading-sidebar">Share Data</h3>
                        <?php
                        // Include database connection
                        include 'connect.php';

                        // Query to fetch data types from the database
                        $query = "SELECT DISTINCT AKSES FROM KATALOG_ALL_DATA ORDER BY AKSES";
                        $tipe_stmt = oci_parse($db, $query);
                        oci_execute($tipe_stmt);

                        $tipe_data = [];
                        while ($row = oci_fetch_assoc($tipe_stmt)) {
                            $tipe_data[] = $row['AKSES'];
                        }
                        ?>
						<form action="#" method="GET" class="browse-form">
                            <?php
                                // Retain previous search parameters
                                if (isset($_GET['search'])) {
                                    echo '<input type="hidden" name="search" value="' . htmlspecialchars($_GET['search'], ENT_QUOTES, 'UTF-8') . '">';
                                }
                                if (isset($_GET['simpul_jaringan'])) {
                                    echo '<input type="hidden" name="simpul_jaringan" value="' . htmlspecialchars($_GET['simpul_jaringan'], ENT_QUOTES, 'UTF-8') . '">';
                                }
                                if (isset($_GET['kategori'])) {
                                    echo '<input type="hidden" name="kategori" value="' . htmlspecialchars($_GET['kategori'], ENT_QUOTES, 'UTF-8') . '">';
                                }
                            ?>

                            <?php
                                echo '<label for="option-job-1"><input type="checkbox" id="option-job-1" name="tipe_data[]" value="Semua" ' . (isset($_GET['tipe_data']) && in_array('Semua', $_GET['tipe_data']) ? 'checked' : '') . '> Semua</label><br>';

                                // Generate checkboxes for each type from the database
                                foreach ($tipe_data as $index => $tipe) {
                                    $tipe_clean = htmlspecialchars($tipe, ENT_QUOTES, 'UTF-8');
                                    $checked = isset($_GET['tipe_data']) && in_array($tipe, $_GET['tipe_data']) ? 'checked' : '';
                                    echo '<label for="option-job-' . ($index + 2) . '"><input type="checkbox" id="option-job-' . ($index + 2) . '" name="tipe_data[]" value="' . $tipe_clean . '" ' . $checked . '> ' . $tipe_clean . '</label><br>';
                                }
                            ?>
                            <button type="submit" class="btn btn-primary mt-2">Filter</button>
                        </form>
					</div>
                </div>
            </div>
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
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
				stroke="#F96D00" />
		</svg></div>


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
	<script
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="js/google-map.js"></script>
	<script src="js/main.js"></script>

</body>

</html>