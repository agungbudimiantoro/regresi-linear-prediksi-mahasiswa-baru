<h3>Form Tahun Ajaran</h3>
<a href="?p=tahun_ajaran_tambah" class="btn btn-primary">Tambah Data</a>
<a href="mod_laporan/laporan_tahun_ajaran.php" class="btn btn-success">Cetak Laporan</a>
<br>
<br>
<table class="table align-items-center mb-0 display" id="table_id">
    <thead>
        <tr>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tahun Ajaran</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Setting</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $query = mysqli_query($conn, "SELECT * FROM tahun_ajaran");
        while ($data = mysqli_fetch_assoc($query)) {
        ?><tr>
                <td>
                    <?= $no++ ?>
                </td>
                <td>
                    <?= $data['tahun_ajaran'] ?>
                </td>
                <td>
                    <a href="?p=tahun_ajaran_edit&id=<?= $data['id_thn_ajaran'] ?>" class="btn btn-warning">Ubah</a>
                    <a href="?p=tahun_ajaran_proses&id=<?= $data['id_thn_ajaran'] ?>" onclick="return confirm('anda yakin ingin menghapus data?')" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
        <?php }; ?>
    </tbody>
</table>