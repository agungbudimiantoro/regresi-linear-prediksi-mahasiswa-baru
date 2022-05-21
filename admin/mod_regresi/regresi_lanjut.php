<div class="row">
    <div class="page-head">
        <h2 class="page-head-title">Analisis Regresi Linear Berganda</h2>
    </div>
</div>
<br>
<ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pills-1-tab" data-bs-toggle="pill" data-bs-target="#pills-1" type="button" role="tab" aria-controls="pills-1" aria-selected="true">Data</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-6-tab" data-bs-toggle="pill" data-bs-target="#pills-6" type="button" role="tab" aria-controls="pills-6" aria-selected="false">Hasil</button>
    </li>

</ul>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab" tabindex="0">
        <br>
        <h5>Data</h5>
        <br>
        <div class="row">
            <div class="col-md-3 border pt-2 mb-2">
                <p>X1 = Jumlah biaya</p>
                <p>X2 = jumlah pendaftar</p>
                <p>Y = jumlah mahasiswa baru</p>
            </div>
        </div>

        <table class="table align-items-center mb-0 display" id="table_id">
            <thead>
                <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tahun Ajaran</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">X1</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">X2</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Y</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">X1^2</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">X2^2</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">X1*Y</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">X2*Y</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">X1*X2</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $kd_prodi = $_POST['prodi'];
                $no = 1;
                $query = mysqli_query($conn, "SELECT * FROM prodi, tahun_ajaran, x1, x2, y 
                WHERE tahun_ajaran.id_thn_ajaran = x1.id_thn_ajaran
                and x1.id_thn_ajaran = x2.id_thn_ajaran
                and x2.id_thn_ajaran = y.id_thn_ajaran
                and prodi.kd_prodi = y.kd_prodi
                and x1.kd_prodi = x2.kd_prodi
                and prodi.kd_prodi = '$kd_prodi'
                ");
                while ($data = mysqli_fetch_assoc($query)) {
                ?><tr>
                        <td>
                            <?= $no++ ?>
                        </td>
                        <td>
                            <?= $data['tahun_ajaran'] ?>
                        </td>
                        <td>
                            <?= $x1 = $data['x1'] ?>
                        </td>
                        <td>
                            <?= $x2 = $data['x2'] ?>
                        </td>
                        <td>
                            <?= $y = $data['y'] ?>
                        </td>
                        <td>
                            <?= $x1_2 = $data['x1_2'] ?>
                        </td>
                        <td>
                            <?= $x2_2 =  $data['x2_2'] ?>
                        </td>
                        <td>
                            <?= $x1_y =  $data['x1'] * $y ?>
                        </td>
                        <td>
                            <?= $x2_y =  $data['x2'] * $y ?>
                        </td>
                        <td>
                            <?= $x1_x2 =  $data['x1'] * $x2 ?>
                        </td>
                    </tr>
                <?php }; ?>
                <tr class="bg-primary">
                    <td>
                        <?= $no++ ?>
                    </td>
                    <td>
                        Total
                    </td>
                    <td>
                        <?php
                        $tampil = mysqli_query($conn, "SELECT sum(x1) as totx1 from x1 WHERE kd_prodi='$_POST[prodi]'");
                        $data = mysqli_fetch_assoc($tampil);
                        $totx1 = $data["totx1"];
                        echo $totx1;
                        ?>
                    </td>
                    <td>
                        <?php
                        $tampil = mysqli_query($conn, "SELECT sum(x2) as totx2 from x2 WHERE kd_prodi='$_POST[prodi]'");
                        $data = mysqli_fetch_assoc($tampil);
                        $totx2 = $data["totx2"];
                        echo $totx2;
                        ?>
                    </td>
                    <td>
                        <?php
                        $tampil = mysqli_query($conn, "SELECT sum(y) as toty from y WHERE kd_prodi='$_POST[prodi]'");
                        $data = mysqli_fetch_assoc($tampil);
                        $toty = $data["toty"];
                        echo $toty;
                        ?>
                    </td>
                    <td>
                        <?php
                        $tampil = mysqli_query($conn, "SELECT sum(x1*x1) as totx1_2 from x1 WHERE kd_prodi='$_POST[prodi]'");
                        $data = mysqli_fetch_assoc($tampil);
                        $totx1_2  = $data["totx1_2"];
                        echo $totx1_2;
                        ?>
                    </td>
                    <td>
                        <?php
                        $tampil = mysqli_query($conn, "SELECT sum(x2*x2) as totx2_2 from x2 WHERE kd_prodi='$_POST[prodi]'");
                        $data = mysqli_fetch_assoc($tampil);
                        $totx2_2  = $data["totx2_2"];
                        echo $totx2_2;
                        ?>
                    </td>
                    <td>
                        <?php
                        $tampil = mysqli_query($conn, "SELECT sum(x1.x1*y.y) as totx1_y from x1, y WHERE x1.id_thn_ajaran = y.id_thn_ajaran and x1.kd_prodi=y.kd_prodi and x1.kd_prodi='$_POST[prodi]'");
                        $data = mysqli_fetch_assoc($tampil);
                        $totx1_y  = $data["totx1_y"];
                        echo $totx1_y;
                        ?>
                    </td>
                    <td>
                        <?php
                        $tampil = mysqli_query($conn, "SELECT sum(x2.x2*y.y) as totx2_y from x2, y WHERE x2.id_thn_ajaran = y.id_thn_ajaran and x2.kd_prodi=y.kd_prodi and x2.kd_prodi='$_POST[prodi]'");
                        $data = mysqli_fetch_assoc($tampil);
                        $totx2_y  = $data["totx2_y"];
                        echo $totx2_y;
                        ?>
                    </td>
                    <td>
                        <?php
                        $tampil = mysqli_query($conn, "SELECT sum(x1.x1*x2.x2) as totx1_x2 from x1, x2 WHERE x1.id_thn_ajaran = x2.id_thn_ajaran and x1.kd_prodi=x2.kd_prodi and x1.kd_prodi='$_POST[prodi]'");
                        $data = mysqli_fetch_assoc($tampil);
                        $totx1_x2  = $data["totx1_x2"];
                        echo $totx1_x2;
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="pills-6" role="tabpanel" aria-labelledby="pills-6-tab" tabindex="0">...</div>
</div>