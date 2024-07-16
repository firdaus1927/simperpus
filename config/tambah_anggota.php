<?php
// Include koneksi database
include 'koneksi.php';

// Ambil data dari form
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$level = $_POST['level'];

// Query untuk menambahkan data anggota ke database
$query = "INSERT INTO anggota (nama, alamat, tempat_lahir, tanggal_lahir, jenis_kelamin, level) 
          VALUES ('$nama', '$alamat', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$level')";

// Eksekusi query
if ($koneksi->query($query) === TRUE) {
    // Redirect ke halaman data_anggota.php setelah berhasil menambahkan
    header("Location: ../data_anggota.php");
} else {
    // Tampilkan pesan error jika query gagal
    echo "Data Gagal Ditambahkan! Error: " . $koneksi->error;
}

// Tutup koneksi database
$koneksi->close();
?>