<?php include('header.php'); ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="data_anggota.php">Laporan Data Anggota</a></li>
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
                        <th scope="col">Alamat</th>
                        <th scope="col">Tempat Tanggal Lahir</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Level</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
    // Koneksi ke database (gantilah dengan koneksi sesuai dengan kebutuhan Anda)
    include('config/koneksi.php');

    // Query untuk mengambil data anggota
    $query = "SELECT * FROM anggota";
    $result = mysqli_query($koneksi, $query);

    $no = 1;
    // Loop untuk menampilkan data anggota
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . $row['nama'] . "</td>";
        echo "<td>" . $row['alamat'] . "</td>";
        echo "<td>" . $row['tempat_lahir'] . ', ' . date('d-m-Y', strtotime($row['tanggal_lahir'])) . "</td>";
        echo "<td>" . ($row['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan') . "</td>";
        echo "<td>" . $row['level'] . "</td>";
        echo "<td>";
        echo "<div class='btn-group' role='group' aria-label='Basic example'>";
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