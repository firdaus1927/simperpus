<?php include('header.php'); ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="data_anggota.php">Laporan Data Transaksi</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    <section class="section dashboard">
        <div class="content">
            <h2>Laporan Data Anggota</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Anggota</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Tanggal Pinjam</th>
                        <th scope="col">Tanggal Jatuh Tempo</th>
                        <th scope="col">Tanggal Kembali</th>
                        <th scope="col">Status Peminjaman</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Koneksi ke database (gantilah dengan koneksi sesuai dengan kebutuhan Anda)
                    include('config/koneksi.php');

                    // Query untuk mengambil data peminjaman
                    $query = "SELECT * FROM peminjaman";
                    $result = mysqli_query($koneksi, $query);

                    $no = 1;
                    // Loop untuk menampilkan data peminjaman
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>"; // Nomor urut increment
                        echo "<td>" . $row['nama'] . "</td>"; // Nama anggota
                        echo "<td>" . $row['judul'] . "</td>"; // Judul buku
                        echo "<td>" . ($row['tanggal_pinjam'] != null ? date('d-m-Y', strtotime($row['tanggal_pinjam'])) : '') . "</td>"; // Tanggal pinjam
                        echo "<td>" . ($row['tanggal_jatuh_tempo'] != null ? date('d-m-Y', strtotime($row['tanggal_jatuh_tempo'])) : '') . "</td>"; // Tanggal jatuh tempo
                        echo "<td>" . ($row['tanggal_kembali'] != null ? date('d-m-Y', strtotime($row['tanggal_kembali'])) : '') . "</td>"; // Tanggal kembali
                        echo "<td>" . $row['status'] . "</td>"; // Status peminjaman
                        echo "<td>";
                        echo "<div class='btn-group' role='group' aria-label='Basic example'>";
                        // Tambahkan tombol-tombol aksi sesuai kebutuhan
                        echo "</div>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>

            <button onclick="window.print()" class="btn btn-primary">Print Laporan</button>
        </div>
    </section>
</main>
<?php include('footer.php'); ?>