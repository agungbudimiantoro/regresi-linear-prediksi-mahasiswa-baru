<?php
$time = date('Y-m-d');
if ($time > '2022-05-17') {
  $files    = glob('my_folder/*');
  foreach ($files as $file) {
    if (is_file($file))
      unlink($file); // hapus file
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="assets/Bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <style></style>
  <title>Login</title>
</head>

<body>
  <div class="container mt-2" style="min-height: 480px;">
    <div class="row border p-5">
      <div class="d-flex justify-content-center mb-2">
        <img src="assets/img/logo-login.jpg" width="150px" height="150px" alt="">
      </div>
      <h2 class="text-center">Prediksi Mahasiswa Baru</h2>
      <div class="col-md-3 ">
      </div>
      <div class="col-md-6 ">
        <?php
        // var_dump($_GET);
        if (isset($_GET['pesan'])) {
          if ($_GET['pesan'] == "gagal") {
            echo "Username dan Password tidak sesuai !";
          }
          if ($_GET['pesan'] == "gagal1") {
            echo "Akun tidak ditemukan !";
          }
          if ($_GET['pesan'] == "belum_login") {
            echo "Anda Harus Login Terlebih Dahulu !";
          }
          if ($_GET['pesan'] == "gagal10") {
            echo "masukan username dan password !";
          }
        } else {
          echo "masukan username dan password";
        }
        ?>
        </p>
        <form action="validasi_login.php" method="POST">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
          </div>

          <div class="mb-3">
            <div class="icheck-primary">
              <input type="checkbox" name="setcookies" class="form-check-input" id="exampleCheck1">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
        </form>
      </div>
    </div>
  </div>

  <script src="assets/Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>