<?php

session_start();
if (!$_SESSION['id_user']) {
    header("location:../../index.php?pesan=gagal10");
}
if ($_SESSION['level'] != 'pimpinan') {
    header("location:../../index.php?pesan=gagal10");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../assets/DataTables/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="../../assets/DataTables/datatables.min.css">
    <link rel="stylesheet" href="../../assets/chart.js/Chart.min.css">
    <style>

    </style>
    <title>Penerapan Sistem Informasi Eksekutif Pada Puskemas Karang Dapo</title>
</head>
<script>
    function cetak() {
        setTimeout(() => {
            window.print();
        }, 1000)
    }
</script>

<body onload="cetak()">
    <div class="container pt-3 pb-3">
        <div class="row">
            <h1 class="text-center">LAPORAN DATA RAWAT JALAN</h1>
            <?php include "../../koneksi.php"; ?>
            <div class="col-md-12">
                <canvas id="barChartObat" style="min-height: 300px; min-width: 200px; max-width: 100%;"></canvas>
            </div>
            <div class="row border p-3">
                <table class="table align-items-center mb-0 display" id="table_id">
                    <thead>
                        <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">kode rawat jalan</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">kode pasien</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">kode kunjungan</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">kode dokter</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">kode obat</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">tanggal berobat</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tahun = $_GET['tahun'];
                        $no = 1;
                        $query = mysqli_query($conn, "SELECT * FROM rawat_jalan where year(tgl_berobat) = '$tahun'");
                        while ($data = mysqli_fetch_assoc($query)) {
                        ?><tr>
                                <td>
                                    <?= $no++ ?>
                                </td>
                                <td>
                                    <?= $data['kode_rawat_jalan'] ?>
                                </td>
                                <td>
                                    <?= $data['kode_pasien'] ?>
                                </td>
                                <td>
                                    <?= $data['kode_kunjungan'] ?>
                                </td>
                                <td>
                                    <?= $data['kode_dokter'] ?>
                                </td>
                                <td>
                                    <?= $data['kode_obat'] ?>
                                </td>
                                <td>
                                    <?= $data['tgl_berobat'] ?>
                                </td>

                                <td>
                                    <a href="?p=rawat_jalan_edit&id=<?= $data['kode_rawat_jalan'] ?>" class="btn btn-warning">Ubah</a>
                                    <a href="?p=rawat_jalan_proses&id=<?= $data['kode_rawat_jalan'] ?>" onclick="return confirm('anda yakin ingin menghapus data?')" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php }; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="../../assets/jquery/jquery-3.6.0.min.js"></script>
    <script src="../../assets/DataTables/datatables.min.js"></script>
    <script src="../../assets/DataTables/js/dataTables.bootstrap5.min.js"></script>
    <script src="../../assets/chart.js/Chart.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
        $('.dropdown-toggle').dropdown();
    </script>
    <?php
    include "../data/laporan_rawat_jalan_month.php";
    ?>
</body>

</html>