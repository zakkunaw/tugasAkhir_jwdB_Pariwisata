# 🏖️ **Sistem Pariwisata CRUD**

[![PHP Version](https://img.shields.io/badge/php-^7.4-blue)](https://www.php.net/) [![MySQL](https://img.shields.io/badge/mysql-^5.7-blue)](https://www.mysql.com/) [![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

Sistem **Pariwisata CRUD** ini memungkinkan pelanggan untuk melakukan pemesanan destinasi wisata dan admin untuk mengelola data pemesanan dengan mudah. Proyek ini dibangun menggunakan PHP dan MySQL serta di-hosting secara lokal dengan XAMPP.

## 📋 **Fitur**
- **Pelanggan:**
  - ✨ Menambahkan pesanan destinasi wisata.
  - 👀 Melihat daftar pesanan.
  - 💬 Menghubungi admin jika perlu mengedit pesanan.

- **Admin:**
  - 🔐 Login untuk akses dashboard admin.
  - 📝 Mengelola data (tambah, edit, hapus) pesanan.

## 📚 **Table of Contents**
1. [Instalasi dan Penggunaan](#instalasi-dan-penggunaan)
2. [Teknologi yang Digunakan](#teknologi-yang-digunakan)
3. [Struktur Direktori](#struktur-direktori)
4. [Pengembangan](#pengembangan)
5. [Kontribusi](#kontribusi)

## 🚀 **Instalasi dan Penggunaan**

1. **Download dan Buka Repositori**

    ```bash
    git clone https://github.com/zakkunaw/tugasAkhir_jwdB_Pariwisata.git
    ```
    **Catatan:** Pastikan sudah mengunduh XAMPP.

2. **Setup XAMPP**

    - Pindahkan repositori yang sudah didownload ke dalam folder `htdocs` XAMPP.
      - Contoh: `C:/xampp/htdocs/pariwisata`
    - Jalankan XAMPP dan aktifkan modul Apache dan MySQL.

3. **Arahkan ke Web Lokal**

    Buka browser dan akses: `http://localhost/pariwisata`

4. **Penggunaan Aplikasi**

    **Halaman Utama:**
    - Pelanggan dapat menambahkan pesanan dengan mengklik destinasi wisata.
    - Pesanan bisa dilihat di halaman "Daftar Pesanan", namun tidak dapat diedit oleh pelanggan. Untuk mengubah pesanan, pelanggan dapat mengirim pesan kepada admin.

    **Dashboard Admin:**
    - Admin dapat login melalui link di halaman utama.
    - Setelah login, admin bisa mengelola data pemesanan, termasuk menambah, mengedit, dan menghapus pesanan.

## 💻 **Teknologi yang Digunakan**

- PHP
- MySQL
- XAMPP
- Bootstrap (untuk styling)
