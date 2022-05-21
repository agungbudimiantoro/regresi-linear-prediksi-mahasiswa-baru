<p>Silahkan pilih prodi yang ingin di hitung menggunakan regresi liner berganda</p>
<form action="?p=regresi_lanjut" enctype="multipart/form-data" method="POST">
    <label for="exampleInputPassword1" class="mb-3 form-label">Prodi</label></td>

    <select class="mb-3 form-select" aria-label="Default select example" name="prodi" required>
        <option disabled selected>-prodi-</option>
        <?php
        $query = mysqli_query($conn, "SELECT * FROM prodi");
        while ($data = mysqli_fetch_assoc($query)) : ?>
            <option value="<?= $data['kd_prodi']; ?>"><?= $data['nm_prodi']; ?></option>
        <?php endwhile; ?>
    </select></td>
    <button type="submit" name="lanjut" class="btn btn-primary">Proses Prediksi</button>
    </tr>
    </table>
</form>