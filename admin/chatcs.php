<?php
// Ambil data pesan dari session
error_reporting(E_ALL); // Menampilkan semua jenis error
ini_set('display_errors', 0); // Tidak menampilkan error di layar

// Mengatur lokasi log error
ini_set('log_errors', 1); // Mengaktifkan logging error
ini_set('error_log', 'path/to/your/error.log'); // Menentukan lokasi file log error

$pesan = $_SESSION['pesan'];

// Tampilkan data pesan dalam bentuk tabel
echo '<div class="container mt-4">
    <h2 class="text-dark">Daftar Pesan</h2>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID Pesanan</th>
                <th>Nama Pengirim</th>
                <th>Pesan</th>
            </tr>
        </thead>
        <tbody>';

foreach ($pesan as $p) {
    echo "<tr>
        <td>{$p['id_pesanan']}</td>
        <td>{$p['nama_pemesan']}</td>
        <td>{$p['pesan']}</td>
    </tr>";
}

echo '</tbody>
    </table>
</div>';

// Hapus data pesan dari session setelah ditampilkan
unset($_SESSION['pesan']);
