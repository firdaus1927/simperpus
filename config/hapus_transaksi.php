<?php
// Include koneksi database
include 'koneksi.php';

// Pastikan parameter anggota_id terdefinisi dan bukan kosong
if (isset($_GET['id_peminjaman']) && !empty($_GET['id_peminjaman'])) {
    $id_peminjaman = $_GET['id_peminjaman'];

    // Query untuk menghapus data transaksi berdasarkan transaksi_id
    $query = "DELETE FROM peminjaman WHERE id_peminjaman = $id_peminjaman";

    // Eksekusi query
    if ($koneksi->query($query) === TRUE) {
        // Redirect ke halaman data_transaksi.php setelah berhasil menghapus
        header("Location: ../data_transaksi.php");
    } else {
        // Tampilkan pesan error jika query gagal
        echo "Data Gagal Dihapus! Error: " . $koneksi->error;
    }
} else {
    echo "Transaksi ID tidak valid.";
}

// Tutup koneksi database
$koneksi->close();
?>