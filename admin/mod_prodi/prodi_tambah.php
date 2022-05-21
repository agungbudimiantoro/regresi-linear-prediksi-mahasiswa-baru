<?php
$query_hitung = mysqli_query($conn, "SELECT MAX(kd_prodi) as id FROM prodi");
$data_hitung = mysqli_fetch_array($query_hitung);
$id_hitung = $data_hitung['id'];
$urt = (int) substr($id_hitung, 3, 4);
$urt++;
$hrf = "PRD";
$id_hitung = $hrf . sprintf("%03s", $urt);
?>
<form action="?p=prodi_proses" method="POST">
    <div class="row">
        <h3 class="mb-3">Form Tambah Tahun Ajaran</h3>
        <div class="col-md-6">
            <table width="100%">
                <tr>
                    <td> <label for="username" class="mb-3 form-label">Kode Prodi</label> </td>
                    <td> </td>
                    <td> <input type="text" name="id" value="<?= $id_hitung ?>" readonly class="mb-3 form-control" id="username" aria-describedby="emailHelp" required></td>
                </tr>
                <tr>
                    <td> <label for="nm_prodi" class="mb-3 form-label">Nama Prodi</label></td>
                    <td></td>
                    <td> <input type="text" name="nm_prodi" class="mb-3 form-control" id="nm_prodi" aria-describedby="emailHelp" required></td>
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