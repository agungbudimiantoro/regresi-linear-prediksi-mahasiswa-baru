<h3 class="text-center text-uppercase">prediksi mahasiswa baru dengan metode</h3>
<h3 class="text-center text-uppercase">regresi linear berganda</h3>

<br>
<?php
if (isset($_POST['prodi'])) {
    $kd_prodi = $_POST['prodi'];
} else {
    echo "
        <script language=javascript>
          document.location.href='?p=hasil_pilih';
        </script>";
}

$tahun_awal = $_POST['tahun_awal'];
$tahun_akhir = $_POST['tahun_akhir'];
$query = mysqli_query($conn, "SELECT * FROM prodi where kd_prodi = '$kd_prodi'");
$data_prodi = mysqli_fetch_assoc($query);
$query1 = mysqli_query($conn, "SELECT * FROM tahun_ajaran");
while ($row_tahun = mysqli_fetch_assoc($query1)) {
    if ($tahun_awal == $row_tahun['tahun_ajaran']) {
        $id_tahun_awal = $row_tahun['id_thn_ajaran'];
    };
    if ($tahun_akhir == $row_tahun['tahun_ajaran']) {
        $id_tahun_akhir = $row_tahun['id_thn_ajaran'];
    };
}


?>
<h5 class="text-capitalize">Prodi : <?php echo $data_prodi['nm_prodi'] ?> </h5>
<h5 class="text-capitalize">Tahun Perhitungan : <?php echo $tahun_awal ?> - <?php echo $tahun_akhir ?> </h5>
<br>
<table class="table align-items-center mb-0 display">
    <thead>
        <tr>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tahun Ajaran</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Biaya</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pendaftar</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mahasiswa Baru</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $query = mysqli_query($conn, "SELECT * FROM prodi, tahun_ajaran, x1, x2, y 
                WHERE tahun_ajaran.id_thn_ajaran = x1.id_thn_ajaran
                and x1.id_thn_ajaran = x2.id_thn_ajaran
                and x2.id_thn_ajaran = y.id_thn_ajaran
                and prodi.kd_prodi = y.kd_prodi
                and x1.kd_prodi = x2.kd_prodi
                and prodi.kd_prodi = '$kd_prodi'
                and tahun_ajaran.tahun_ajaran >= '$tahun_awal'
                and tahun_ajaran.tahun_ajaran <= '$tahun_akhir'
                ");
        while ($data = mysqli_fetch_assoc($query)) {
        ?><tr>
                <td>
                    <?php echo $no++ ?>
                </td>
                <td>
                    <?php echo $data['tahun_ajaran'] ?>
                </td>
                <td>
                    <?php echo $data['x1'] ?>
                </td>
                <td>
                    <?php echo $data['x2'] ?>
                </td>
                <td>
                    <?php echo $data['y'] ?>
                </td>
            </tr>
        <?php }; ?>
    </tbody>
</table>
<br>

<?php
$x1_data = '';
$x2_data = '';

$y_hasil = '';
if (isset($_POST['hitung'])) {

    // n
    $tampil = mysqli_query($conn, "select count(*) as jum_res from x1, x2, tahun_ajaran where x1.id_thn_ajaran=x2.id_thn_ajaran and x1.kd_prodi=x2.kd_prodi and x1.kd_prodi='$_POST[prodi]'     and x1.id_thn_ajaran = tahun_ajaran.id_thn_ajaran
    and tahun_ajaran.tahun_ajaran >= '$tahun_awal'
              and tahun_ajaran.tahun_ajaran <= '$tahun_akhir'");
    $data = mysqli_fetch_assoc($tampil);
    $n = $data["jum_res"];

    //totx1
    $tampil = mysqli_query($conn, "SELECT sum(x1.x1) as totx1 from x1, tahun_ajaran WHERE kd_prodi='$_POST[prodi]'
    and x1.id_thn_ajaran = tahun_ajaran.id_thn_ajaran
      and tahun_ajaran.tahun_ajaran >= '$tahun_awal'
                and tahun_ajaran.tahun_ajaran <= '$tahun_akhir'");
    $data = mysqli_fetch_assoc($tampil);
    $totx1 = $data["totx1"];


    //totx2
    $tampil = mysqli_query($conn, "SELECT sum(x2.x2) as totx2 from x2, tahun_ajaran WHERE kd_prodi='$_POST[prodi]'
        and x2.id_thn_ajaran = tahun_ajaran.id_thn_ajaran
      and tahun_ajaran.tahun_ajaran >= '$tahun_awal'
                and tahun_ajaran.tahun_ajaran <= '$tahun_akhir'");
    $data = mysqli_fetch_assoc($tampil);
    $totx2 = $data["totx2"];

    //toty
    $tampil = mysqli_query($conn, "SELECT sum(y.y) as toty from y, tahun_ajaran WHERE kd_prodi='$_POST[prodi]'
        and y.id_thn_ajaran = tahun_ajaran.id_thn_ajaran
      and tahun_ajaran.tahun_ajaran >= '$tahun_awal'
                and tahun_ajaran.tahun_ajaran <= '$tahun_akhir'");
    $data = mysqli_fetch_assoc($tampil);
    $toty = $data["toty"];

    //totx1_2
    $tampil = mysqli_query($conn, "SELECT sum(x1.x1*x1.x1) as totx1_2 from x1, tahun_ajaran WHERE kd_prodi='$_POST[prodi]'
        and x1.id_thn_ajaran = tahun_ajaran.id_thn_ajaran
      and tahun_ajaran.tahun_ajaran >= '$tahun_awal'
                and tahun_ajaran.tahun_ajaran <= '$tahun_akhir'");
    $data = mysqli_fetch_assoc($tampil);
    $totx1_2  = $data["totx1_2"];

    //totx2_2
    $tampil = mysqli_query($conn, "SELECT sum(x2.x2*x2.x2) as totx2_2 from x2, tahun_ajaran WHERE kd_prodi='$_POST[prodi]'
        and x2.id_thn_ajaran = tahun_ajaran.id_thn_ajaran
      and tahun_ajaran.tahun_ajaran >= '$tahun_awal'
                and tahun_ajaran.tahun_ajaran <= '$tahun_akhir'");
    $data = mysqli_fetch_assoc($tampil);
    $totx2_2  = $data["totx2_2"];

    //totx1_y
    $tampil = mysqli_query($conn, "SELECT sum(x1.x1*y.y) as totx1_y from x1, y, tahun_ajaran WHERE x1.id_thn_ajaran = y.id_thn_ajaran and x1.kd_prodi=y.kd_prodi and x1.kd_prodi='$_POST[prodi]'
        and x1.id_thn_ajaran = tahun_ajaran.id_thn_ajaran
      and tahun_ajaran.tahun_ajaran >= '$tahun_awal'
                and tahun_ajaran.tahun_ajaran <= '$tahun_akhir'");
    $data = mysqli_fetch_assoc($tampil);
    $totx1_y  = $data["totx1_y"];

    //totx2_y
    $tampil = mysqli_query($conn, "SELECT sum(x2.x2*y.y) as totx2_y from x2, y, tahun_ajaran WHERE x2.id_thn_ajaran = y.id_thn_ajaran and x2.kd_prodi=y.kd_prodi and x2.kd_prodi='$_POST[prodi]'
        and x2.id_thn_ajaran = tahun_ajaran.id_thn_ajaran
      and tahun_ajaran.tahun_ajaran >= '$tahun_awal'
                and tahun_ajaran.tahun_ajaran <= '$tahun_akhir'");
    $data = mysqli_fetch_assoc($tampil);
    $totx2_y  = $data["totx2_y"];

    //totx1_x2
    $tampil = mysqli_query($conn, "SELECT sum(x1.x1*x2.x2) as totx1_x2 from x1, x2, tahun_ajaran WHERE x1.id_thn_ajaran = x2.id_thn_ajaran and x1.kd_prodi=x2.kd_prodi and x1.kd_prodi='$_POST[prodi]'
        and x1.id_thn_ajaran = tahun_ajaran.id_thn_ajaran
      and tahun_ajaran.tahun_ajaran >= '$tahun_awal'
                and tahun_ajaran.tahun_ajaran <= '$tahun_akhir'");
    $data = mysqli_fetch_assoc($tampil);
    $totx1_x2  = $data["totx1_x2"];

    function deterM($a1, $a2, $a3, $b1, $b2, $b3, $c1, $c2, $c3)
    {
        $result = ($a1 * $b2 * $c3) + ($a2 * $b3 * $c1) + ($a3 * $b1 * $c2) - ($a3 * $b2 * $c1) - ($a1 * $b3 * $c2) - ($a2 * $b1 * $c3);
        return $result;
    }

    $A = deterM(
        $n,
        $totx1,
        $totx2,
        $totx1,
        $totx1_2,
        $totx1_x2,
        $totx2,
        $totx1_x2,
        $totx2_2
    );
    $A0 = deterM(
        $toty,
        $totx1_y,
        $totx2_y,
        $totx1,
        $totx1_2,
        $totx1_x2,
        $totx2,
        $totx1_x2,
        $totx2_2
    );

    $A1 = deterM(
        $n,
        $totx1,
        $totx2,
        $toty,
        $totx1_y,
        $totx2_y,
        $totx2,
        $totx1_x2,
        $totx2_2
    );

    $A2 = deterM(
        $n,
        $totx1,
        $totx2,
        $totx1,
        $totx1_2,
        $totx1_x2,
        $toty,
        $totx1_y,
        $totx2_y
    );


    $konstanta = $A0 / $A;
    $b1 = $A1 / $A;
    $b2 = $A2 / $A;

    $x1_data = $_POST['x1'];
    $x2_data = $_POST['x2'];

    $y_hasil = floor(($konstanta + ($b1 * $x1_data) + ($b2 * $x2_data)));
    if ($y_hasil < 0) {
        $y_hasil = 0;
    }
    $ssql = mysqli_query($conn, "SELECT * FROM perhitungan_prediksi where kd_prodi='$kd_prodi'");
    $daata = mysqli_fetch_assoc($ssql);
    if ($daata) {
        $id = $daata['kd_hitung'];
        $query = ("UPDATE perhitungan_prediksi SET 
        biaya='" . $x1_data . "'
        , jmlh_pendaftar='" . $x2_data . "'
        , jmlh_mahasiswa_baru='" . $y_hasil . "'
        , id_user='" . $id_user . "'
        , id_tahun_awal='" . $id_tahun_awal . "'
        , id_tahun_akhir='" . $id_tahun_akhir . "'
        WHERE kd_hitung='" . $id . "'");
    } else {
        $query = ("INSERT into perhitungan_prediksi values('','" . $kd_prodi . "','" . $id_user . "','" . $x1_data . "','" . $x2_data . "','" . $y_hasil . "','" . $id_tahun_awal . "','" . $id_tahun_akhir . "','','','')");
    }
    if (mysqli_query($conn, $query)) {
        echo "
        <script language=javascript>
          alert('prediksi berhasil dihitung');
        </script>";
    } else {
        echo "
        <script language=javascript>
        alert('prediksi berhasil dihitung');
          document.location.href='?p=hasil_pilih';
        </script>";
    }
}
?>

<form action="?p=hasil_perhitungan" method="POST">
    <div class="row ">
        <div class="col-md-8 row border  pt-4">
            <table>
                <tr>
                    <td>
                        <p class="mb-4">Masukan jumlah Biaya (X1)</p>
                    </td>
                    <td>
                        <input type="text" name="x1" value="<?php echo $x1_data ?>" class="mb-3 form-control" id="x1" aria-describedby="emailHelp" required>
                        <input type="text" name="prodi" hidden value="<?php echo $kd_prodi ?>" class="mb-3 form-control" id="x1" aria-describedby="emailHelp" required>
                        <input type="text" name="tahun_awal" hidden value="<?php echo $tahun_awal ?>" class="mb-3 form-control" id="x1" aria-describedby="emailHelp" required>
                        <input type="text" name="tahun_akhir" hidden value="<?php echo $tahun_akhir ?>" class="mb-3 form-control" id="x1" aria-describedby="emailHelp" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="mb-4">Masukan jumlah Pendaftar (X2)</p>
                    </td>
                    <td> <input type="text" name="x2" value="<?php echo $x2_data ?>" class="mb-3 form-control" id="x2" aria-describedby="emailHelp" required></td>
                </tr>
                <tr>
                    <td>
                        <p class="mb-4">Hasil Prediksi untuk mahasiswa baru preiode berikutnya yaitu:</p>
                    </td>
                    <td>
                        <input type="text" name="y" value="<?php echo $y_hasil ?>" class="mb-3 form-control" id="y" aria-describedby="emailHelp" readonly>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <button type="submit" name="hitung" class="btn btn-primary">Hitung</button>
            <a href="?p=hitung_detail" class="btn btn-warning">detail</a>
            <a target="_blank" href="mod_hasil/export_excel.php?x1=<?php echo $x1_data ?>&x2=<?php echo $x2_data ?>&y=<?php echo $y_hasil ?>&prodi=<?php echo $_POST['prodi']; ?>" class="btn btn-success">export.excel</a>
            <a target="_blank" href="mod_hasil/export_pdf.php?x1=<?php echo $x1_data ?>&x2=<?php echo $x2_data ?>&y=<?php echo $y_hasil ?>&prodi=<?php echo $_POST['prodi']; ?>&nm_user=<?php echo $_SESSION['nm_user'] ?>" class="btn btn-danger">export.pdf</a>
        </div>
        <div class="col-md-4"></div>
    </div>
</form>