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
    $username = $row['username'];
    $password = $row['password']; // Ambil nilai password dari database
}

mysqli_close($koneksi); // Tutup koneksi database setelah selesai
?>

<?php include('header.php'); ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Profil Saya</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    <section class="section dashboard">
        <div class="container">
            <div class="content">
                <form>
                    <h2>Informasi Profil</h2>
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" value="<?php echo $username; ?>" disabled>
                    <label for="password">Password:</label>
                    <input type="text" id="password" name="password" value="<?php echo $password; ?>" disabled>
                    <!-- Menampilkan nilai password dari database -->
                </form>
            </div>
        </div>
    </section>
</main>

<?php include('footer.php'); ?>