<?php
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM prodi where kd_prodi='$id'");
$data = mysqli_fetch_assoc($query);
?>

<form action="?p=prodi_proses" method="POST">
    <div class="row">
        <h3 class="mb-3">Form Tambah Tahun Ajaran</h3>
        <div class="col-md-6">
            <table width="100%">
                <tr>
                    <td> <label for="username" class="mb-3 form-label">Kode Prodi</label> </td>
                    <td> </td>
                    <td> <input type="text" name="id" value="<?= $id ?>" readonly class="mb-3 form-control" id="username" aria-describedby="emailHelp" required></td>
                </tr>
                <tr>
                    <td> <label for="nm_prodi" class="mb-3 form-label">nama prodi</label></td>
                    <td></td>
                    <td> <input type="text" name="nm_prodi" value="<?= $data['nm_prodi'] ?>" class="mb-3 form-control" id="nm_prodi" aria-describedby="emailHelp" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td> <button type="submit" name="edit" class="btn btn-primary">Ubah</button>
                        <button onclick="history.back()" class="btn btn-secondary">Kembali</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</form>