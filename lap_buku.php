<?php include('header.php'); ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="data_buku.php">Laporan Data Buku</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    <section class="section dashboard">
        <div class="content">
            <h2>Laporan Data Buku</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Buku</th>
                        <th>Judul</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Genre</th>
                        <th>ISBN</th>
                        <th>Jumlah Salinan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
            // Koneksi ke database (gantilah dengan koneksi sesuai dengan kebutuhan Anda)
            include('config/koneksi.php');

            // Query untuk mengambil data buku
            $query = "SELECT * FROM buku";
            $result = mysqli_query($koneksi, $query);

            // Loop untuk menampilkan data buku
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id_buku'] . "</td>";
                echo "<td>" . $row['judul'] . "</td>";
                echo "<td>" . $row['pengarang'] . "</td>";
                echo "<td>" . $row['penerbit'] . "</td>";
                echo "<td>" . $row['tahun_terbit'] . "</td>";
                echo "<td>" . $row['genre'] . "</td>";
                echo "<td>" . $row['isbn'] . "</td>";
                echo "<td>" . $row['jumlah_salinan'] . "</td>";
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