-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 08 Jul 2024 pada 07.34
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simperpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `level` enum('guru','siswa') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `level`) VALUES
(22, 'Nisrina', 'Tanahsari', 'Kebumen', '2018-09-13', 'P', 'siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int NOT NULL,
  `sampul` varchar(50) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` int NOT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `isbn` varchar(20) DEFAULT NULL,
  `jumlah_salinan` int DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `sampul`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `genre`, `isbn`, `jumlah_salinan`) VALUES
(22, 'ayat_ayat_cinta.jpg', 'Ayat-Ayat Cinta', 'Habiburrahman El Shirazy', 'Republika', 2004, 'Religi', '9789793210002', 3),
(23, 'harry_potter_1.jpg', 'Harry Potter and the Philosopher\'s Stone', 'J.K. Rowling', 'Bloomsbury', 1997, 'Fantasy', '9780747532699', 7),
(24, 'to_kill_a_mockingbird.jpg', 'To Kill a Mockingbird', 'Harper Lee', 'J.B. Lippincott & Co.', 1960, 'Classic', '9780061120084', 4),
(25, 'the_great_gatsby.jpg', 'The Great Gatsby', 'F. Scott Fitzgerald', 'Charles Scribner\'s Sons', 1925, 'Classic', '9780743273565', 2),
(26, '1984.jpg', '1984', 'George Orwell', 'Secker & Warburg', 1949, 'Dystopian', '9780451524935', 6),
(27, 'pride_and_prejudice.jpg', 'Pride and Prejudice', 'Jane Austen', 'T. Egerton', 1813, 'Classic', '9781503290563', 5),
(28, 'the_catcher_in_the_rye.jpg', 'The Catcher in the Rye', 'J.D. Salinger', 'Little, Brown and Company', 1951, 'Fiction', '9780316769488', 3),
(30, 'the_lord_of_the_rings.jpg', 'The Lord of the Rings', 'J.R.R. Tolkien', 'George Allen & Unwin', 1954, 'Fantasy', '9780261102385', 8),
(31, 'the_da_vinci_code.jpg', 'The Da Vinci Code', 'Dan Brown', 'Doubleday', 2003, 'Mystery', '9780385504201', 5),
(32, 'the_alchemist.jpg', 'The Alchemist', 'Paulo Coelho', 'HarperTorch', 1988, 'Adventure', '9780061122415', 4),
(33, 'moby_dick.jpg', 'Moby Dick', 'Herman Melville', 'Harper & Brothers', 1851, 'Classic', '9781503280786', 3),
(34, 'war_and_peace.jpg', 'War and Peace', 'Leo Tolstoy', 'The Russian Messenger', 1869, 'Historical', '9781400079988', 2),
(35, 'great_expectations.jpg', 'Great Expectations', 'Charles Dickens', 'Chapman & Hall', 1861, 'Classic', '9780141439563', 6),
(36, 'crime_and_punishment.jpg', 'Crime and Punishment', 'Fyodor Dostoevsky', 'The Russian Messenger', 1866, 'Philosophical', '9780486415871', 4),
(37, 'the_scarlet_letter.jpg', 'The Scarlet Letter', 'Nathaniel Hawthorne', 'Ticknor, Reed & Fields', 1850, 'Historical', '9780142437261', 3),
(38, 'animal_farm.jpg', 'Animal Farm', 'George Orwell', 'Secker & Warburg', 1945, 'Political', '9780451526342', 5),
(41, '../assets/img/logo.jpg', 'Buku Tamu', 'Admin', 'Admin', 2020, 'Buku', '12346789', 1),
(42, '../assets/img/mati.jpg', 'Buku Besar', 'Admin', 'Admin', 2020, 'Buku', '12346789', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int NOT NULL,
  `id_anggota` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_buku` int NOT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_jatuh_tempo` date NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status` enum('dipinjam','dikembalikan','terlambat') DEFAULT 'dipinjam'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_anggota`, `nama`, `id_buku`, `judul`, `tanggal_pinjam`, `tanggal_jatuh_tempo`, `tanggal_kembali`, `status`) VALUES
(2, 2, 'Nama Anggota 2', 2, 'Judul Buku 2', '2024-07-07', '2024-07-12', '2024-07-08', 'dikembalikan'),
(5, 5, 'Nama Anggota 5', 5, 'Judul Buku 5', '2024-07-07', '2024-07-12', NULL, 'dikembalikan'),
(6, 6, 'Nama Anggota 6', 6, 'Judul Buku 6', '2024-07-07', '2024-07-12', NULL, 'dipinjam'),
(7, 7, 'Nama Anggota 7', 7, 'Judul Buku 7', '2024-07-07', '2024-07-12', NULL, 'dikembalikan'),
(8, 8, 'Nama Anggota 8', 8, 'Judul Buku 8', '2024-07-07', '2024-07-12', NULL, 'dikembalikan'),
(9, 9, 'Nama Anggota 9', 9, 'Judul Buku 9', '2024-07-07', '2024-07-12', NULL, 'dipinjam'),
(10, 10, 'Nama Anggota 10', 10, 'Judul Buku 10', '2024-07-07', '2024-07-12', NULL, 'dipinjam'),
(11, 11, 'Nama Anggota 11', 11, 'Judul Buku 11', '2024-07-07', '2024-07-12', NULL, 'dipinjam'),
(12, 12, 'Nama Anggota 12', 12, 'Judul Buku 12', '2024-07-07', '2024-07-12', NULL, 'dikembalikan'),
(13, 13, 'Nama Anggota 13', 13, 'Judul Buku 13', '2024-07-07', '2024-07-12', NULL, 'dipinjam'),
(17, 22, 'Nisrina', 41, 'Buku Tamu', '2024-07-05', '2024-07-10', NULL, 'dipinjam');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
