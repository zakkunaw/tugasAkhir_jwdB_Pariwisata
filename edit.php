<?php
// Database connection
include 'koneksi.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get ID from query string
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Fetch existing data
    $sql = "SELECT * FROM pesanan WHERE id_pesanan = $id";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve updated data from form
        $nama_pemesan = $conn->real_escape_string($_POST['nama_pemesan']);
        $nomor_hp = $conn->real_escape_string($_POST['nomor_hp']);
        $tanggal_mulai_wisata = $conn->real_escape_string($_POST['tanggal_mulai_wisata']);
        $tanggal_pesanan = $conn->real_escape_string($_POST['tanggal_pesanan']);
        $durasi_wisata = intval($_POST['durasi_wisata']);
        $jumlah_peserta = intval($_POST['jumlah_peserta']);
        $layanan_penginapan = isset($_POST['layanan_penginapan']) ? 1 : 0;
        $layanan_transportasi = isset($_POST['layanan_transportasi']) ? 1 : 0;
        $layanan_makanan = isset($_POST['layanan_makanan']) ? 1 : 0;
        $harga_paket = intval($_POST['total_harga_paket']);
        $jumlah_tagihan = intval($_POST['jumlah_tagihan']);

        // Prepare and execute update query
        $sql = "UPDATE pesanan SET 
                    nama_pemesan='$nama_pemesan', 
                    nomor_hp='$nomor_hp', 
                    tanggal_mulai_wisata='$tanggal_mulai_wisata', 
                    tanggal_pesanan='$tanggal_pesanan', 
                    durasi_wisata=$durasi_wisata, 
                    layanan_penginapan=$layanan_penginapan, 
                    layanan_transportasi=$layanan_transportasi, 
                    layanan_makanan=$layanan_makanan, 
                    jumlah_peserta=$jumlah_peserta, 
                    harga_paket=$harga_paket, 
                    jumlah_tagihan=$jumlah_tagihan 
                WHERE id_pesanan=$id";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Pesanan berhasil diperbarui'); window.location.href='daftarpesanan.php';</script>";
        } else {
            echo "<script>alert('Error: " . $conn->error . "'); window.location.href='daftarpesanan.php';</script>";
        }
    }
} else {
    echo "<script>alert('ID pesanan tidak ditemukan'); window.location.href='daftarpesanan.php';</script>";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pesanan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function calculateTotal() {
            const durasiWisata = parseInt(document.getElementById('durasi_wisata').value) || 0;
            const jumlahPeserta = parseInt(document.getElementById('jumlah_peserta').value) || 0;

            const layananPenginapan = document.getElementById('layanan_penginapan').checked ? 1000000 : 0;
            const layananTransportasi = document.getElementById('layanan_transportasi').checked ? 1200000 : 0;
            const layananMakanan = document.getElementById('layanan_makanan').checked ? 2200000 : 0;

            const hargaPaket = layananPenginapan + layananTransportasi + layananMakanan;
            const jumlahTagihan = hargaPaket * jumlahPeserta;

            document.getElementById('total_harga_paket').value = hargaPaket;
            document.getElementById('jumlah_tagihan').value = jumlahTagihan;
        }
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Wisata</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="form.php">Form Pemesanan</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="daftarpesanan.php">Daftar Pesanan</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Edit Pesanan</h2>
        <form action="edit.php?id=<?php echo $id; ?>" method="post" oninput="calculateTotal()">
            <div class="form-group">
                <label for="nama_pemesan">Nama Pemesan</label>
                <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" value="<?php echo htmlspecialchars($data['nama_pemesan']); ?>" required>
            </div>
            <div class="form-group">
                <label for="nomor_hp">Nomor HP</label>
                <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" value="<?php echo htmlspecialchars($data['nomor_hp']); ?>" required>
            </div>
            <div class="form-group">
                <label for="tanggal_mulai_wisata">Tanggal Mulai Wisata</label>
                <input type="date" class="form-control" id="tanggal_mulai_wisata" name="tanggal_mulai_wisata" value="<?php echo htmlspecialchars($data['tanggal_mulai_wisata']); ?>" required>
            </div>
            <div class="form-group">
                <label for="tanggal_pesanan">Tanggal Pemesanan</label>
                <input type="datetime-local" class="form-control" id="tanggal_pesanan" name="tanggal_pesanan" value="<?php echo htmlspecialchars($data['tanggal_pesanan']); ?>" required>
            </div>
            <div class="form-group">
                <label for="durasi_wisata">Durasi Wisata (hari)</label>
                <input type="number" class="form-control" id="durasi_wisata" name="durasi_wisata" value="<?php echo htmlspecialchars($data['durasi_wisata']); ?>" required>
            </div>
            <div class="form-group">
                <label for="jumlah_peserta">Jumlah Peserta</label>
                <input type="number" class="form-control" id="jumlah_peserta" name="jumlah_peserta" value="<?php echo htmlspecialchars($data['jumlah_peserta']); ?>" required>
            </div>
            <div class="form-group">
                <label>Akomodasi</label>
                <input type="checkbox" id="layanan_penginapan" name="layanan_penginapan" <?php echo $data['layanan_penginapan'] ? 'checked' : ''; ?>>
            </div>
            <div class="form-group">
                <label>Transportasi</label>
                <input type="checkbox" id="layanan_transportasi" name="layanan_transportasi" <?php echo $data['layanan_transportasi'] ? 'checked' : ''; ?>>
            </div>
            <div class="form-group">
                <label>Makanan/Paket</label>
                <input type="checkbox" id="layanan_makanan" name="layanan_makanan" <?php echo $data['layanan_makanan'] ? 'checked' : ''; ?>>
            </div>
            <div class="form-group">
                <label for="total_harga_paket">Harga Paket</label>
                <input type="text" class="form-control" id="total_harga_paket" name="total_harga_paket" value="<?php echo htmlspecialchars($data['harga_paket']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="jumlah_tagihan">Jumlah Tagihan</label>
                <input type="text" class="form-control" id="jumlah_tagihan" name="jumlah_tagihan" value="<?php echo htmlspecialchars($data['jumlah_tagihan']); ?>" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="daftarpesanan.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>