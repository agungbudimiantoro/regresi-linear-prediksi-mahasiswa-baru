<?php include '../../koneksi.php'; ?>

<?php
// tambah data
if (isset($_POST['add'])) {



  $id       = htmlspecialchars($_POST['id']);
  $nm_prodi       = htmlspecialchars($_POST['nm_prodi']);


  $query = ("INSERT into prodi values('" . $id . "','" . $nm_prodi . "')");
  if (mysqli_query($conn, $query)) {

    echo "
    <script language=javascript>
      alert('Data Baru Berhasil Ditambah');
      document.location.href='?p=prodi_data';
    </script>";
  } else {
    echo "
      <script language=javascript>
        alert('Data Gagal Ditambah');
        document.location.href='?p=prodi_data';
      </script>";
  }
}
?>

<?php
// edit data
if (isset($_POST['edit'])) {

  $id       = htmlspecialchars($_POST['id']);
  $nm_prodi       = htmlspecialchars($_POST['nm_prodi']);


  $query = ("UPDATE prodi SET 
  nm_prodi='" . $nm_prodi . "'
  WHERE kd_prodi='" . $id . "'");

  if (mysqli_query($conn, $query)) {

    echo "
    <script language=javascript>
      alert('Data Berhasil Dirubah');
      document.location.href='?p=prodi_data';
    </script>";
  } else {
    echo "
      <script language=javascript>
        alert('Data Gagal Dirubah');
        document.location.href='?p=prodi_data';
      </script>";
  }
}
?>

<?php
//if (isset($_POST['del'])) {
// hapus data
$id    = htmlspecialchars($_GET['id']);
$query = ("DELETE from prodi where kd_prodi='" . $id . "'");
if (mysqli_query($conn, $query)) {
  echo "
        <script language=javascript>
          alert('Data Berhasil Dihapus');
          document.location.href='?p=prodi_data';
        </script>";
} else {
  echo "
        <script language=javascript>
          alert('Data Gagal Dihapus');
          document.location.href='?p=tahun_ajaran_data';
        </script>";
  //}
} ?>
