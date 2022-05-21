<?php include '../../koneksi.php'; ?>

<?php
// tambah data
if (isset($_POST['add'])) {



  $id       = htmlspecialchars($_POST['id']);
  $tahun_ajaran       = htmlspecialchars($_POST['tahun_ajaran']);


  $query = ("INSERT into tahun_ajaran values('" . $id . "','" . $tahun_ajaran . "')");
  if (mysqli_query($conn, $query)) {

    echo "
    <script language=javascript>
      alert('Data Baru Berhasil Ditambah');
      document.location.href='?p=tahun_ajaran_data';
    </script>";
  } else {
    echo "
      <script language=javascript>
        alert('Data Gagal Ditambah');
        document.location.href='?p=tahun_ajaran_data';
      </script>";
  }
}
?>

<?php
// edit data
if (isset($_POST['edit'])) {

  $id       = htmlspecialchars($_POST['id']);
  $tahun_ajaran       = htmlspecialchars($_POST['tahun_ajaran']);


  $query = ("UPDATE tahun_ajaran SET 
  tahun_ajaran='" . $tahun_ajaran . "'
  WHERE id_thn_ajaran='" . $id . "'");

  if (mysqli_query($conn, $query)) {

    echo "
    <script language=javascript>
      alert('Data Berhasil Dirubah');
      document.location.href='?p=tahun_ajaran_data';
    </script>";
  } else {
    echo "
      <script language=javascript>
        alert('Data Gagal Dirubah');
        document.location.href='?p=tahun_ajaran_data';
      </script>";
  }
}
?>

<?php
//if (isset($_POST['del'])) {
// hapus data
$id    = htmlspecialchars($_GET['id']);
$query = ("DELETE from tahun_ajaran where id_thn_ajaran='" . $id . "'");
if (mysqli_query($conn, $query)) {
  echo "
        <script language=javascript>
          alert('Data Berhasil Dihapus');
          document.location.href='?p=tahun_ajaran_data';
        </script>";
} else {
  echo "
        <script language=javascript>
          alert('Data Gagal Dihapus');
          document.location.href='?p=tahun_ajaran_data';
        </script>";
  //}
} ?>
