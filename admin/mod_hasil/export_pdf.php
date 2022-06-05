<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Untitled Document</title>
</head>
<script>
    function cetak() {
        setTimeout(() => {
            window.print();
        }, 1000)
    }
</script>

<body onload="cetak()">

    <?php
    include '../../koneksi.php';
    ?>
    <?php

    $tampil_prodi = mysqli_query($conn, "SELECT * FROM prodi WHERE kd_prodi='$_GET[prodi]'");
    $res = mysqli_fetch_array($tampil_prodi);
    $prodi = $res['nm_prodi'];
    ?>

    <h4 style="text-align: center; text-transform:uppercase;">
        LAPORAN HASIL PERHITUNGAN PREDIKSI MAHASISWA BARU PRODI <?php echo $prodi ?>
    </h4>
    <h4 style="text-align: center;">
        DI UNIVERSITAS MUSIRAWAS
    </h4>
    <table width="100%" border="1">
        <tr>
            <th style="background-color:#999;">Tahun Ajaran</th>
            <th style="background-color:#999;">Biaya</th>
            <th style="background-color:#999;">Pendaftar</th>
            <th style="background-color:#999;">Mahasiswa Baru</th>
        </tr>
        <?php
        $no = 1;
        $nm_user = $_GET['nm_user'];
        $kd_prodi = $_GET['prodi'];
        $tahun = 0;
        $queryPrediksi = mysqli_query($conn, "SELECT * FROM perhitungan_prediksi where kd_prodi = '$kd_prodi'");
        $dataPrediksi = mysqli_fetch_assoc($queryPrediksi);

        $id_tahun_awal = $dataPrediksi['id_tahun_awal'];
        $id_tahun_akhir = $dataPrediksi['id_tahun_akhir'];

        $querytahun = mysqli_query($conn, "SELECT * FROM tahun_ajaran");
        while ($datatahun = mysqli_fetch_assoc($querytahun)) {
            if ($id_tahun_awal == $datatahun['id_thn_ajaran']) {
                $tahun_awal = $datatahun['tahun_ajaran'];
            }
            if ($id_tahun_akhir == $datatahun['id_thn_ajaran']) {
                $tahun_akhir = $datatahun['tahun_ajaran'];
            }
        };

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
        ?>
            <tr>

                <td>
                    <?php echo $data['tahun_ajaran'] ?>
                </td>
                <?php $tahun = $data['tahun_ajaran'] ?>
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
        <?php } ?>

        <tr>
            <td style="background-color:#0099CC;">PREDIKSI <?php echo $tahun + 1; ?></td>
            <td style="background-color:#CCCC00;"><?php echo $dataPrediksi['biaya']; ?></td>
            <td style="background-color:#CCCC00;"><?php echo $dataPrediksi['jmlh_pendaftar']; ?></td>
            <td style="background-color:#CCCC00;"><?php echo $dataPrediksi['jmlh_mahasiswa_baru']; ?></td>
        </tr>
    </table>
    <p> Hasil prediksi untuk tahun angkatan priode berikutnya yaitu :
        <b><?php echo  $dataPrediksi['jmlh_mahasiswa_baru']; ?></b>

    </p>
    <br>
    <br>
    <table align="right">
        <tr>
            <td></td>
            <td>
                <p class="text-center"><small>Lubuklinggau, <?php echo date('d-M-Y') ?></small></p>
                <p class="text-center"><small>Mengetahui,</small></p>
                <br>
                <br>
                <br>
                <p class="text-center"><small>( <?php echo $nm_user ?> )</small></p>
            </td>
        </tr>
    </table>
</body>

</html>