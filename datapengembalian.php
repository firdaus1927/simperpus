<?php include('header.php'); ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="datapengembalian.php">Data Transaksi Pengembalian</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    <section class="section dashboard">
        <div class="content">
            <h1>Data Transaksi Pengembalian</h1>
            <a href="form_transaksi.php" class="btn btn-primary mb-3">Tambah Transaksi Pengembalian</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Status</th>
                        <th scope="col">Tanggal Pinjam</th>
                        <th scope="col">Tanggal Jatuh Tempo</th>
                        <th scope="col">Tanggal Kembali</th>
                        <th scope="col">Menu</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                  include 'config/koneksi.php';

                  $anggota = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE status ='dikembalikan'");
                  $no=1;
                  foreach($anggota as $key => $value) {
                  //code...

                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $value['nama']; ?></td>
                        <td><?php echo $value['judul']; ?></td>
                        <td><?php echo $value['status']; ?></td>
                        <td><?php echo $value['tanggal_pinjam']; ?></td>
                        <td><?php echo $value['tanggal_jatuh_tempo']; ?></td>
                        <td><?php echo $value['tanggal_kembali']; ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="config/kembali_buku.php?id_peminjaman=<?php echo $value['id_peminjaman']; ?>"
                                    class="btn btn-primary">Kembali</a>
                                <a href="config/hapus_transaksi.php?id_peminjaman=<?php echo $value['id_peminjaman']; ?>"
                                    class="btn btn-danger"
                                    onclick="return confirm('yakin, data buku tersebut akan dihapus?');">Hapus</a>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
</main>
<?php include('footer.php'); ?>