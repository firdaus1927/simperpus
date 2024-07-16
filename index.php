<?php include('header.php'); ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    <section class="section dashboard">
        <div class="content dashboard-content">
            <div class="dashboard-header">
                <h2 id="tanggal"></h2>
                <h3 id="jam"></h3>
                <div style="margin-bottom: 20px;"></div> <!-- Tambahkan space di sini -->
            </div>
            <div class="card-container">
                <div class="card left">
                    <div id="dataBuku">
                        <h2>Data Buku: <span></span></h2>
                    </div>
                </div>
                <div class="card right">
                    <div id="dataPinjam">
                        <h2>Data Pinjam: <span></span></h2>
                    </div>
                </div>
                <div class="card left">
                    <div id="dataAnggota">
                        <h2>Data Pengunjung: <span></span></h2>
                    </div>
                </div>
                <div class="card right">
                    <div id="dataKembali">
                        <h2>Data Kembali: <span></span></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- End #main -->

<?php include('footer.php'); ?>

<style>
    /* Tambahkan gaya CSS di sini */
    .card-container {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .card.left {
        grid-column: 1 / span 1;
    }

    .card.right {
        grid-column: 2 / span 1;
    }

    .dashboard-header {
        margin-bottom: 20px; /* Tambahkan margin-bottom di sini */
    }

    .card h2 {
        background-color: #012970;
        color: #fff;
        padding: 15px;
        border-radius: 5px 5px 0 0;
    }

    .card h2 span {
        color: #fff;
        font-size: 20px;
        font-weight: bold;
    }
</style>

<script>
    // Panggil get_count.php menggunakan fetch
    fetch('get_count.php')
        .then(response => response.json())
        .then(data => {
            // Masukkan data ke dalam masing-masing data-box
            document.getElementById('dataBuku').innerHTML =
                `<h2>Data Buku: <span>${data.jumlah_buku}</span></h2>`;
            document.getElementById('dataPinjam').innerHTML =
                `<h2>Data Pinjam: <span>${data.jumlah_pinjam}</span></h2>`;
            document.getElementById('dataAnggota').innerHTML =
                `<h2>Data Pengunjung: <span>${data.jumlah_anggota}</span></h2>`;
            document.getElementById('dataKembali').innerHTML =
                `<h2>Data Kembali: <span>${data.jumlah_kembali}</span></h2>`;
        })
        .catch(error => console.error('Error fetching data:', error));

    // Fungsi untuk memperbarui waktu dan tanggal
    function perbaruiWaktuDanTanggal() {
        const sekarang = new Date();
        const opsi = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };

        const tanggalString = sekarang.toLocaleDateString('id-ID', opsi);
        const waktuString = sekarang.toLocaleTimeString('id-ID');

        document.getElementById('tanggal').innerText = tanggalString;
        document.getElementById('jam').innerText = waktuString;
    }

    // Perbarui waktu dan tanggal setiap detik
    setInterval(perbaruiWaktuDanTanggal, 1000);
    perbaruiWaktuDanTanggal(); // Panggilan awal untuk langsung mengatur waktu dan tanggal
</script>
