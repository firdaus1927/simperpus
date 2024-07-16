<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "simperpus"; // replace with your database name

// Create connection
$koneksi = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($koneksi->connect_error) {
    die("Koneksi Gagal: " . $koneksi->connect_error);
}
?>