<?php
// Database connection
include '../koneksi.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get ID from query string
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Prepare and execute delete query
    $sql = "DELETE FROM pesanan WHERE id_pesanan = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Pesanan berhasil dihapus'); window.location.href='index.php?page=beranda';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "'); window.location.href='index.php?page=beranda';</script>";
    }

    $stmt->close();
}

$conn->close();
