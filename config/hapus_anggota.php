<?php
// Include koneksi database
include 'koneksi.php';

// Cek apakah parameter ID anggota ada di URL
if (isset($_GET['id_anggota'])) {
    // Ambil ID anggota dari parameter URL
    $id_anggota = $_GET['id_anggota'];

    // Query untuk menghapus data anggota berdasarkan ID
    $query_delete = "DELETE FROM anggota WHERE id_anggota='$id_anggota'";

    // Eksekusi query
    if ($koneksi->query($query_delete) === TRUE) {
        // Redirect ke halaman data_anggota.php setelah berhasil dihapus
        header("Location: ../data_anggota.php");
    } else {
        // Tampilkan pesan error jika query gagal
        echo "Data Gagal Dihapus! Error: " . $koneksi->error;
    }
} else {
    // Jika parameter ID anggota tidak ada di URL
    echo "ID Anggota tidak ditemukan!";
}

// Tutup koneksi database
$koneksi->close();
?>