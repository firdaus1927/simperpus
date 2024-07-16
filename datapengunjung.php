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
        <h1>Data Pengunjung</h1>
            <a href="form_pengunjung.php" class="btn btn-primary mb-3">Tambah Pengunjung</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pengunjung</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Level</th>
                        <th scope="col">Tanggal Kunjungan</th>
                        <th scope="col">Waktu Kunjungan</th>
                        <th scope="col">Keperluan</th>
                        <th scope="col">Menu</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                  include 'config/koneksi.php';

                  $anggota = mysqli_query($koneksi, "SELECT * FROM pengunjung");
                  $no=1;
                  foreach($anggota as $key => $value) {
                  //code...

                ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $value['nama'] ?></td>
                        <td><?php echo $value['kelas'] ?></td>
                        <td><?php echo $value['level'] ?></td>
                        <td><?php echo $value['tanggal_kunjungan'] ?></td>
                        <td><?php echo $value['waktu_kunjungan'] ?></td>
                        <td><?php echo $value['keperluan'] ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="edit_form_anggota.php?id_pengunjung=<?php echo $value['id_pengunjung'] ?>"
                                    class="btn btn-primary">Edit</a>
                                <a href="config/hapus_anggota.php?id_pengunjung=<?php echo $value['id_pengunjung'] ?>"
                                    class="btn btn-danger"
                                    onclick="return confirm('yakin, data pengunjung tersebut akan dihapus?');">Hapus</a>
                            </div>
                        </td>
                    </tr>
                    <?php
                $no++;

                }
                ?>
                </tbody>
            </table>
        </div>
    </section>
</main>
<!-- End #main -->

<?php include('footer.php'); ?>