<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_buku = mysqli_real_escape_string($koneksi, $_POST['id_buku']);
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $penerbit = mysqli_real_escape_string($koneksi, $_POST['penerbit']);
    $pengarang = mysqli_real_escape_string($koneksi, $_POST['pengarang']);
    $tahun_terbit = mysqli_real_escape_string($koneksi, $_POST['tahun_terbit']);
    $genre = mysqli_real_escape_string($koneksi, $_POST['genre']);
    $isbn = mysqli_real_escape_string($koneksi, $_POST['isbn']);
    $jumlah_salinan = mysqli_real_escape_string($koneksi, $_POST['jumlah_salinan']);

    // Handle file upload jika ada file sampul yang diunggah
    if (!empty($_FILES['sampul']['name'])) {
        $sampul = $_FILES['sampul']['name'];
        $target_dir = "assets/img/";
        $target_file = $target_dir . basename($sampul);

        // Pindahkan file yang diunggah ke folder uploads
        if (move_uploaded_file($_FILES['sampul']['tmp_name'], $target_file)) {
            $sampul = mysqli_real_escape_string($koneksi, $sampul);
            $query = "UPDATE buku SET 
                        judul = '$judul', 
                        penerbit = '$penerbit', 
                        pengarang = '$pengarang', 
                        tahun_terbit = '$tahun_terbit', 
                        genre = '$genre', 
                        isbn = '$isbn', 
                        jumlah_salinan = '$jumlah_salinan', 
                        sampul = '$sampul' 
                      WHERE id_buku = $id_buku";
        } else {
            echo "Error uploading file.";
            exit;
        }
    } else {
        $query = "UPDATE buku SET 
                    judul = '$judul', 
                    penerbit = '$penerbit', 
                    pengarang = '$pengarang', 
                    tahun_terbit = '$tahun_terbit', 
                    genre = '$genre', 
                    isbn = '$isbn', 
                    jumlah_salinan = '$jumlah_salinan' 
                  WHERE id_buku = $id_buku";
    }

    if (mysqli_query($koneksi, $query)) {
        header('Location: ../data_buku.php');
    } else {
        echo "Error updating record: " . mysqli_error($koneksi);
    }
}
?>