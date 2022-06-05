<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <img src="../assets/img/logo-login.jpg" alt="" width="70" height="70" class="d-inline-block align-text-top">
        Bootstrap
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?p=dashboard">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Laporan
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" target="_blank" href="mod_laporan/laporan_user.php?nm_user=<?php echo $nm_user ?>">laporan user</a></li>
                        <li><a class="dropdown-item" target="_blank" href="mod_laporan/laporan_tahun_ajaran.php?nm_user=<?php echo $nm_user ?>">laporan tahun ajaran</a></li>
                        <li><a class="dropdown-item" target="_blank" href="mod_laporan/laporan_prodi.php?nm_user=<?php echo $nm_user ?>">laporan prodi</a></li>
                        <li><a class="dropdown-item" href="?p=pilih">laporan Hasil Prediksi</a></li>
                </li>
            </ul>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../logout.php">logout</a>
            </li>
            </ul>
        </div>
    </div>
</nav>