<?php
// Include koneksi database
include 'koneksi.php';

// Ambil data dari form
$nama = $_POST['nama'];
$judul = $_POST['judul'];
$status = $_POST['status'];
$tanggal_pinjam = $_POST['tanggal_pinjam'];
$tanggal_jatuh_tempo = $_POST['tanggal_jatuh_tempo'];

// Ambil id_anggota dari tabel anggota berdasarkan nama yang dipilih
$query_anggota = "SELECT id_anggota, nama FROM anggota WHERE nama = '$nama'";
$result_anggota = $koneksi->query($query_anggota);

if ($result_anggota->num_rows > 0) {
    $row_anggota = $result_anggota->fetch_assoc();
    $id_anggota = $row_anggota['id_anggota'];
    $nama_anggota = $row_anggota['nama']; 

    // Ambil id_buku dari tabel buku berdasarkan judul yang dipilih
    $query_buku = "SELECT id_buku, judul FROM buku WHERE judul = '$judul'";
    $result_buku = $koneksi->query($query_buku);

    if ($result_buku->num_rows > 0) {
        $row_buku = $result_buku->fetch_assoc();
        $id_buku = $row_buku['id_buku'];
        $judul_buku = $row_buku['judul'];

        // Query untuk menambahkan data transaksi ke dalam database
        $query = "INSERT INTO peminjaman (id_anggota, nama, id_buku, judul, status, tanggal_pinjam, tanggal_jatuh_tempo) 
                  VALUES ('$id_anggota', '$nama_anggota', '$id_buku', '$judul_buku', '$status', '$tanggal_pinjam', '$tanggal_jatuh_tempo')";

        // Eksekusi query
        if ($koneksi->query($query) === TRUE) {
            // Redirect ke halaman data_transaksi.php setelah berhasil menambahkan
            header("Location: ../data_transaksi.php");
        } else {
            // Tampilkan pesan error jika query gagal
            echo "Data Gagal Ditambahkan! Error: " . $koneksi->error;
        }
    } else {
        echo "Error: Judul buku tidak ditemukan dalam database.";
    }
} else {
    echo "Error: Nama anggota tidak ditemukan dalam database.";
}

// Tutup koneksi database
$koneksi->close();
?>
