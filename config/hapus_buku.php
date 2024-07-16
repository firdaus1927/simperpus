<?php
// Include koneksi database
include 'koneksi.php';

// Cek apakah parameter ID buku ada di URL
if (isset($_GET['id_buku'])) {
    // Ambil ID buku dari parameter URL
    $id_buku = $_GET['id_buku'];

    // Query untuk mendapatkan nama file sampul buku sebelum dihapus
    $query_select = "SELECT sampul FROM buku WHERE id_buku='$id_buku'";
    $result = $koneksi->query($query_select);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $sampul = $row['sampul'];
        $target_file = "../assets/img/" . $sampul;

        // Hapus file sampul jika ada
        if (file_exists($target_file)) {
            unlink($target_file);
        }

        // Query untuk menghapus data buku berdasarkan ID
        $query_delete = "DELETE FROM buku WHERE id_buku='$id_buku'";

        // Eksekusi query
        if ($koneksi->query($query_delete) === TRUE) {
            // Redirect ke halaman data_buku.php setelah berhasil dihapus
            header("Location: ../data_buku.php");
        } else {
            // Tampilkan pesan error jika query gagal
            echo "Data Gagal Dihapus! Error: " . $koneksi->error;
        }
    } else {
        // Jika ID buku tidak ditemukan di database
        echo "Data tidak ditemukan!";
    }
} else {
    // Jika parameter ID buku tidak ada di URL
    echo "ID buku tidak ditemukan!";
}

// Tutup koneksi database
$koneksi->close();
?>