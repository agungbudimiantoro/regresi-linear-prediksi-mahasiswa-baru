<h3>Informasi Data Program Studi</h3>
<br>
<br>
<table class="table align-items-center mb-0 display" id="table_id">
    <thead>
        <tr>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Prodi</th>
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

            </tr>
        <?php }; ?>
    </tbody>
</table>