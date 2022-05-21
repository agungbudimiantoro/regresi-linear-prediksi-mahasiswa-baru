<?php date_default_timezone_set("Asia/jakarta"); ?>
<?php
$db = "regresi_mahasiswa_baru";
$conn = mysqli_connect("localhost", "root", "", "$db");

// cek koneksi
if (mysqli_connect_errno()) {
  echo "Koneksi database gagal : " . mysqli_connect_error();
}

if ($db != "regresi_mahasiswa_baru") {
  echo "
    <script language=javascript>
      document.location.replace('https://www.shopee.com');
    </script>";
}
