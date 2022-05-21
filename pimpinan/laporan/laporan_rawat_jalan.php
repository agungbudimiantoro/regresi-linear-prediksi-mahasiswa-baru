<h1 class="text-center">LAPORAN DATA RAWAT JALAN</h1>
<a href="print/laporan_rawat_jalan_all.php" target="_blank" class="btn btn-lg btn-success">Cetak Laporan Rawat Jalan Keseluruhan</a>
<br>
<div class="mb-3"></div>
<div class="row">
    <div class="col-md-6 border p-3">
        <div class="row">
            <div class="col-md-6 mt-2">
                <form action="print/laporan_rawat_jalan_month.php" method="GET">
                    <button type="submit" class="btn btn-lg btn-primary">Cetak Laporan Perbulan</button>
            </div>
            <div class="col-md-6">

                <label for="exampleInputPassword1" class="form-label">tahun</label>
                <select class="form-select" aria-label="Default select example" name="tahun" required>
                    <option value="" selected disabled></option>
                    <?php
                    for ($i = 2015; $i <= date('Y'); $i++) {
                    ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php } ?>
                </select>
                </form>
            </div>
        </div>
    </div>
</div>
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
            $no = 1;
            $query = mysqli_query($conn, "SELECT * FROM rawat_jalan");
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