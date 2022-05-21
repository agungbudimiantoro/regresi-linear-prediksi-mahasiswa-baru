<?php
$p             = empty($_GET['p']) ? "" : $_GET['p'];
if ($p == "") {
    $nav     = "Dashboard";
    $judul     = "Dashboard";
    $ambil     = "dashboard.php";
} elseif ($p == "laporan_obat") {
    //obat 
    $nav     = "obat";
    $judul     = "obat data";
    $ambil     = "laporan/$p.php";
} elseif ($p == "laporan_rawat_inap") {
    //rawat_inap 
    $nav     = "rawat_inap";
    $judul     = "rawat_inap data";
    $ambil     = "laporan/$p.php";
} elseif ($p == "laporan_rawat_jalan") {
    //rawat_jalan 
    $nav     = "rawat_jalan";
    $judul     = "rawat_jalan data";
    $ambil     = "laporan/$p.php";
} else {
    $nav     = "Dashboard";
    $judul     = "dashboard";
    $ambil     = "dashboard.php";
}
