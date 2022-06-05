<p>Silahkan pilih prodi yang ingin di hitung menggunakan regresi liner berganda</p>
<form action="?p=hasil_perhitungan" enctype="multipart/form-data" method="POST">
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="mb-3 form-label">Prodi</label>
                <select class="mb-3 form-select" aria-label="Default select example" name="prodi" required>
                    <option disabled value="" selected>-prodi-</option>
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM prodi");
                    while ($data = mysqli_fetch_assoc($query)) : ?>
                        <option value="<?php echo $data['kd_prodi']; ?>"><?php echo $data['nm_prodi']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="mb-3 form-label">Data Prediksi Tahun Awal</label>
                <select class="mb-3 form-select" aria-label="Default select example" name="tahun_awal" required>
                    <option disabled value="" selected>-Pilih Tahun-</option>
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM tahun_ajaran");
                    while ($data = mysqli_fetch_assoc($query)) : ?>
                        <option value="<?php echo $data['tahun_ajaran']; ?>"><?php echo $data['tahun_ajaran']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="mb-3 form-label">Data Prediksi Tahun akhir</label>
                <select class="mb-3 form-select" aria-label="Default select example" name="tahun_akhir" required>
                    <option disabled value="" selected>-Pilih Tahun-</option>
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM tahun_ajaran");
                    while ($data = mysqli_fetch_assoc($query)) : ?>
                        <option value="<?php echo $data['tahun_ajaran']; ?>"><?php echo $data['tahun_ajaran']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>


            <button type="submit" name="lanjut" class="btn btn-primary">Proses Prediksi</button>
            </tr>
            </table>
</form>
</div>
</div>