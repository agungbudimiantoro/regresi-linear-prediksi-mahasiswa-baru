<?php
// if (isset($_POST['laporan'])) {
//     $laporan = $_POST['laporan'];
//     echo "
//     <script language=javascript>
//       document.location.href='?p=user_data';
//     </script>";
// }
?>
<div class="row">
    <div class="col-md-3">
        <div class="card border-success mb-3">
            <div class="card-header">Total User</div>
            <div class="card-body text-success">
                <?php
                $query = mysqli_query($conn, "SELECT COUNT(id_user) as total from user");
                $data = mysqli_fetch_assoc($query);
                ?>
                <h1 class="card-title"><?= $data['total']; ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-warning mb-3">
            <?php
            $query = mysqli_query($conn, "SELECT COUNT(kode_pasien) as total from pasien");
            $data = mysqli_fetch_assoc($query);
            ?>
            <div class="card-header">Total Pasien</div>
            <div class="card-body text-warning">
                <h1 class="card-title"><?= $data['total']; ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-primary mb-3">
            <div class="card-header">Total Kunjungan</div>
            <?php
            $query = mysqli_query($conn, "SELECT COUNT(kode_kunjungan) as total from kunjungan");
            $data = mysqli_fetch_assoc($query);
            ?>
            <div class="card-body text-primary">
                <h1 class="card-title"><?= $data['total']; ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-danger mb-3">
            <div class="card-header">Total Dokter</div>
            <div class="card-body text-danger">
                <?php
                $query = mysqli_query($conn, "SELECT COUNT(kode_dokter) as total from dokter");
                $data = mysqli_fetch_assoc($query);
                ?>
                <h1 class="card-title"><?= $data['total']; ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-success mb-3">
            <div class="card-header">Total Kamar</div>
            <div class="card-body text-success">
                <?php
                $query = mysqli_query($conn, "SELECT COUNT(kode_kamar) as total from kamar");
                $data = mysqli_fetch_assoc($query);
                ?>
                <h1 class="card-title"><?= $data['total']; ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-warning mb-3">
            <div class="card-header">Total Obat</div>
            <div class="card-body text-warning">
                <?php
                $query = mysqli_query($conn, "SELECT COUNT(kode_obat) as total from obat");
                $data = mysqli_fetch_assoc($query);
                ?>
                <h1 class="card-title"><?= $data['total']; ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-primary mb-3">
            <div class="card-header">Total Rawat Inap</div>
            <div class="card-body text-primary">
                <?php
                $query = mysqli_query($conn, "SELECT COUNT(kode_rawat_inap) as total from rawat_inap");
                $data = mysqli_fetch_assoc($query);
                ?>
                <h1 class="card-title"><?= $data['total']; ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-danger mb-3">
            <div class="card-header">Total Rawat Jalan</div>
            <div class="card-body text-danger">
                <?php
                $query = mysqli_query($conn, "SELECT COUNT(kode_rawat_jalan) as total from rawat_jalan");
                $data = mysqli_fetch_assoc($query);
                ?>
                <h1 class="card-title"><?= $data['total']; ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <form action="" method="GET">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Laporan</label>
                <select class="form-select" aria-label="Default select example" name="p" required>
                    <option disabled selected>Laporan</option>
                    <option value="laporan_obat">Laporan Obat</option>
                    <option value="laporan_rawat_inap">Laporan rawat_inap</option>
                    <option value="laporan_rawat_jalan">Laporan rawat_jalan</option>
                </select>
            </div>
            <button type="submit" class="btn btn-lg btn-primary">Cetak Laporan Tabel</button>
        </form>
    </div>
    <div class="col-md-10">
        <canvas id="barChart" style="max-height: 500px; max-width: 100%;"></canvas>
    </div>
</div>