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
                        Data Master
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="?p=user_data">data user</a></li>
                        <li><a class="dropdown-item" href="?p=tahun_ajaran_data">data tahun ajaran</a></li>
                        <li><a class="dropdown-item" href="?p=prodi_data">data prodi</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Data Upload
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="?p=x1_data"> X1 (Jumlah biaya)</a></li>
                        <li><a class="dropdown-item" href="?p=x2_data"> X2 (jumlah pendaftar)</a></li>
                        <li><a class="dropdown-item" href="?p=y_data"> Y (jumlah mahasiswa baru)</a></li>
                </li>
            </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Info Data
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="?p=user_info">info user</a></li>
                    <li><a class="dropdown-item" href="?p=tahun_ajaran_info">info tahun ajaran</a></li>
                    <li><a class="dropdown-item" href="?p=prodi_info">info prodi</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="?p=regresi_pilih">regresi linear berganda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="?p=hasil_pilih">hasil perhitungan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../logout.php">logout</a>
            </li>
            </ul>
        </div>
    </div>
</nav>