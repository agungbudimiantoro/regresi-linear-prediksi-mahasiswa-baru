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
    <title>Regresi Linear</title>
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
            <h3 class="text-center">LAPORAN DATA PROGRAM STUDI</h3>
            <h3 class="text-center">DI UNIVERSITAS MUSI RAWAS</h3>
            <?php include "../../koneksi.php"; ?>
            <br>
            <br>
            <br>
            <div class="row border pt-5 p-3">
                <table class="table align-items-center mb-0 display">
                    <thead>
                        <tr>
                            <th width="50%" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Prodi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $nm_user = $_GET['nm_user'];
                        $query = mysqli_query($conn, "SELECT * FROM prodi");
                        while ($data = mysqli_fetch_assoc($query)) {
                        ?><tr>
                                <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    <?php echo $no++ ?>
                                </td>
                                <td>
                                    <?php echo $data['nm_prodi'] ?>
                                </td>
                            </tr>
                        <?php }; ?>
                    </tbody>
                </table>
                <br>
                <table class="mt-3">
                    <tr>
                        <td width="65%"></td>
                        <td>
                            <p class="text-center"><small>Lubuklinggau, <?php echo date('d-M-Y') ?></small></p>
                            <p class="text-center"><small>Mengetahui,</small></p>
                            <p class="text-center"><small>Pimpinan</small></p>
                            <br>
                            <br>
                            <br>
                            <p class="text-center"><small>( <?php echo $nm_user ?> )</small></p>
                        </td>
                    </tr>
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

</body>

</html>