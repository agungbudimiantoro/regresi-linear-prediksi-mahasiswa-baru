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
            <h1 class="text-center">LAPORAN DATA OBAT PERBULAN</h1>
            <?php include "../../koneksi.php"; ?>
            <div class="col-md-12">
                <canvas id="barChartObat" style="min-height: 300px; min-width: 200px; max-width: 100%;"></canvas>
            </div>
            <div class="row border p-3">
                <table class="table align-items-center mb-0 display" id="table_id">
                    <thead>
                        <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">kode obat</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">nama obat</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">jenis obat</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">jumlah</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">tanggal masuk</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">tanggal keluar</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">kode dokter</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tahun = $_GET['tahun'];
                        $no = 1;
                        $query = mysqli_query($conn, "SELECT * FROM obat where year(tgl_masuk_obat) = '$tahun'");
                        while ($data = mysqli_fetch_assoc($query)) {
                        ?><tr>
                                <td>
                                    <?= $no++ ?>
                                </td>
                                <td>
                                    <?= $data['kode_obat'] ?>
                                </td>
                                <td>
                                    <?= $data['nama_obat'] ?>
                                </td>
                                <td>
                                    <?= $data['jenis_obat'] ?>
                                </td>
                                <td>
                                    <?= $data['jumlah'] ?>
                                </td>
                                <td>
                                    <?= $data['tgl_masuk_obat'] ?>
                                </td>
                                <td>
                                    <?= $data['tgl_keluar_obat'] ?>
                                </td>
                                <td>
                                    <?= $data['kd_dokter'] ?>
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
    include "../data/laporan_obat_month.php";
    ?>
</body>

</html>