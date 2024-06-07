<?php
include 'connect.php';

// Get data from form
$id = isset($_POST['ID']) ? intval($_POST['ID']) : 0;
$title = isset($_POST['TITLE']) ? $_POST['TITLE'] : '';
$alias = isset($_POST['ALIAS_TITLE']) ? $_POST['ALIAS_TITLE'] : '';
$owner = isset($_POST['OWNER']) ? $_POST['OWNER'] : '';
$created = isset($_POST['CREATED']) ? $_POST['CREATED'] : '';
$modified = isset($_POST['MODIFIED']) ? $_POST['MODIFIED'] : '';
$portal = isset($_POST['PORTAL']) ? $_POST['PORTAL'] : '';
$tipedata = isset($_POST['TIPEDATA']) ? $_POST['TIPEDATA'] : '';
$urldata = isset($_POST['URLDATA']) ? $_POST['URLDATA'] : '';
$akses = isset($_POST['AKSES']) ? $_POST['AKSES'] : '';
$ownerfolder = isset($_POST['OWNERFOLDER']) ? $_POST['OWNERFOLDER'] : '';
$folder = isset($_POST['FOLDER']) ? $_POST['FOLDER'] : '';
$numviews = isset($_POST['NUMVIEWS']) ? $_POST['NUMVIEWS'] : '';
$skpd = isset($_POST['SKPD']) ? $_POST['SKPD'] : '';
$kategori = isset($_POST['KATEGORI']) ? $_POST['KATEGORI'] : '';
$deskripsi = isset($_POST['DESKRIPSI_SERVICE']) ? $_POST['DESKRIPSI_SERVICE'] : '';

// Update data in the database
$sql = "UPDATE KATALOG_ALL_DATA SET TITLE= :title, ALIAS_TITLE= :alias, OWNER= :owner, CREATED= :created, MODIFIED= :modified, PORTAL= :portal, TIPEDATA= :tipedata, URLDATA= :urldata, AKSES= :akses, OWNERFOLDER= :ownerfolder, FOLDER= :folder, NUMVIEWS= :numviews, SKPD= :skpd, KATEGORI= :kategori, DESKRIPSI_SERVICE= :deskripsi WHERE ID = :id";
$stmt = oci_parse($db, $sql);

oci_bind_by_name($stmt, ':id', $id);
oci_bind_by_name($stmt, ':title', $alias_title);
oci_bind_by_name($stmt, ':alias', $alias);
oci_bind_by_name($stmt, ':owner', $owner);
oci_bind_by_name($stmt, ':created', $created);
oci_bind_by_name($stmt, ':modified', $modified);
oci_bind_by_name($stmt, ':portal', $portal);
oci_bind_by_name($stmt, ':tipedata', $tipedata);
oci_bind_by_name($stmt, ':urldata', $urldata);
oci_bind_by_name($stmt, ':akses', $akses);
oci_bind_by_name($stmt, ':ownerfolder', $ownerfolder);
oci_bind_by_name($stmt, ':folder', $folder);
oci_bind_by_name($stmt, ':numviews', $numviews);
oci_bind_by_name($stmt, ':skpd', $skpd);
oci_bind_by_name($stmt, ':kategori', $kategori);
oci_bind_by_name($stmt, ':deskripsi', $deskripsi);

if (oci_execute($stmt)) {
    oci_free_statement($stmt);
    oci_close($db);
    // Redirect to data page
    header("Location: data.php");
    exit; // Ensure no further code is executed after redirection
} else {
    $e = oci_error($stmt);
    echo "Error updating data: " . $e['message'];
    oci_free_statement($stmt);
    oci_close($db);
}
?>
