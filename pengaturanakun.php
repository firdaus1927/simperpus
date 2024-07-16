<?php
session_start();
include 'config/koneksi.php';

// Pastikan pengguna sudah login sebelum menampilkan informasi profil
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username']; // Ambil username dari session
$query = "SELECT * FROM login WHERE username = '$username'";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query error: " . mysqli_error($koneksi));
}

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $current_password = $row['password']; // Ambil nilai password dari database
}

mysqli_close($koneksi); // Tutup koneksi database setelah selesai
?>
<?php include('header.php'); ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Pengaturan Akun</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    <section class="section dashboard">
        <div class="container">
            <h1>Pengaturan Akun</h1>
            <div class="content">
                <h2>Keamanan Akun</h2>
                <form action="config/change_password.php" method="post">
                    <label for="current_password">Kata Sandi Saat Ini:</label>
                    <input type="text" id="current_password" name="current_password"
                        value="<?php echo $current_password; ?>" readonly>
                    <label for="new_password">Kata Sandi Baru:</label>
                    <input type="password" id="new_password" name="new_password" required>
                    <label for="confirm_password">Konfirmasi Kata Sandi Baru:</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                    <button type="submit">Ubah Kata Sandi</button>
                </form>
            </div>
    </section>
</main>

<?php include('footer.php'); ?>