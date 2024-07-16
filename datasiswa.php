<?php include('header.php'); ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="datasiswa.php">Data Anggota Siswa</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    <section class="section dashboard">
        <div class="content">
            <h1>Data Anggota Siswa</h1>
            <a href="form_anggota.php" class="btn btn-primary mb-3">Tambah Anggota Siswa</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Anggota</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Tempat Tanggal Lahir</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Level</th>
                        <th scope="col">Menu</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                  include 'config/koneksi.php';

                  $anggota = mysqli_query($koneksi, "SELECT * FROM anggota WHERE level = 'siswa'");
                  $no=1;
                  foreach($anggota as $key => $value) {
                  //code...

                ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $value['nama'] ?></td>
                        <td><?php echo $value['alamat'] ?></td>
                        <td><?php echo $value['tempat_lahir'] . ', ' . $value['tanggal_lahir']; ?></td>
                        <td><?php echo ($value['jenis_kelamin'] == 'L') ? 'Laki-laki' : 'Perempuan'; ?></td>
                        <td><?php echo $value['level'] ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="edit_form_anggota.php?id_anggota=<?php echo $value['id_anggota'] ?>"
                                    class="btn btn-primary">Edit</a>
                                <a href="config/hapus_anggota.php?id_anggota=<?php echo $value['id_anggota'] ?>"
                                    class="btn btn-danger"
                                    onclick="return confirm('yakin, data anggota tersebut akan dihapus?');">Hapus</a>
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
<?php include('footer.php'); ?>