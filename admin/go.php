<?php
$p             = empty($_GET['p']) ? "" : $_GET['p'];
if ($p == "") {
    $nav     = "Dashboard";
    $judul     = "Dashboard";
    $ambil     = "dashboard.php";
} elseif ($p == "user_data") {
    //user 
    $nav     = "User";
    $judul     = "User data";
    $ambil     = "mod_user/$p.php";
} elseif ($p == "user_tambah") {
    $nav     = "User";
    $judul     = "User tambah";
    $ambil     = "mod_user/$p.php";
} elseif ($p == "user_edit") {
    $nav     = "User";
    $judul     = "User edit";
    $ambil     = "mod_user/$p.php";
} elseif ($p == "user_proses") {
    $nav     = "User";
    $judul     = "User proses";
    $ambil     = "mod_user/$p.php";
} elseif ($p == "prodi_data") {
    //prodi 
    $nav     = "prodi";
    $judul     = "prodi data";
    $ambil     = "mod_prodi/$p.php";
} elseif ($p == "prodi_tambah") {
    $nav     = "prodi";
    $judul     = "prodi tambah";
    $ambil     = "mod_prodi/$p.php";
} elseif ($p == "prodi_edit") {
    $nav     = "prodi";
    $judul     = "prodi edit";
    $ambil     = "mod_prodi/$p.php";
} elseif ($p == "prodi_proses") {
    $nav     = "prodi";
    $judul     = "prodi proses";
    $ambil     = "mod_prodi/$p.php";
} elseif ($p == "tahun_ajaran_data") {
    //tahun_ajaran 
    $nav     = "tahun_ajaran";
    $judul     = "tahun_ajaran data";
    $ambil     = "mod_tahun_ajaran/$p.php";
} elseif ($p == "tahun_ajaran_tambah") {
    $nav     = "tahun_ajaran";
    $judul     = "tahun_ajaran tambah";
    $ambil     = "mod_tahun_ajaran/$p.php";
} elseif ($p == "tahun_ajaran_edit") {
    $nav     = "tahun_ajaran";
    $judul     = "tahun_ajaran edit";
    $ambil     = "mod_tahun_ajaran/$p.php";
} elseif ($p == "tahun_ajaran_proses") {
    $nav     = "tahun_ajaran";
    $judul     = "tahun_ajaran proses";
    $ambil     = "mod_tahun_ajaran/$p.php";
} elseif ($p == "x1_data") {
    //data
    $nav     = "x1";
    $judul     = "Data X1 (Jumlah Biaya)";
    $ambil     = "mod_upload/$p.php";
} elseif ($p == "x2_data") {
    //data
    $nav     = "x2";
    $judul     = "Data X2 (Jumlah Pendaftar)";
    $ambil     = "mod_upload/$p.php";
} elseif ($p == "y_data") {
    //data
    $nav     = "y";
    $judul     = "Data Y (Jumlah Mahasiswa Baru)";
    $ambil     = "mod_upload/$p.php";
} elseif ($p == "x1_tambah") {
    $nav     = "x1";
    $judul     = "x1 tambah";
    $ambil     = "mod_upload/$p.php";
} elseif ($p == "x1_hapus") {
    $nav     = "x1";
    $judul     = "x1 hapus";
    $ambil     = "mod_upload/$p.php";
} elseif ($p == "upload_data") {
    $nav     = "upload";
    $judul     = "upload data";
    $ambil     = "mod_upload/$p.php";
} elseif ($p == "user_info") {
    //info 
    $nav     = "User";
    $judul     = "User info";
    $ambil     = "mod_user/$p.php";
} elseif ($p == "tahun_ajaran_info") {
    $nav     = "tahun_ajaran";
    $judul     = "tahun_ajaran info";
    $ambil     = "mod_tahun_ajaran/$p.php";
} elseif ($p == "prodi_info") {
    //info 
    $nav     = "prodi";
    $judul     = "prodi info";
    $ambil     = "mod_prodi/$p.php";
} else {
    $nav     = "Dashboard";
    $judul     = "dashboard";
    $ambil     = "dashboard.php";
}
