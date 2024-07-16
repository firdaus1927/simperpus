<?php include('header.php'); ?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Data Pengunjung</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    <section class="section dashboard">
        <div class="content">
            <div class="formulir">
                <form action="config/tambah_pengunjung.php" method="post">
                    <h2>Formulir Tambah Data Pengunjung</h2>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Pengunjung:</label>
                        <div class="col-sm-4">
                            <input type="text" name="nama" id="nama" class="form-control" required />
                        </div>
                        <label for="level" class="col-sm-2 col-form-label">Level:</label>
                        <div class="col-sm-4">
                            <select name="level" id="level" class="form-control" required>
                                <option value="guru">Guru</option>
                                <option value="siswa">Siswa</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kelas" class="col-sm-2 col-form-label">Kelas:</label>
                        <div class="col-sm-4">
                            <select name="kelas" id="kelas" class="form-control" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>
                        <label for="tanggal_kunjungan" class="col-sm-2 col-form-label">Tanggal Kunjungan:</label>
                        <div class="col-sm-4">
                            <input type="date" name="tanggal_kunjungan" id="tanggal_kunjungan" class="form-control" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="waktu_kunjungan" class="col-sm-2 col-form-label">Waktu Kunjungan:</label>
                        <div class="col-sm-4">
                            <input type="time" name="waktu_kunjungan" id="waktu_kunjungan" class="form-control" required>
                        </div>
                        <label for="keperluan" class="col-sm-2 col-form-label">Keperluan:</label>
                        <div class="col-sm-4">
                            <input type="text" name="keperluan" id="keperluan" class="form-control" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<?php include('footer.php'); ?>
