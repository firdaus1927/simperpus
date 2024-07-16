<?php
// Include koneksi database
include 'koneksi.php';

// Ambil keyword dari parameter GET
$keyword = $_GET['keyword'];

// Query untuk mencari judul buku berdasarkan keyword
$query = "SELECT judul FROM buku WHERE judul LIKE '%$keyword%'";
$result = $koneksi->query($query);

// Buat array untuk menampung hasil
$judulList = array();
while ($row = $result->fetch_assoc()) {
    $judulList[] = array('judul' => $row['judul']);
}

// Encode array menjadi JSON dan kirimkan kembali ke JavaScript
echo json_encode($judulList);
?>