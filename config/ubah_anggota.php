<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_anggota = $_POST['id_anggota'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $level = $_POST['level'];

    $query = "UPDATE anggota SET 
                nama = '$nama', 
                alamat = '$alamat', 
                tempat_lahir = '$tempat_lahir', 
                tanggal_lahir = '$tanggal_lahir', 
                jenis_kelamin = '$jenis_kelamin', 
                level = '$level' 
              WHERE id_anggota = $id_anggota";

    if (mysqli_query($koneksi, $query)) {
        header('Location: ../data_anggota.php');
    } else {
        echo "Error updating record: " . mysqli_error($koneksi);
    }
}
?>