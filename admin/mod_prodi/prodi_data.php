<h3>Form Program Studi</h3>
<a href="?p=prodi_tambah" class="btn btn-primary">Tambah Data</a>
<a href="mod_laporan/laporan_prodi.php" class="btn btn-success">Cetak Laporan</a>
<br>
<br>
<table class="table align-items-center mb-0 display" id="table_id">
    <thead>
        <tr>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Prodi</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Setting</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $query = mysqli_query($conn, "SELECT * FROM prodi");
        while ($data = mysqli_fetch_assoc($query)) {
        ?><tr>
                <td>
                    <?= $no++ ?>
                </td>
                <td>
                    <?= $data['nm_prodi'] ?>
                </td>
                <td>
                    <a href="?p=prodi_edit&id=<?= $data['kd_prodi'] ?>" class="btn btn-warning">Ubah</a>
                    <a href="?p=prodi_proses&id=<?= $data['kd_prodi'] ?>" onclick="return confirm('anda yakin ingin menghapus data?')" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
        <?php }; ?>
    </tbody>
</table>