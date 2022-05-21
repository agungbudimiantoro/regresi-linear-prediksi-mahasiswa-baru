<h3>Informasi Data User</h3>
<br>
<br>
<table class="table align-items-center mb-0 display" id="table_id">
    <thead>
        <tr>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id user</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">level</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $query = mysqli_query($conn, "SELECT * FROM user");
        while ($data = mysqli_fetch_assoc($query)) {
        ?><tr>
                <td>
                    <?= $no++ ?>
                </td>
                <td>
                    <?= $data['id_user'] ?>
                </td>
                <td>
                    <?= $data['username'] ?>
                </td>
                <td>
                    <?= $data['level'] ?>
                </td>

            </tr>
        <?php }; ?>
    </tbody>
</table>