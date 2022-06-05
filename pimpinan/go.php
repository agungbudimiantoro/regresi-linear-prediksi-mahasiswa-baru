<?php
$p             = empty($_GET['p']) ? "" : $_GET['p'];
if ($p == "") {
    $nav     = "Dashboard";
    $judul     = "Dashboard";
    $ambil     = "dashboard.php";
} elseif ($p == "pilih") {

    $nav     = "pilih";
    $judul     = "pilih data";
    $ambil     = "mod_laporan/$p.php";
} else {
    $nav     = "Dashboard";
    $judul     = "dashboard";
    $ambil     = "dashboard.php";
}
