<?php include('header.php'); ?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Data Transaksi</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    <section class="section dashboard">
        <div class="content">
            <div class="formulir">
                <form action="config/tambah_transaksi.php" method="post">
                    <h2>Formulir Tambah Data Transaksi</h2>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-3 col-form-label">Nama Anggota:</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama" id="nama" class="form-control" required autocomplete="off"
                                oninput="autocompleteNama(this.value)">
                            <div id="namaList"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="judul" class="col-sm-3 col-form-label">Judul Buku:</label>
                        <div class="col-sm-9">
                            <input type="text" name="judul" id="judul" class="form-control" required autocomplete="off"
                                oninput="autocompleteJudul(this.value)">
                            <div id="judulList"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label">Status Peminjaman:</label>
                        <div class="col-sm-9">
                            <select name="status" id="status" class="form-control" required>
                                <option value="dipinjam">Pinjam</option>
                                <option value="dikembalikan">Kembali</option>
                                <option value="terlambat">Terlambat</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal_pinjam" class="col-sm-3 col-form-label">Tanggal Pinjam:</label>
                        <div class="col-sm-9">
                            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" required
                                onchange="setJatuhTempo()" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal_jatuh_tempo" class="col-sm-3 col-form-label">Tanggal Jatuh Tempo:</label>
                        <div class="col-sm-9">
                            <input type="date" name="tanggal_jatuh_tempo" id="tanggal_jatuh_tempo" class="form-control"
                                required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>

                <script>
                function setJatuhTempo() {
                    var tanggalPinjam = document.getElementById('tanggal_pinjam').value;
                    var date = new Date(tanggalPinjam);
                    date.setDate(date.getDate() + 5); // Menambah 5 hari ke tanggal pinjam
                    var tanggalJatuhTempo = date.toISOString().slice(0, 10); // Mengubah ke format YYYY-MM-DD

                    document.getElementById('tanggal_jatuh_tempo').value = tanggalJatuhTempo;
                }

                function autocompleteNama(keyword) {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            var response = JSON.parse(this.responseText);
                            var namaList = document.getElementById("namaList");
                            namaList.innerHTML = "";
                            response.forEach(function(item) {
                                var option = document.createElement("div");
                                option.textContent = item.nama;
                                option.setAttribute("onclick", "selectNama('" + item.nama + "')");
                                namaList.appendChild(option);
                            });
                        }
                    };
                    xhttp.open("GET", "config/autocomplete_nama.php?keyword=" + keyword, true);
                    xhttp.send();
                }

                function selectNama(nama) {
                    document.getElementById("nama").value = nama;
                    document.getElementById("namaList").innerHTML = "";
                }

                function autocompleteJudul(keyword) {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            var response = JSON.parse(this.responseText);
                            var judulList = document.getElementById("judulList");
                            judulList.innerHTML = "";
                            response.forEach(function(item) {
                                var option = document.createElement("div");
                                option.textContent = item.judul;
                                option.setAttribute("onclick", "selectJudul('" + item.judul + "')");
                                judulList.appendChild(option);
                            });
                        }
                    };
                    xhttp.open("GET", "config/autocomplete_judul.php?keyword=" + keyword, true);
                    xhttp.send();
                }

                function selectJudul(judul) {
                    document.getElementById("judul").value = judul;
                    document.getElementById("judulList").innerHTML = "";
                }
                </script>
            </div>
        </div>
    </section>
</main>

<?php include('footer.php'); ?>
