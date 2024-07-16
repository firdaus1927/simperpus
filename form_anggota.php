<?php include('header.php'); ?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Data Anggota</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    <section class="section dashboard">
        <div class="content">
            <div class="formulir">
                <form action="config/tambah_anggota.php" method="post">
                    <h2>Formulir Tambah Data Anggota</h2>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Anggota:</label>
                        <div class="col-sm-4">
                            <input type="text" name="nama" id="nama" class="form-control" required />
                        </div>
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat:</label>
                        <div class="col-sm-4">
                            <input type="text" name="alamat" id="alamat" class="form-control" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir:</label>
                        <div class="col-sm-4">
                            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required />
                        </div>
                        <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir:</label>
                        <div class="col-sm-4">
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin:</label>
                        <div class="col-sm-4">
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
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
