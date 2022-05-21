<?php
$query_hitung = mysqli_query($conn, "SELECT MAX(id_thn_ajaran) as id FROM tahun_ajaran");
$data_hitung = mysqli_fetch_array($query_hitung);
$id_hitung = $data_hitung['id'];
$id_hitung = $id_hitung + 1;
?>
<form action="?p=tahun_ajaran_proses" method="POST">
    <div class="row">
        <h3 class="mb-3">Form Tambah Tahun Ajaran</h3>
        <div class="col-md-6">
            <table width="100%">
                <tr>
                    <td> <label for="username" class="mb-3 form-label">ID Tahun Ajaran</label> </td>
                    <td> </td>
                    <td> <input type="text" name="id" value="<?= $id_hitung ?>" readonly class="mb-3 form-control" id="username" aria-describedby="emailHelp" required></td>
                </tr>
                <tr>
                    <td> <label for="tahun_ajaran" class="mb-3 form-label">Tahun ajaran</label></td>
                    <td></td>
                    <td> <input type="text" name="tahun_ajaran" class="mb-3 form-control" id="tahun_ajaran" aria-describedby="emailHelp" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td> <button type="submit" name="add" class="mb-3 btn btn-primary">Tambah</button>
                        <button type="reset" name="reset" class="mb-3 btn btn-success">Batal</button>
                    </td>
                </tr>
            </table>
</form>
</div>
</div>