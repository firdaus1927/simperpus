<?php include('header.php'); ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="data_buku.php">Data Buku</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    <section class="section dashboard">
        <div class="content">
            <h1>Data Buku</h1>
            <a href="form_buku.php" class="btn btn-primary mb-3">Tambah Buku</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Buku</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Pengarang</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Tahun Terbit</th>
                        <th scope="col">Genre</th>
                        <th scope="col">isbn</th>
                        <th scope="col">Jumlah Buku</th>
                        <th scope="col">Menu</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                  include 'config/koneksi.php';

                  $buku = mysqli_query($koneksi, "SELECT * FROM buku");
                  $no=1;
                  foreach($buku as $key => $value) {
                  //code...

                ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><img src="assets/img/<?php echo $value['sampul'] ?>" alt="Foto" width="150"></td>
                        <td><?php echo $value['judul'] ?></td>
                        <td><?php echo $value['pengarang'] ?></td>
                        <td><?php echo $value['penerbit'] ?></td>
                        <td><?php echo $value['tahun_terbit'] ?></td>
                        <td><?php echo $value['genre'] ?></td>
                        <td><?php echo $value['isbn'] ?></td>
                        <td><?php echo $value['jumlah_salinan'] ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="edit_form_buku.php?id_buku=<?php echo $value['id_buku'] ?>"
                                    class="btn btn-primary">Edit</a>
                                <a href="config/hapus_buku.php?id_buku=<?php echo $value['id_buku'] ?>"
                                    class="btn btn-danger"
                                    onclick="return confirm('yakin, data buku tersebut akan dihapus?');">Hapus</a>
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