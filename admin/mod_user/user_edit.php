<?php
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM user where id_user='$id'");
$data = mysqli_fetch_assoc($query);
?>

<form action="?p=user_proses" method="POST">
    <div class="row">
        <h3 class="mb-3">Form Tambah User</h3>
        <div class="col-md-6">
            <table width="100%">
                <tr>
                    <td> <label for="username" class="mb-3 form-label">ID User</label> </td>
                    <td> </td>
                    <td> <input type="text" name="id" value="<?= $id ?>" readonly class="mb-3 form-control" id="username" aria-describedby="emailHelp" required></td>
                </tr>
                <tr>
                    <td> <label for="username" class="mb-3 form-label">Username</label></td>
                    <td></td>
                    <td> <input type="text" value="<?= $data['username'] ?>" name="username" class=" mb-3 form-control" id="username" aria-describedby="emailHelp" required></td>
                </tr>
                <tr>
                    <td> <label for="nm_user" class="mb-3 form-label">Nama user</label></td>
                    <td></td>
                    <td> <input type="text" name="nm_user" value="<?= $data['nm_user'] ?>" class=" mb-3 form-control" id="nm_user" aria-describedby="emailHelp" required></td>
                </tr>
                <tr>
                    <td> <label for="exampleInputPassword1" class="mb-3 form-label">Password</label></td>
                    <td></td>
                    <td> <input type="password" name="password" value="<?= $data['password'] ?>" class=" mb-3 form-control" id="exampleInputPassword1" required></td>
                </tr>
                <tr>
                    <td> <label for="email" class="mb-3 form-label">Email</label></td>
                    <td></td>
                    <td> <input type="email" name="email" value="<?= $data['email'] ?>" class=" mb-3 form-control" id="email" aria-describedby="emailHelp" required></td>
                </tr>
                <tr>
                    <td> <label for="exampleInputPassword1" class="mb-3 form-label">Level</label></td>
                    <td></td>
                    <td> <select class="mb-3 form-select" aria-label="Default select example" name="level" required>

                            <option value="admin" <?php if ($data['level'] == 'admin') {
                                                        echo "selected";
                                                    }; ?>>Admin</option>
                            <option value="pimpinan" <?php if ($data['level'] == 'pimpinan') {
                                                            echo "selected";
                                                        }; ?>>Pimpinan</option>
                        </select></td>
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