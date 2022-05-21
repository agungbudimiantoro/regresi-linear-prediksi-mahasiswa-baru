<?php
$query_hitung = mysqli_query($conn, "SELECT MAX(id_user) as id FROM user");
$data_hitung = mysqli_fetch_array($query_hitung);
$id_hitung = $data_hitung['id'];
$urt = (int) substr($id_hitung, 3, 4);
$urt++;
$hrf = "USR";
$id_hitung = $hrf . sprintf("%03s", $urt);
?>
<form action="?p=user_proses" method="POST">
    <div class="row">
        <h3 class="mb-3">Form Tambah User</h3>
        <div class="col-md-6">
            <table width="100%">
                <tr>
                    <td> <label for="username" class="mb-3 form-label">ID User</label> </td>
                    <td> </td>
                    <td> <input type="text" name="id" value="<?= $id_hitung ?>" readonly class="mb-3 form-control" id="username" aria-describedby="emailHelp" required></td>
                </tr>
                <tr>
                    <td> <label for="username" class="mb-3 form-label">Username</label></td>
                    <td></td>
                    <td> <input type="text" name="username" class="mb-3 form-control" id="username" aria-describedby="emailHelp" required></td>
                </tr>
                <tr>
                    <td> <label for="nm_user" class="mb-3 form-label">Nama user</label></td>
                    <td></td>
                    <td> <input type="text" name="nm_user" class="mb-3 form-control" id="nm_user" aria-describedby="emailHelp" required></td>
                </tr>
                <tr>
                    <td> <label for="exampleInputPassword1" class="mb-3 form-label">Password</label></td>
                    <td></td>
                    <td> <input type="password" name="password" class="mb-3 form-control" id="exampleInputPassword1" required></td>
                </tr>
                <tr>
                    <td> <label for="email" class="mb-3 form-label">Email</label></td>
                    <td></td>
                    <td> <input type="email" name="email" class="mb-3 form-control" id="email" aria-describedby="emailHelp" required></td>
                </tr>
                <tr>
                    <td> <label for="exampleInputPassword1" class="mb-3 form-label">Level</label></td>
                    <td></td>
                    <td> <select class="mb-3 form-select" aria-label="Default select example" name="level" required>
                            <option disabled selected>Level</option>
                            <option value="admin">Admin</option>
                            <option value="pimpinan">Pimpinan</option>
                        </select></td>
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