<?php
// Include koneksi database
include 'config/koneksi.php';

// Fungsi untuk mengambil jumlah data dari tabel
function hitungJumlah($koneksi, $tabel, $statusField = null, $statusValue = null) {
    $query = "SELECT COUNT(*) AS jumlah FROM $tabel";
    
    // Jika ada kondisi tambahan berdasarkan status (misalnya untuk pinjam dan kembali)
    if ($statusField && $statusValue) {
        $query .= " WHERE $statusField = '$statusValue'";
    }

    $result = $koneksi->query($query);
    $row = $result->fetch_assoc();
    return $row['jumlah'];
}

// Ambil jumlah buku dari tabel buku
$jumlahBuku = hitungJumlah($koneksi, 'buku');

// Ambil jumlah peminjaman dari tabel peminjaman (status pinjam)
$jumlahPinjam = hitungJumlah($koneksi, 'peminjaman', 'status', 'dipinjam');

// Ambil jumlah anggota dari tabel anggota
$jumlahAnggota = hitungJumlah($koneksi, 'anggota');

// Ambil jumlah pengembalian dari tabel peminjaman (status kembali)
$jumlahKembali = hitungJumlah($koneksi, 'peminjaman', 'status', 'dikembalikan');

// Tutup koneksi database
$koneksi->close();

// Format output dalam bentuk array
$output = [
    'jumlah_buku' => $jumlahBuku,
    'jumlah_pinjam' => $jumlahPinjam,
    'jumlah_anggota' => $jumlahAnggota,
    'jumlah_kembali' => $jumlahKembali
];

// Mengembalikan hasil dalam format JSON
header('Content-Type: application/json');
echo json_encode($output);
?>