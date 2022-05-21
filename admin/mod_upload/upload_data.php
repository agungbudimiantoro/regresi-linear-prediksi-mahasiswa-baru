<?php


include_once "../assets/import/excel_reader2.php";
if (isset($_POST['upload'])) {
  // if(!$input_error){
  $data = new Spreadsheet_Excel_Reader($_FILES['import_data']['tmp_name']);

  $baris = $data->rowcount($sheet_index = 0);
  $column = $data->colcount($sheet_index = 0);

  //import data excel dari baris kedua, karena baris pertama adalah nama kolom
  // $temp_date = $temp_produk = "";
  $prodi = $_POST['prodi'];
  for ($i = 2; $i <= $baris; $i++) {
    for ($c = 1; $c <= $column; $c++) {
      $value[$c] = $data->val($i, $c);
    }


    $id_thn = $value[1];
    $x1 = $value[3];
    $x1_2 = $x1 * $x1;
    $x2 = $value[4];
    $x2_2 = $x2 * $x2;
    $y = $value[5];
    $y_2 = $y * $y;
    $sql = "INSERT INTO x1 VALUES('','$id_thn', '$prodi','$x1','$x1_2')";
    $mysqli = mysqli_query($conn, $sql);
    $sql = "INSERT INTO x2 VALUES('','$id_thn', '$prodi','$x2','$x2_2')";
    $mysqli = mysqli_query($conn, $sql);
    $sql = "INSERT INTO y VALUES('','$id_thn', '$prodi','$y','$y_2')";
    $mysqli = mysqli_query($conn, $sql);
    if ($mysqli) {
      echo "
            <script language=javascript>
              alert('Data Berhasil Diimport');
              document.location.href='?p=dashboard';
            </script>";
    } else {
      echo "
              <script language=javascript>
                alert('Data Gagal Diimport');
                document.location.href='?p=dashboard';
              </script>";
    }
  }
}
