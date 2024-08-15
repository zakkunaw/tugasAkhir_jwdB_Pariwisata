<?php
session_start();

// Ambil data dari formulir
$id_pesanan = $_POST['id_pesanan'];
$pesan = $_POST['pesan'];
$nama_pemesan = $_POST['nama_pemesan']; // Tambahkan nama_pemesan

// Simpan data pesan ke dalam session
if (!isset($_SESSION['pesan'])) {
    $_SESSION['pesan'] = array();
}
$_SESSION['pesan'][] = array(
    'id_pesanan' => $id_pesanan,
    'pesan' => $pesan,
    'nama_pemesan' => $nama_pemesan // Simpan nama_pemesan dalam session
);

// Tampilkan pesan berhasil dikirim dan redirect
echo "<script>
        alert('Pesan berhasil dikirim');
        window.location.href='index.php';
      </script>";
