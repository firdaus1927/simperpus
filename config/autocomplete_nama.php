<?php
// Include koneksi database
include 'koneksi.php';

// Ambil keyword dari parameter GET
$keyword = $_GET['keyword'];

// Query untuk mencari nama anggota berdasarkan keyword
$query = "SELECT nama FROM anggota WHERE nama LIKE '%$keyword%'";
$result = $koneksi->query($query);

// Buat array untuk menampung hasil
$namaList = array();
while ($row = $result->fetch_assoc()) {
    $namaList[] = array('nama' => $row['nama']);
}

// Encode array menjadi JSON dan kirimkan kembali ke JavaScript
echo json_encode($namaList);
?>