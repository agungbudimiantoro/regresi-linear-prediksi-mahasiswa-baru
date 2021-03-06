<h3>Form User</h3>
<a href="?p=user_tambah" class="btn btn-primary">Tambah Data</a>
<a href="../pimpinan/mod_laporan/laporan_user.php?username=<?php echo $username ?>" target="_blank" class="btn btn-success">Cetak Laporan</a>
<br>
<br>
<table class="table align-items-center mb-0 display" id="table_id">
    <thead>
        <tr>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id user</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">level</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Setting</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $query = mysqli_query($conn, "SELECT * FROM user");
        while ($data = mysqli_fetch_assoc($query)) {
        ?><tr>
                <td>
                    <?php echo $no++ ?>
                </td>
                <td>
                    <?php echo $data['id_user'] ?>
                </td>
                <td>
                    <?php echo $data['username'] ?>
                </td>
                <td>
                    <?php echo $data['level'] ?>
                </td>
                <td>
                    <a href="?p=user_edit&id=<?php echo $data['id_user'] ?>" class="btn btn-warning">Ubah</a>
                    <a href="?p=user_proses&id=<?php echo $data['id_user'] ?>" onclick="return confirm('anda yakin ingin menghapus data?')" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
        <?php }; ?>
    </tbody>
</table>