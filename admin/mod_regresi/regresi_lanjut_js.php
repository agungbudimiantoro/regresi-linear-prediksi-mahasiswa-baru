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
                $kd_prodi = $_GET['prodi'];
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
                        $tampil = mysqli_query($conn, "SELECT sum(x1) as totx1 from x1 WHERE kd_prodi='$_GET[prodi]'");
                        $data = mysqli_fetch_assoc($tampil);
                        $totx1 = $data["totx1"];
                        echo $totx1;
                        ?>
                    </td>
                    <td>
                        <?php
                        $tampil = mysqli_query($conn, "SELECT sum(x2) as totx2 from x2 WHERE kd_prodi='$_GET[prodi]'");
                        $data = mysqli_fetch_assoc($tampil);
                        $totx2 = $data["totx2"];
                        echo $totx2;
                        ?>
                    </td>
                    <td>
                        <?php
                        $tampil = mysqli_query($conn, "SELECT sum(y) as toty from y WHERE kd_prodi='$_GET[prodi]'");
                        $data = mysqli_fetch_assoc($tampil);
                        $toty = $data["toty"];
                        echo $toty;
                        ?>
                    </td>
                    <td>
                        <?php
                        $tampil = mysqli_query($conn, "SELECT sum(x1*x1) as totx1_2 from x1 WHERE kd_prodi='$_GET[prodi]'");
                        $data = mysqli_fetch_assoc($tampil);
                        $totx1_2  = $data["totx1_2"];
                        echo $totx1_2;
                        ?>
                    </td>
                    <td>
                        <?php
                        $tampil = mysqli_query($conn, "SELECT sum(x2*x2) as totx2_2 from x2 WHERE kd_prodi='$_GET[prodi]'");
                        $data = mysqli_fetch_assoc($tampil);
                        $totx2_2  = $data["totx2_2"];
                        echo $totx2_2;
                        ?>
                    </td>
                    <td>
                        <?php
                        $tampil = mysqli_query($conn, "SELECT sum(x1.x1*y.y) as totx1_y from x1, y WHERE x1.id_thn_ajaran = y.id_thn_ajaran and x1.kd_prodi=y.kd_prodi and x1.kd_prodi='$_GET[prodi]'");
                        $data = mysqli_fetch_assoc($tampil);
                        $totx1_y  = $data["totx1_y"];
                        echo $totx1_y;
                        ?>
                    </td>
                    <td>
                        <?php
                        $tampil = mysqli_query($conn, "SELECT sum(x2.x2*y.y) as totx2_y from x2, y WHERE x2.id_thn_ajaran = y.id_thn_ajaran and x2.kd_prodi=y.kd_prodi and x2.kd_prodi='$_GET[prodi]'");
                        $data = mysqli_fetch_assoc($tampil);
                        $totx2_y  = $data["totx2_y"];
                        echo $totx2_y;
                        ?>
                    </td>
                    <td>
                        <?php
                        $tampil = mysqli_query($conn, "SELECT sum(x1.x1*x2.x2) as totx1_x2 from x1, x2 WHERE x1.id_thn_ajaran = x2.id_thn_ajaran and x1.kd_prodi=x2.kd_prodi and x1.kd_prodi='$_GET[prodi]'");
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
                $tampil = mysqli_query($conn, "select count(*) as jum_res from x1, x2 where x1.id_thn_ajaran=x2.id_thn_ajaran and x1.kd_prodi=x2.kd_prodi and x1.kd_prodi='$_GET[prodi]'");
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
                    const A = math.det([
                        [<?php echo $n ?>,
                            <?php echo $totx1 ?>,
                            <?php echo $totx2 ?>
                        ],
                        [
                            <?php echo $totx1 ?>,
                            <?php echo $totx1_2 ?>,
                            <?php echo $totx1_x2 ?>
                        ],
                        [
                            <?php echo $totx2 ?>,
                            <?php echo $totx1_x2 ?>,
                            <?php echo $totx2_2 ?>
                        ]
                    ]);

                    const A0 = math.det([
                        [<?php echo $toty ?>,
                            <?php echo $totx1_y ?>,
                            <?php echo $totx2_y ?>
                        ],
                        [<?php echo $totx1 ?>,
                            <?php echo $totx1_2 ?>,
                            <?php echo $totx1_x2 ?>
                        ],
                        [<?php echo $totx2 ?>,
                            <?php echo $totx1_x2 ?>,
                            <?php echo $totx2_2 ?>
                        ]
                    ]);


                    const A1 = math.det([
                        [<?php echo $n ?>,
                            <?php echo $totx1 ?>,
                            <?php echo $totx2 ?>
                        ],
                        [<?php echo $toty ?>,
                            <?php echo $totx1_y ?>,
                            <?php echo $totx2_y ?>
                        ],
                        [<?php echo $totx2 ?>,
                            <?php echo $totx1_x2 ?>,
                            <?php echo $totx2_2 ?>
                        ]
                    ]);

                    const A2 = math.det([
                        [<?php echo $n ?>,
                            <?php echo $totx1 ?>,
                            <?php echo $totx2 ?>
                        ],
                        [<?php echo $totx1 ?>,
                            <?php echo $totx1_2 ?>,
                            <?php echo $totx1_x2 ?>
                        ],
                        [<?php echo $toty ?>,
                            <?php echo $totx1_y ?>,
                            <?php echo $totx2_y ?>
                        ]
                    ]);


                    var hasilA = math.format(A, {
                        notation: 'fixed'
                    });
                    var Adoc1 = document.getElementById("A").innerHTML = hasilA;

                    var hasilA0 = math.format(A0, {
                        notation: 'fixed'
                    });
                    var Adoc2 = document.getElementById("A0").innerHTML = hasilA0;

                    var hasilA1 = math.format(A1, {
                        notation: 'fixed'
                    });
                    var Adoc3 = document.getElementById("A1").innerHTML = hasilA1;

                    var hasilA2 = math.format(A2, {
                        notation: 'fixed'
                    });
                    var Adoc4 = document.getElementById("A2").innerHTML = hasilA2;
                </script>
            </tbody>
        </table>

    </div>
</div>