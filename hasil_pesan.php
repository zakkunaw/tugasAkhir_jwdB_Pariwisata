<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function confirmDelete(id) {
            if (confirm('Yakin ingin menghapus pesanan ini?')) {
                window.location.href = 'hapus.php?id=' + id;
            }
        }
    </script>
    <style>
        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }
    </style>
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
        <h2>Daftar Pesanan - customer</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Phone</th>
                    <th>Jumlah Peserta</th>
                    <th>Jumlah Hari</th>
                    <th>Akomodasi</th>
                    <th>Transportasi</th>
                    <th>Makanan/Paket</th>
                    <th>Harga Paket</th>
                    <th>Jumlah Tagihan</th>
                    <th>CS</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Database connection
                include 'koneksi.php';

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch data from database
                $sql = "SELECT * FROM pesanan";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['nama_pemesan']}</td>
                                <td>{$row['nomor_hp']}</td>
                                <td>{$row['jumlah_peserta']}</td>
                                <td>{$row['durasi_wisata']}</td>
                                <td>" . ($row['layanan_penginapan'] ? 'Y' : 'N') . "</td>
                                <td>" . ($row['layanan_transportasi'] ? 'Y' : 'N') . "</td>
                                <td>" . ($row['layanan_makanan'] ? 'Y' : 'N') . "</td>
                                <td>Rp. " . number_format($row['harga_paket'], 0, ',', '.') . "</td>
                                <td>Rp. " . number_format($row['jumlah_tagihan'], 0, ',', '.') . "</td>
                                <td class='action-buttons'>
                                    <a href='#' class='btn btn-warning btn-sm' data-toggle='modal' data-target='#chatModal_{$row['id_pesanan']}'>Chat</a>
                                </td>
                              </tr>";
                    }
                }

                foreach ($result as $row) {
                    echo "
                    <div class='modal fade' id='chatModal_{$row['id_pesanan']}' tabindex='-1' role='dialog' aria-labelledby='chatModalLabel_{$row['id_pesanan']}' aria-hidden='true'>
                        <div class='modal-dialog' role='document'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title' id='chatModalLabel_{$row['id_pesanan']}'>Chat dengan Admin - {$row['nama_pemesan']}</h5>
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>
                                <div class='modal-body'>
                                    <form method='post' action='kirim_pesan.php'>
                                        <input type='hidden' name='id_pesanan' value='{$row['id_pesanan']}'>
                                        <input type='hidden' name='nama_pemesan' value='{$row['nama_pemesan']}'>
                                        <div class='form-group'>
                                            <textarea class='form-control' name='pesan' placeholder='Tulis keluhan anda misal (cancel liburan)' required></textarea>
                                        </div>
                                        <button type='submit' class='btn btn-primary'>Kirim</button>
                                    </form>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <script>
        // ... (kode JavaScript sebelumnya)

        $.ajax({
            url: 'chatcs.php',
            method: 'POST',
            data: {
                id_pesanan: idPesanan,
                pesan: pesan,
                nama_pemesan: namaPemesan // Tambahkan nama_pemesan ke data yang dikirim
            },
            success: function(response) {
                // Tampilkan pesan sukses atau gagal
                alert(response);
                // Redirect ke halaman chatcs.php
                window.location.href = 'chatcs.php';
            },
            error: function(xhr, status, error) {
                // Tangani error jika ada
                alert('Terjadi kesalahan: ' + error);
            }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>