<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Dashboard - Admin</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="assets/img/logo.jpg" rel="icon" />
    <link href="assets/img/logo.jpg" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet" />
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet" />
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo d-flex align-items-center">
                <img src="assets/img/logotut.png" alt="" />
                <span class="d-none d-lg-block">DashboardAdmin</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword" />
                <button type="submit" title="Search">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>
        <!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle" href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li>
                <!-- End Search Icon-->

                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="assets/img/logotut.png" alt="Profile" class="rounded-circle" />
                        <span class="d-none d-md-block dropdown-toggle ps-2">SIMPerpus</span>
                    </a>
                    <!-- End Profile Image Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>SD Negeri Jatimalang</h6>
                            <span>Admin SIMPERPUS</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="profilsaya.php">
                                <i class="bi bi-person"></i>
                                <span>Profil Saya</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="pengaturanakun.php">
                                <i class="bi bi-gear"></i>
                                <span>Pengaturan Akun</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="bantuan.php">
                                <i class="bi bi-question-circle"></i>
                                <span>Bantuan?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="login.php">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Keluar</span>
                            </a>
                        </li>
                    </ul>
                    <!-- End Profile Dropdown Items -->
                </li>
                <!-- End Profile Nav -->
            </ul>
        </nav>
        <!-- End Icons Navigation -->
    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <!-- End Dashboard Nav -->

            <li class="nav-heading">Data Master</li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#data-buku-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Data Buku</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="data-buku-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="fiksi.php">
                            <i class="bi bi-circle"></i><span>Fiksi</span>
                        </a>
                    </li>
                    <li>
                        <a href="nonfiksi.php">
                            <i class="bi bi-circle"></i><span>Non Fiksi</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#data-anggota-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Data Anggota</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="data-anggota-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="dataguru.php">
                            <i class="bi bi-circle"></i><span>Data Guru</span>
                        </a>
                    </li>
                    <li>
                        <a href="datasiswa.php">
                            <i class="bi bi-circle"></i><span>Data Siswa</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#data-transaksi-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Data Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="data-transaksi-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="datapengunjung.php">
                            <i class="bi bi-circle"></i><span>Data Pengunjung</span>
                        </a>
                    </li>
                    <li>
                        <a href="datapeminjaman.php">
                            <i class="bi bi-circle"></i><span>Data Peminjaman</span>
                        </a>
                    </li>
                    <li>
                        <a href="datapengembalian.php">
                            <i class="bi bi-circle"></i><span>Data Pengembalian</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Components Nav -->

            <li class="nav-heading">Laporan</li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="lap_buku.php">
                    <i class="bi bi-journal-text"></i>
                    <span>Laporan Data Buku</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="lap_pengunjung.php">
                    <i class="bi bi-journal-text"></i>
                    <span>Laporan Data Pengunjung</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="lap_transaksi.php">
                    <i class="bi bi-journal-text"></i>
                    <span>Laporan Data Transaksi</span>
                </a>
            </li>
            <!-- End Blank Page Nav -->
        </ul>
    </aside>
    <!-- End Sidebar -->
</body>

</html>
