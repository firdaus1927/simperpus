<?php include('header.php'); ?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Data Buku</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
        <div class="content">
            <div class="formulir">
                <form action="config/tambah_buku.php" method="post" enctype="multipart/form-data">
                    <h2>Formulir Tambah Data Buku</h2>
                    <div class="form-group row">
                        <label for="id_buku" class="col-sm-2 col-form-label">ID Buku:</label>
                        <div class="col-sm-4">
                            <input type="text" name="id_buku" id="id_buku" class="form-control" required />
                        </div>
                        <label for="tahun_terbit" class="col-sm-2 col-form-label">Tahun Terbit:</label>
                        <div class="col-sm-4">
                            <input type="text" name="tahun_terbit" id="tahun_terbit" class="form-control" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="judul" class="col-sm-2 col-form-label">Judul:</label>
                        <div class="col-sm-4">
                            <input type="text" name="judul" id="judul" class="form-control" required />
                        </div>
                        <label for="genre" class="col-sm-2 col-form-label">Kategori:</label>
                        <div class="col-sm-4">
                            <input type="text" name="genre" id="genre" class="form-control" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="penerbit" class="col-sm-2 col-form-label">Penerbit:</label>
                        <div class="col-sm-4">
                            <input type="text" name="penerbit" id="penerbit" class="form-control" required />
                        </div>
                        <label for="isbn" class="col-sm-2 col-form-label">ISBN:</label>
                        <div class="col-sm-4">
                            <input type="text" name="isbn" id="isbn" class="form-control" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pengarang" class="col-sm-2 col-form-label">Pengarang:</label>
                        <div class="col-sm-4">
                            <input type="text" name="pengarang" id="pengarang" class="form-control" required />
                        </div>
                        <label for="jumlah_salinan" class="col-sm-2 col-form-label">Jumlah Buku:</label>
                        <div class="col-sm-4">
                            <input type="text" name="jumlah_salinan" id="jumlah_salinan" class="form-control" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sampul" class="col-sm-2 col-form-label">Upload Sampul:</label>
                        <div class="col-sm-10">
                            <input type="file" name="sampul" id="sampul" class="form-control-file" required />
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
<!-- End #main -->

<?php include('footer.php'); ?>
