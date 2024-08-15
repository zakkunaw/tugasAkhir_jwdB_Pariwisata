<div class="container-fluid mt-4">
    <h2 class="text-dark">Daftar Pesan</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
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
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Database connection
                include '../koneksi.php';

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
                                <td class='action-buttons d-flex justify-content-between'>
                                    <a href='index.php?page=editpesan&id={$row['id_pesanan']}' class='btn btn-warning btn-sm'>Edit</a>
                                    <button class='btn btn-danger btn-sm' onclick='confirmDelete({$row['id_pesanan']})'>Hapus</button>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>No records found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    function confirmDelete(id) {
        if (confirm('Yakin ingin menghapus pesanan ini?')) {
            window.location.href = 'hapus.php?id=' + id;
        }
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>