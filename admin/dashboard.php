<div class="d-flex justify-content-center mb-2">
    <img src="../assets/img/logo-login.jpg" width="150px" height="150px" alt="">
</div>
<h3>Selamat Datang</h3>
<h3>Pengguna Aplikasi</h3>
<h3>Analisis Linear Berganda digunakan untuk melihat pengaruh dua atau lebih variabel bebas</h3>
<br>
<div class="d-flex justify-content-center mb-2">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-upload"></i> Upload Data</button>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="?p=upload_data" enctype="multipart/form-data" method="POST">
                    <table width="100%">
                        <!-- <tr>
                            <td> <label for="exampleInputPassword1" class="mb-3 form-label">Variabel</label></td>
                            <td></td>
                            <td> <select class="mb-3 form-select" aria-label="Default select example" name="Variabel" required>
                                    <option disabled selected>-variabel-</option>
                                    <option value="x1">X1 (Jumlah biaya)</option>
                                    <option value="x2">X2 (jumlah pendaftar)</option>
                                    <option value="y">Y (jumlah mahasiswa baru)</option>
                                </select></td>
                        </tr> -->
                        <tr>
                            <td> <label for="exampleInputPassword1" class="mb-3 form-label">Prodi</label></td>
                            <td></td>
                            <td> <select class="mb-3 form-select" aria-label="Default select example" name="prodi" required>
                                    <option disabled selected>-prodi-</option>
                                    <?php
                                    $query = mysqli_query($conn, "SELECT * FROM prodi");
                                    while ($data = mysqli_fetch_assoc($query)) : ?>
                                        <option value="<?= $data['kd_prodi']; ?>"><?= $data['nm_prodi']; ?></option>
                                    <?php endwhile; ?>
                                </select></td>
                        </tr>
                        <tr>
                            <td> <label for="file" class="mb-3 form-label">file import</label></td>
                            <td></td>
                            <td> <input type="file" name="import_data" class="mb-3 form-control" id="file" aria-describedby="fileHelp" required></td>
                        </tr>
                    </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="upload" class="btn btn-primary">Upload Data</button>
            </div>
            </form>
        </div>
    </div>
</div>