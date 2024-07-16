<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // Query untuk memeriksa apakah pengguna ada
    $query = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $username;
        header("Location: ../index.php");
        exit;
    } else {
        $error = "Username atau password salah.";
        header("Location: ../login.php?error=" . urlencode($error));
        exit;
    }
} else {
    header("Location: ../login.php");
    exit;
}
?>