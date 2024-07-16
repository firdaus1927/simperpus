<?php

// Include koneksi database
include 'koneksi.php';

// Cek apakah form data telah diset dan menangani permintaan POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Ambil data dari form
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $kelas = isset($_POST['kelas']) ? $_POST['kelas'] : '';
    $level = isset($_POST['level']) ? $_POST['level'] : '';
    $tanggal_kunjungan = isset($_POST['tanggal_kunjungan']) ? $_POST['tanggal_kunjungan'] : '';
    $waktu_kunjungan = isset($_POST['waktu_kunjungan']) ? $_POST['waktu_kunjungan'] : '';
    $keperluan = isset($_POST['keperluan']) ? $_POST['keperluan'] : '';

    // Menyiapkan query SQL untuk memasukkan data ke tabel pengunjung
    $query = "INSERT INTO pengunjung (nama, kelas, level, tanggal_kunjungan, waktu_kunjungan, keperluan) 
              VALUES ('$nama', '$kelas', '$level', '$tanggal_kunjungan', '$waktu_kunjungan', '$keperluan')";

    // Cek apakah query berhasil
    if ($koneksi->query($query) === TRUE) {
        // Redirect ke halaman data_pengunjung.php jika berhasil
        header("Location: ../datapengunjung.php");
    } else {
        // Tampilkan pesan error jika query gagal
        echo "Data Gagal Disimpan! Error: " . $koneksi->error;
    }

    // Menutup koneksi
    $koneksi->close();
} else {
    echo "Metode permintaan tidak valid.";
}

?>
