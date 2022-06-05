<h3><?php echo $judul ?></h3>

<br>
<br>
<table class="table align-items-center mb-0 display" id="table_id">
    <thead>
        <tr>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tahun Ajaran</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Prodi</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">x1</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">x1<sup>2</sup></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $query = mysqli_query($conn, "SELECT * FROM x1, prodi, tahun_ajaran 
        where x1.id_thn_ajaran = tahun_ajaran.id_thn_ajaran 
        and x1.kd_prodi = prodi.kd_prodi");
        while ($data = mysqli_fetch_assoc($query)) {
        ?><tr>
                <td>
                    <?php echo $no++ ?>
                </td>
                <td>
                    <?php echo $data['tahun_ajaran'] ?>
                </td>
                <td>
                    <?php echo $data['nm_prodi'] ?>
                </td>
                <td>
                    <?php echo $data['x1'] ?>
                </td>
                <td>
                    <?php echo $data['x1_2'] ?>
                </td>
            </tr>
        <?php }; ?>
    </tbody>
</table>