<?php

// Include koneksi database
include 'koneksi.php';

// Cek apakah form data telah diset dan menangani upload file
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Ambil data dari form
    $judul = isset($_POST['judul']) ? $_POST['judul'] : '';
    $pengarang = isset($_POST['pengarang']) ? $_POST['pengarang'] : '';
    $penerbit = isset($_POST['penerbit']) ? $_POST['penerbit'] : '';
    $tahun_terbit = isset($_POST['tahun_terbit']) ? $_POST['tahun_terbit'] : '';
    $genre = isset($_POST['genre']) ? $_POST['genre'] : '';
    $isbn = isset($_POST['isbn']) ? $_POST['isbn'] : '';
    $jumlah_salinan = isset($_POST['jumlah_salinan']) ? $_POST['jumlah_salinan'] : '';

    // Tangani upload file
    $target_dir = "../assets/img/";
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($_FILES["sampul"]["name"], PATHINFO_EXTENSION));
    $target_file = $target_dir . basename($_FILES["sampul"]["name"]);

    // Cek apakah file adalah gambar asli atau palsu
    if (isset($_FILES["sampul"]) && $_FILES["sampul"]["error"] == 0) {
        $check = getimagesize($_FILES["sampul"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File bukan gambar.";
            $uploadOk = 0;
        }

        // Cek apakah file sudah ada
        if (file_exists($target_file)) {
            echo "Maaf, file sudah ada.";
            $uploadOk = 0;
        }

        // Cek ukuran file
        if ($_FILES["sampul"]["size"] > 500000) {
            echo "Maaf, file Anda terlalu besar.";
            $uploadOk = 0;
        }

        // Izinkan format file tertentu
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diizinkan.";
            $uploadOk = 0;
        }

        // Cek apakah $uploadOk diset ke 0 oleh error
        if ($uploadOk == 0) {
            echo "Maaf, file Anda tidak terupload.";
        // Jika semuanya oke, coba upload file
        } else {
            if (move_uploaded_file($_FILES["sampul"]["tmp_name"], $target_file)) {
                echo "File " . htmlspecialchars(basename($_FILES["sampul"]["name"])) . " telah diupload.";
                // Masukkan data ke dalam database
                $query = "INSERT INTO buku (sampul, judul, pengarang, penerbit, tahun_terbit, genre, isbn, jumlah_salinan) 
                          VALUES ('$target_file', '$judul', '$pengarang', '$penerbit', '$tahun_terbit', '$genre', '$isbn', '$jumlah_salinan')";

                // Cek apakah query berhasil
                if ($koneksi->query($query) === TRUE) {
                    // Redirect ke halaman data_buku.php
                    header("Location: ../data_buku.php");
                } else {
                    // Tampilkan pesan error jika query gagal
                    echo "Data Gagal Disimpan! Error: " . $koneksi->error;
                }
            } else {
                echo "Maaf, terjadi kesalahan saat mengupload file Anda.";
            }
        }
    } else {
        echo "File tidak dipilih atau terjadi kesalahan dalam upload file.";
    }
} else {
    echo "Metode permintaan tidak valid.";
}

?>