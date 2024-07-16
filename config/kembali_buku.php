<?php
// Include koneksi database
include 'koneksi.php';

// Set timezone sesuai zona waktu lokal
date_default_timezone_set('Asia/Jakarta'); // Sesuaikan dengan zona waktu lokal Anda

// Pastikan id_peminjaman tersedia di parameter URL
if (isset($_GET['id_peminjaman'])) {
    $id_peminjaman = $_GET['id_peminjaman'];
    
    // Mendapatkan tanggal saat ini
    $tanggal_kembali = date('Y-m-d');

    // Query untuk mengupdate tanggal_kembali berdasarkan id_peminjaman
    $query = "UPDATE peminjaman SET tanggal_kembali = '$tanggal_kembali' WHERE id_peminjaman = $id_peminjaman";

    // Eksekusi query
    if ($koneksi->query($query) === TRUE) {
        // Redirect kembali ke halaman data_transaksi.php setelah berhasil mengupdate
        header("Location: ../data_transaksi.php");
        exit(); // Pastikan untuk keluar setelah header redirect
    } else {
        // Tampilkan pesan error jika query gagal
        echo "Gagal mengupdate tanggal kembali: " . $koneksi->error;
    }

    // Tutup koneksi database
    $koneksi->close();
} else {
    echo "ID peminjaman tidak ditemukan.";
}
?>