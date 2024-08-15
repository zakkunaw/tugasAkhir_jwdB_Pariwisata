<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == 'admin' && $password == 'admin') {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        echo '<script>alert("Login berhasil!"); window.location.href = "admin/index.php?page=beranda";</script>';
        exit();
    } else {
        echo '<script>alert("Username atau password salah."); window.location.href = "login.php";</script>';
    }
}
