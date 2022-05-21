<h3>Informasi Data Tahun Ajaran</h3>

<br>
<br>
<table class="table align-items-center mb-0 display" id="table_id">
    <thead>
        <tr>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tahun Ajaran</th>
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

            </tr>
        <?php }; ?>
    </tbody>
</table>