<?php include('header.php'); ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Laporan Data Pengunjung</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                <li class="breadcrumb-item active">Laporan Data Pengunjung</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
        <div class="content">
            <h1>Data Pengunjung</h1>

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
                    </tr>
                </thead>

                <tbody>
                    <?php
                    include 'config/koneksi.php';

                    $pengunjung = mysqli_query($koneksi, "SELECT * FROM pengunjung");
                    $no = 1;
                    foreach ($pengunjung as $value) {
                    ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $value['nama'] ?></td>
                        <td><?php echo $value['kelas'] ?></td>
                        <td><?php echo $value['level'] ?></td>
                        <td><?php echo $value['tanggal_kunjungan'] ?></td>
                        <td><?php echo $value['waktu_kunjungan'] ?></td>
                        <td><?php echo $value['keperluan'] ?></td>
                    </tr>
                    <?php
                    $no++;
                    }
                    ?>
                </tbody>
            </table>
            <button onclick="window.print()" class="btn btn-primary">Print Laporan</button>
        </div>
    </section>
</main>
<!-- End #main -->

<?php include('footer.php'); ?>
