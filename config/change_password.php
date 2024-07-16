<?php
session_start();
include 'koneksi.php';

// Pastikan pengguna sudah login sebelum mengakses halaman ini
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}

$username = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data yang dikirimkan dari form
    $current_password = mysqli_real_escape_string($koneksi, $_POST['current_password']);
    $new_password = mysqli_real_escape_string($koneksi, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($koneksi, $_POST['confirm_password']);

    // Query untuk mendapatkan kata sandi yang tersimpan di database
    $query = "SELECT password FROM login WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $stored_password = $row['password'];

        // Verifikasi kata sandi saat ini dengan kata sandi yang tersimpan di database
        if ($current_password === $stored_password) {
            // Validasi kata sandi baru
            if ($new_password === $confirm_password) {
                // Update kata sandi di database
                $update_query = "UPDATE login SET password = '$new_password' WHERE username = '$username'";
                $update_result = mysqli_query($koneksi, $update_query);

                if ($update_result) {
                    // Redirect ke halaman pengaturan akun dengan pesan sukses
                    header("Location: ../pengaturanakun.php?success=Password berhasil diubah");
                    exit;
                } else {
                    $error = "Gagal mengubah kata sandi. Silakan coba lagi.";
                }
            } else {
                $error = "Konfirmasi kata sandi baru tidak sesuai.";
            }
        } else {
            $error = "Kata sandi saat ini salah.";
        }
    } else {
        $error = "Terjadi masalah dalam mengambil data pengguna.";
    }

    // Redirect ke halaman pengaturan akun dengan pesan error
    header("Location: ../pengaturanakun.php?error=" . urlencode($error));
    exit;
} else {
    header("Location: ../pengaturanakun.php");
    exit;
}
?>