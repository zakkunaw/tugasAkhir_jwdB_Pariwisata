<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function calculateTotal() {
            const durasiWisata = parseInt(document.getElementById('durasi_wisata').value) || 0;
            const jumlahPeserta = parseInt(document.getElementById('jumlah_peserta').value) || 0;

            const layananPenginapan = document.getElementById('layanan_penginapan').checked ? 1000000 : 0;
            const layananTransportasi = document.getElementById('layanan_transportasi').checked ? 1200000 : 0;
            const layananMakanan = document.getElementById('layanan_makanan').checked ? 500000 : 0;

            const totalHargaPaket = durasiWisata * (layananPenginapan + layananTransportasi + layananMakanan);
            const jumlahTagihan = totalHargaPaket * jumlahPeserta;

            document.getElementById('total_harga_paket').value = totalHargaPaket;
            document.getElementById('jumlah_tagihan').value = jumlahTagihan;
        }
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="asset/wisataku.png" alt="Logo Wisata" width="80">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="hasil_pesan.php">Hasil Pesanan</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="login.php" style="background-color: crimson; border-radius: 10%;">Admin</a>
                </li>
            </ul>
        </div>
    </nav>


    <div class="container mt-5">
        <h2>Form Pemesanan</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="nama_pemesan">Nama Pemesan:</label>
                <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" required>
            </div>
            <div class="form-group">
                <label for="nomor_hp">Nomor HP:</label>
                <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" required>
            </div>
            <div class="form-group">
                <label for="tanggal_mulai_wisata">Tanggal Mulai Wisata:</label>
                <input type="date" class="form-control" id="tanggal_mulai_wisata" name="tanggal_mulai_wisata" required>
            </div>
            <div class="form-group">
                <label for="tanggal_pesanan">Tanggal Pesanan:</label>
                <input type="datetime-local" class="form-control" id="tanggal_pesanan" name="tanggal_pesanan" required>
            </div>
            <div class="form-group">
                <label for="durasi_wisata">Durasi Wisata (hari):</label>
                <input type="number" class="form-control" id="durasi_wisata" name="durasi_wisata" oninput="calculateTotal()" required>
            </div>
            <div class="form-group">
                <label for="jumlah_peserta">Jumlah Peserta:</label>
                <input type="number" class="form-control" id="jumlah_peserta" name="jumlah_peserta" oninput="calculateTotal()" required>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="layanan_penginapan" name="layanan_penginapan" onclick="calculateTotal()">
                <label class="form-check-label" for="layanan_penginapan">Layanan Penginapan (Rp. 1.000.000/hari)</label>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="layanan_transportasi" name="layanan_transportasi" onclick="calculateTotal()">
                <label class="form-check-label" for="layanan_transportasi">Layanan Transportasi (Rp. 1.200.000/hari)</label>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="layanan_makanan" name="layanan_makanan" onclick="calculateTotal()">
                <label class="form-check-label" for="layanan_makanan">Layanan Makanan (Rp. 500.000/hari)</label>
            </div>
            <div class="form-group">
                <label for="total_harga_paket">Total Harga Paket:</label>
                <input type="number" class="form-control" id="total_harga_paket" name="total_harga_paket" readonly>
            </div>
            <div class="form-group">
                <label for="jumlah_tagihan">Jumlah Tagihan:</label>
                <input type="number" class="form-control" id="jumlah_tagihan" name="jumlah_tagihan" readonly>
            </div>
            <button type="submit" class="btn btn-primary" onclick="confirmSubmit(event)">Submit</button>
            <button type="button" class="btn btn-secondary" onclick="resetForm()">Reset</button>
        </form>
    </div>
    <script>
        function confirmSubmit() {
            return confirm("Apakah Anda yakin ingin mengirim data ini?");
        }

        function resetForm() {
            if (confirm("Apakah Anda yakin ingin mengatur ulang form ini?")) {
                document.querySelector('form').reset();
            }
        }
    </script>

    <?php
    // Start output buffering
    ob_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Database connection
        include 'koneksi.php';

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve data from form
        $nama_pemesan = $_POST['nama_pemesan'];
        $nomor_hp = $_POST['nomor_hp'];
        $tanggal_mulai_wisata = $_POST['tanggal_mulai_wisata'];
        $tanggal_pesanan = $_POST['tanggal_pesanan'];
        $durasi_wisata = $_POST['durasi_wisata'];
        $jumlah_peserta = $_POST['jumlah_peserta'];

        // Calculate prices
        $layanan_penginapan = isset($_POST['layanan_penginapan']) ? 1000000 : 0;
        $layanan_transportasi = isset($_POST['layanan_transportasi']) ? 1200000 : 0;
        $layanan_makanan = isset($_POST['layanan_makanan']) ? 500000 : 0;

        // Total package price
        $harga_paket = $layanan_penginapan + $layanan_transportasi + $layanan_makanan;
        $total_harga_paket = $harga_paket * $durasi_wisata;
        $jumlah_tagihan = $total_harga_paket * $jumlah_peserta;

        // Escape data to prevent SQL injection
        $nama_pemesan = $conn->real_escape_string($nama_pemesan);
        $nomor_hp = $conn->real_escape_string($nomor_hp);
        $tanggal_mulai_wisata = $conn->real_escape_string($tanggal_mulai_wisata);
        $tanggal_pesanan = $conn->real_escape_string($tanggal_pesanan);

        // Prepare and execute SQL statement
        $sql = "INSERT INTO pesanan (
                nama_pemesan, nomor_hp, tanggal_mulai_wisata, tanggal_pesanan, durasi_wisata, 
                layanan_penginapan, layanan_transportasi, layanan_makanan, jumlah_peserta, 
                harga_paket, jumlah_tagihan
            ) VALUES (
                '$nama_pemesan', '$nomor_hp', '$tanggal_mulai_wisata', '$tanggal_pesanan', $durasi_wisata, 
                $layanan_penginapan, $layanan_transportasi, $layanan_makanan, $jumlah_peserta, 
                $harga_paket, $jumlah_tagihan
            )";

        if ($conn->query($sql) === TRUE) {
            // Output JavaScript to show alert and redirect
            echo "<script>
                alert('Data berhasil disimpan');
                window.location.href = 'hasil_pesan.php';
              </script>";
        } else {
            echo "Error: " . $conn->error;
        }

        // Close connection
        $conn->close();
    }

    // End output buffering and flush
    ob_end_flush();
    ?>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>