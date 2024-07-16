<?php 
include('header.php'); 
include('config/koneksi.php');

if (isset($_GET['id_buku'])) {
    $id_buku = $_GET['id_buku'];
    $query = "SELECT * FROM buku WHERE id_buku = $id_buku";
    $result = mysqli_query($koneksi, $query);
    $buku = mysqli_fetch_assoc($result);
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
                <form action="../config/ubah_buku.php" method="post">
                    <h1>Formulir Edit Data Buku</h1>
                    <div style="display: flex; flex-wrap: wrap">
                        <div style="flex: 1; margin-right: 20px">
                            <input type="hidden" name="id_buku" value="<?php echo $buku['id_buku']; ?>" />
                            <label for="judul">Judul:</label>
                            <input type="text" name="judul" id="judul" value="<?php echo $buku['judul']; ?>" required />

                            <label for="penerbit">Penerbit:</label>
                            <input type="text" name="penerbit" id="penerbit" value="<?php echo $buku['penerbit']; ?>"
                                required />

                            <label for="pengarang">Pengarang:</label>
                            <input type="text" name="pengarang" id="pengarang" value="<?php echo $buku['pengarang']; ?>"
                                required />

                            <label for="sampul">Upload Sampul (Biarkan kosong jika tidak ingin mengganti):</label>
                            <input type="file" name="sampul" id="sampul" class="form-control" />
                        </div>
                        <div style="flex: 1">
                            <label for="tahun_terbit">Tahun Terbit:</label>
                            <input type="text" name="tahun_terbit" id="tahun_terbit"
                                value="<?php echo $buku['tahun_terbit']; ?>" required />

                            <label for="genre">Kategori:</label>
                            <input type="text" name="genre" id="genre" value="<?php echo $buku['genre']; ?>" required />

                            <label for="isbn">ISBN:</label>
                            <input type="text" name="isbn" id="isbn" value="<?php echo $buku['isbn']; ?>" required />

                            <label for="jumlah_salinan">Jumlah Buku:</label>
                            <input type="text" name="jumlah_salinan" id="jumlah_salinan"
                                value="<?php echo $buku['jumlah_salinan']; ?>" required />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
</main>
<?php include('footer.php'); ?>