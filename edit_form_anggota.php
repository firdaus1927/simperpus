<?php 
include('header.php'); 
include('config/koneksi.php');

if (isset($_GET['id_anggota'])) {
    $id_anggota = $_GET['id_anggota'];
    $query = "SELECT * FROM anggota WHERE id_anggota = $id_anggota";
    $result = mysqli_query($koneksi, $query);
    $anggota = mysqli_fetch_assoc($result);
}
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Data Anggota</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    <section class="section dashboard">
        <div class="content">
            <div class="formulir">
                <form action="../config/ubah_anggota.php" method="post">
                    <h1>Formulir Edit Data Anggota</h1>
                    <div style="display: flex; flex-wrap: wrap">
                        <div style="flex: 1; margin-right: 20px">
                            <input type="hidden" name="id_anggota" value="<?php echo $anggota['id_anggota']; ?>" />
                            <label for="nama">Nama Anggota:</label>
                            <input type="text" name="nama" id="nama" value="<?php echo $anggota['nama']; ?>" required />

                            <label for="alamat">Alamat:</label>
                            <input type="text" name="alamat" id="alamat" value="<?php echo $anggota['alamat']; ?>"
                                required />

                            <label for="tempat_lahir">Tempat Lahir:</label>
                            <input type="text" name="tempat_lahir" id="tempat_lahir"
                                value="<?php echo $anggota['tempat_lahir']; ?>" required />
                        </div>
                        <div style="flex: 1;">
                            <label for="tanggal_lahir">Tanggal Lahir:</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                value="<?php echo $anggota['tanggal_lahir']; ?>" required />

                            <label for="jenis_kelamin">Jenis Kelamin:</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" required>
                                <option value="L" <?php if ($anggota['jenis_kelamin'] == 'L') echo 'selected'; ?>>
                                    Laki-laki</option>
                                <option value="P" <?php if ($anggota['jenis_kelamin'] == 'P') echo 'selected'; ?>>
                                    Perempuan</option>
                            </select>

                            <label for="level">Level:</label>
                            <select name="level" id="level" required>
                                <option value="guru" <?php if ($anggota['level'] == 'guru') echo 'selected'; ?>>Guru
                                </option>
                                <option value="siswa" <?php if ($anggota['level'] == 'siswa') echo 'selected'; ?>>Siswa
                                </option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
</main>
<?php include('footer.php'); ?>