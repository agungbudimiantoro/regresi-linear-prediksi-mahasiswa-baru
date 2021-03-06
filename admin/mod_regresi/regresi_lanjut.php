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
                $tahun_awal = $_POST['tahun_awal'];
                $tahun_akhir = $_POST['tahun_akhir'];
                $query = mysqli_query($conn, "SELECT * FROM prodi where kd_prodi = '$kd_prodi'");
                $data_prodi = mysqli_fetch_assoc($query);
                $query1 = mysqli_query($conn, "SELECT * FROM tahun_ajaran");
                while ($row_tahun = mysqli_fetch_assoc($query1)) {
                    if ($tahun_awal == $row_tahun['tahun_ajaran']) {
                        $id_tahun_awal = $row_tahun['id_thn_ajaran'];
                    };
                    if ($tahun_akhir == $row_tahun['tahun_ajaran']) {
                        $id_tahun_akhir = $row_tahun['id_thn_ajaran'];
                    };
                }

                $query = mysqli_query($conn, "SELECT * FROM prodi, tahun_ajaran, x1, x2, y 
                WHERE tahun_ajaran.id_thn_ajaran = x1.id_thn_ajaran
                and x1.id_thn_ajaran = x2.id_thn_ajaran
                and x2.id_thn_ajaran = y.id_thn_ajaran
                and prodi.kd_prodi = y.kd_prodi
                and x1.kd_prodi = x2.kd_prodi
                and prodi.kd_prodi = '$kd_prodi'
                and tahun_ajaran.tahun_ajaran >= '$tahun_awal'
                and tahun_ajaran.tahun_ajaran <= '$tahun_akhir'
                ");
                while ($data = mysqli_fetch_assoc($query)) {
                ?><tr>
                        <td>
                            <?php echo $no++ ?>
                        </td>
                        <td>
                            <?php echo $data['tahun_ajaran'] ?>
                        </td>
                        <td>
                            <?php echo $x1 = $data['x1'] ?>
                        </td>
                        <td>
                            <?php echo $x2 = $data['x2'] ?>
                        </td>
                        <td>
                            <?php echo $y = $data['y'] ?>
                        </td>
                        <td>
                            <?php echo $x1_2 = $data['x1_2'] ?>
                        </td>
                        <td>
                            <?php echo $x2_2 =  $data['x2_2'] ?>
                        </td>
                        <td>
                            <?php echo $x1_y =  $data['x1'] * $y ?>
                        </td>
                        <td>
                            <?php echo $x2_y =  $data['x2'] * $y ?>
                        </td>
                        <td>
                            <?php echo $x1_x2 =  $data['x1'] * $x2 ?>
                        </td>
                    </tr>
                <?php }; ?>
                <tr class="bg-primary">
                    <td colspan="2">
                        <p class="fw-bold">Total</p>
                    </td>
                    <td>
                        <?php
                        $tampil = mysqli_query($conn, "SELECT sum(x1.x1) as totx1 from x1, tahun_ajaran WHERE kd_prodi='$kd_prodi'
                       and x1.id_thn_ajaran = tahun_ajaran.id_thn_ajaran
                         and tahun_ajaran.tahun_ajaran >= '$tahun_awal'
                                   and tahun_ajaran.tahun_ajaran <= '$tahun_akhir'");
                        $data = mysqli_fetch_assoc($tampil);
                        $totx1 = $data["totx1"];
                        echo $totx1;
                        ?>
                    </td>
                    <td>
                        <?php
                        $tampil = mysqli_query($conn, "SELECT sum(x2.x2) as totx2 from x2, tahun_ajaran WHERE kd_prodi='$kd_prodi'
                      and x2.id_thn_ajaran = tahun_ajaran.id_thn_ajaran
                    and tahun_ajaran.tahun_ajaran >= '$tahun_awal'
                              and tahun_ajaran.tahun_ajaran <= '$tahun_akhir'");
                        $data = mysqli_fetch_assoc($tampil);
                        $totx2 = $data["totx2"];
                        echo $totx2;
                        ?>
                    </td>
                    <td>
                        <?php
                        $tampil = mysqli_query($conn, "SELECT sum(y.y) as toty from y, tahun_ajaran WHERE kd_prodi='$kd_prodi'
                       and y.id_thn_ajaran = tahun_ajaran.id_thn_ajaran
                     and tahun_ajaran.tahun_ajaran >= '$tahun_awal'
                               and tahun_ajaran.tahun_ajaran <= '$tahun_akhir'");
                        $data = mysqli_fetch_assoc($tampil);
                        $toty = $data["toty"];
                        echo $toty;
                        ?>
                    </td>
                    <td>
                        <?php
                        $tampil = mysqli_query($conn, "SELECT sum(x1.x1*x1.x1) as totx1_2 from x1, tahun_ajaran WHERE kd_prodi='$kd_prodi'
                       and x1.id_thn_ajaran = tahun_ajaran.id_thn_ajaran
                     and tahun_ajaran.tahun_ajaran >= '$tahun_awal'
                               and tahun_ajaran.tahun_ajaran <= '$tahun_akhir'");
                        $data = mysqli_fetch_assoc($tampil);
                        $totx1_2  = $data["totx1_2"];
                        echo $totx1_2;
                        ?>
                    </td>
                    <td>
                        <?php
                        $tampil = mysqli_query($conn, "SELECT sum(x2.x2*x2.x2) as totx2_2 from x2, tahun_ajaran WHERE kd_prodi='$kd_prodi'
                       and x2.id_thn_ajaran = tahun_ajaran.id_thn_ajaran
                     and tahun_ajaran.tahun_ajaran >= '$tahun_awal'
                               and tahun_ajaran.tahun_ajaran <= '$tahun_akhir'");
                        $data = mysqli_fetch_assoc($tampil);
                        $totx2_2  = $data["totx2_2"];
                        echo $totx2_2;
                        ?>
                    </td>
                    <td>
                        <?php
                        $tampil = mysqli_query($conn, "SELECT sum(x1.x1*y.y) as totx1_y from x1, y, tahun_ajaran WHERE x1.id_thn_ajaran = y.id_thn_ajaran and x1.kd_prodi=y.kd_prodi and x1.kd_prodi='$kd_prodi'
                      and x1.id_thn_ajaran = tahun_ajaran.id_thn_ajaran
                    and tahun_ajaran.tahun_ajaran >= '$tahun_awal'
                              and tahun_ajaran.tahun_ajaran <= '$tahun_akhir'");
                        $data = mysqli_fetch_assoc($tampil);
                        $totx1_y  = $data["totx1_y"];
                        echo $totx1_y;
                        ?>
                    </td>
                    <td>
                        <?php
                        $tampil = mysqli_query($conn, "SELECT sum(x2.x2*y.y) as totx2_y from x2, y, tahun_ajaran WHERE x2.id_thn_ajaran = y.id_thn_ajaran and x2.kd_prodi=y.kd_prodi and x2.kd_prodi='$kd_prodi'
                      and x2.id_thn_ajaran = tahun_ajaran.id_thn_ajaran
                    and tahun_ajaran.tahun_ajaran >= '$tahun_awal'
                              and tahun_ajaran.tahun_ajaran <= '$tahun_akhir'");
                        $data = mysqli_fetch_assoc($tampil);
                        $totx2_y  = $data["totx2_y"];
                        echo $totx2_y;
                        ?>
                    </td>
                    <td>
                        <?php
                        $tampil = mysqli_query($conn, "SELECT sum(x1.x1*x2.x2) as totx1_x2 from x1, x2, tahun_ajaran WHERE x1.id_thn_ajaran = x2.id_thn_ajaran and x1.kd_prodi=x2.kd_prodi and x1.kd_prodi='$kd_prodi'
                     and x1.id_thn_ajaran = tahun_ajaran.id_thn_ajaran
                   and tahun_ajaran.tahun_ajaran >= '$tahun_awal'
                             and tahun_ajaran.tahun_ajaran <= '$tahun_akhir'");
                        $data = mysqli_fetch_assoc($tampil);
                        $totx1_x2  = $data["totx1_x2"];
                        echo $totx1_x2;
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="pills-6" role="tabpanel" aria-labelledby="pills-6-tab" tabindex="0">
        <h5>Determinan Matrix</h5>
        <table class="table table-condensed table-striped">
            <thead>
                <tr>
                    <th>
                        Variabel
                    </th>
                    <th>
                        Nilai
                    </th>
                </tr>
            </thead>
            <tbody>
                <!-- hasil -->
                <?php
                $tampil = mysqli_query($conn, "select count(*) as jum_res from x1, x2, tahun_ajaran where x1.id_thn_ajaran=x2.id_thn_ajaran and x1.kd_prodi=x2.kd_prodi and x1.kd_prodi='$kd_prodi'     and x1.id_thn_ajaran = tahun_ajaran.id_thn_ajaran
              and tahun_ajaran.tahun_ajaran >= '$tahun_awal'
                        and tahun_ajaran.tahun_ajaran <= '$tahun_akhir'");
                $data = mysqli_fetch_assoc($tampil);
                $n = $data["jum_res"];

                function deterM($a1, $a2, $a3, $b1, $b2, $b3, $c1, $c2, $c3)
                {
                    $result = ($a1 * $b2 * $c3) + ($a2 * $b3 * $c1) + ($a3 * $b1 * $c2) - ($a3 * $b2 * $c1) - ($a1 * $b3 * $c2) - ($a2 * $b1 * $c3);
                    return $result;
                }
                $A = deterM(
                    $n,
                    $totx1,
                    $totx2,
                    $totx1,
                    $totx1_2,
                    $totx1_x2,
                    $totx2,
                    $totx1_x2,
                    $totx2_2
                );
                $A0 = deterM(
                    $toty,
                    $totx1_y,
                    $totx2_y,
                    $totx1,
                    $totx1_2,
                    $totx1_x2,
                    $totx2,
                    $totx1_x2,
                    $totx2_2
                );

                $A1 = deterM(
                    $n,
                    $totx1,
                    $totx2,
                    $toty,
                    $totx1_y,
                    $totx2_y,
                    $totx2,
                    $totx1_x2,
                    $totx2_2
                );

                $A2 = deterM(
                    $n,
                    $totx1,
                    $totx2,
                    $totx1,
                    $totx1_2,
                    $totx1_x2,
                    $toty,
                    $totx1_y,
                    $totx2_y
                );


                $konstanta = $A0 / $A;
                $b1 = $A1 / $A;
                $b2 = $A2 / $A;
                ?>
                <tr>
                    <td>A</td>
                    <td>
                        <p id="A"></p>
                    </td>
                </tr>
                <tr>
                    <td>A0</td>
                    <td>
                        <p id="A0"></p>
                    </td>
                </tr>
                <tr>
                    <td>A1</td>
                    <td>
                        <p id="A1"></p>
                    </td>
                </tr>
                <tr>
                    <td>A2</td>
                    <td>
                        <p id="A2"></p>
                    </td>
                </tr>
                <script src="../assets/math.js" type="text/javascript"></script>
                <script>
                    const A = <?php echo $A ?>;
                    var hasilA = math.format(A, {
                        notation: 'fixed'
                    });
                    const A0 = <?php echo $A0 ?>;
                    var hasilA0 = math.format(A0, {
                        notation: 'fixed'
                    });
                    const A1 = <?php echo $A1 ?>;
                    var hasilA1 = math.format(A1, {
                        notation: 'fixed'
                    });
                    const A2 = <?php echo $A2 ?>;
                    var hasilA2 = math.format(A2, {
                        notation: 'fixed'
                    });
                    var Adoc = document.getElementById("A").innerHTML = hasilA;
                    var Adoc = document.getElementById("A0").innerHTML = hasilA0;
                    var Adoc = document.getElementById("A1").innerHTML = hasilA1;
                    var Adoc = document.getElementById("A2").innerHTML = hasilA2;
                </script>
            </tbody>
        </table>
        <h5>Regresi Linear Berganda</h5>
        <table class="table table-condensed table-striped">
            <thead>
                <tr>
                    <th>Keterangan</th>
                    <th>Hasil</th>
                    <th>Rumus</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Konstanta (a)</td>
                    <td><?php
                        echo $konstanta;
                        ?>
                    </td>
                    <td>= A0 / A<br>
                        <?php
                        echo "= " . $A0 . " / " . $A;
                        echo "<br>= " . $konstanta; ?></td>

                </tr>
                <tr>
                    <td>B1</td>
                    <td><?php
                        echo $b1;
                        ?>
                    </td>
                    <td>= A1 / A<br>
                        <?php
                        echo "= " . $A1 . " / " . $A;
                        echo "<br>= " . $b1; ?></td>

                </tr>
                <tr>
                    <td>B2</td>
                    <td><?php
                        echo $b2;
                        ?>
                    </td>
                    <td>= A2 / A<br>
                        <?php
                        echo "= " . $A2 . " / " . $A;
                        echo "<br>= " . $b2; ?></td>

                </tr>

            </tbody>
        </table>
        <h5>Persamaan Regresi Linear Berganda </h5>
        <div role="alert" class="alert alert-success alert-icon alert-icon-colored alert-dismissible">
            <div class="icon"><span class="mdi mdi-check"></span></div>
            <div class="message">
                <?php
                echo "<p><h4><strong>Y</strong> = a + b1 X1 + b2 X2</h4></p>";
                echo "<p><h4><strong>Y</strong> = " . $konstanta . " + " . $b1 . " X1 + " . $b2 . " X2 </h4></p>";
                $hitung_1 = $konstanta + $b1;
                $hitung_2 = $b2 * 2;
                $hitung = $hitung_1 + $hitung_2;
                // echo "<p><h4><strong>Y</strong> = " . $hitung . "</h4></p>";
                ?>
            </div>
        </div>
    </div>
</div>