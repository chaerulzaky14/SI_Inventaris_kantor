# SI Inventaris Kantor

Sistem Informasi Inventaris Kantor adalah aplikasi berbasis web yang dirancang untuk membantu pengelolaan barang atau aset kantor secara efektif dan terstruktur. Aplikasi ini bertujuan memudahkan proses pencatatan, pemantauan, peminjaman, dan pelaporan aset kantor agar data tetap akurat, rapi, dan mudah diakses.

![License](https://img.shields.io/badge/license-MIT-blue.svg)
![PHP](https://img.shields.io/badge/PHP-7.4%2B-777BB4?logo=php&logoColor=white)
![CSS](https://img.shields.io/badge/CSS-Frontend-1572B6?logo=css3&logoColor=white)
![Status](https://img.shields.io/badge/status-Active-success)

## Daftar Isi

- [Tentang Proyek](#tentang-proyek)
- [Fitur Utama](#fitur-utama)
- [Teknologi yang Digunakan](#teknologi-yang-digunakan)
- [Prasyarat Instalasi](#prasyarat-instalasi)
- [Instalasi](#instalasi)
- [Struktur Project](#struktur-project)
- [Penggunaan](#penggunaan)
- [Kontribusi](#kontribusi)
- [Lisensi](#lisensi)
- [Kontak](#kontak)

## Tentang Proyek

Project ini bertujuan untuk menyediakan solusi digital untuk pengelolaan aset kantor, mulai dari pencatatan data barang, pengelolaan stok, peminjaman, hingga pembuatan laporan inventaris. Dengan sistem ini, admin maupun pengguna yang memiliki akses dapat memantau kondisi aset secara real-time dan meminimalkan risiko kehilangan, kerusakan, maupun pengelolaan yang tidak terkontrol.

Aplikasi ini cocok digunakan oleh lembaga, instansi, perusahaan, atau instansi pemerintahan yang membutuhkan sistem manajemen inventaris kantor yang sederhana namun professional.

## Fitur Utama

- Manajemen data barang dan aset kantor
- Pencatatan kategori, lokasi, jumlah, dan kondisi barang
- Tracking status aset seperti tersedia, dipinjam, rusak, atau hilang
- Proses peminjaman dan pengembalian barang
- Monitoring stok dan penggunaan aset secara berkala
- Sistem laporan inventaris dan ringkasan data
- Manajemen pengguna dan hak akses yang aman
- Tampilan antarmuka yang responsif dan mudah digunakan
- Integrasi data yang mendukung pengelolaan inventaris secara terorganisir

## Teknologi yang Digunakan

Berikut teknologi utama yang digunakan dalam project ini:

- PHP untuk pengolahan logika aplikasi dan backend
- CSS untuk tampilan antarmuka pengguna
- SCSS untuk pengelolaan styling yang lebih terstruktur dan scalable
- JavaScript untuk interaksi frontend dan fungsi dinamis
- Hack (jika digunakan pada bagian tertentu) sebagai support language pada ekosistem yang relevan
- Database MySQL/MariaDB (direkomendasikan untuk kebutuhan inventaris yang dinamis)
- HTML untuk struktur halaman web

Project ini sebagian besar berbasis frontend dan backend web yang mengutamakan tampilan modern serta fleksibilitas penggunaan di lingkungan internal kantor.

## Prasyarat Instalasi

Sebelum menginstal project, pastikan sistem Anda memenuhi kebutuhan berikut:

- PHP 7.4 atau versi terbaru
- Web server seperti Apache atau Nginx
- Database MySQL/MariaDB
- Composer (jika project memerlukan dependency PHP)
- Browser modern seperti Chrome, Firefox, Edge, atau Safari
- Akses ke terminal/command line
- Git untuk clone repository

Untuk lingkungan lokal, disarankan juga menggunakan:

- XAMPP / WAMP / MAMP / Laragon
- Extension PHP yang relevan seperti PDO, mbstring, openssl, dan zip

## Instalasi

### 1. Clone repository

```bash
git clone https://github.com/chaerulzaky14/SI_Inventaris_kantor.git
cd SI_Inventaris_kantor
```

### 2. Siapkan database

Buat database baru pada MySQL/MariaDB, misalnya:

```sql
CREATE DATABASE inventaris_kantor;
```

### 3. Konfigurasi koneksi database

Sesuaikan file konfigurasi database yang terdapat pada project dengan username, password, dan nama database Anda.

Contoh:

```php
<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'inventaris_kantor';
?>
```

### 4. Jalankan aplikasi

Jika project diakses melalui server lokal, Anda dapat menjalankannya dengan web server yang sudah tersedia.

Contoh akses lokal:

```bash
http://localhost/SI_Inventaris_kantor/
```

Jika menggunakan PHP built-in server:

```bash
php -S localhost:8000
```

Lalu buka:

```bash
http://localhost:8000
```

## Struktur Project

Berikut gambaran umum struktur folder project:

```text
SI_Inventaris_kantor/
├── assets/
│   ├── css/
│   ├── js/
│   ├── scss/
│   └── images/
├── config/
│   └── database.php
├── database/
│   ├── schema.sql
│   └── seeders/
├── includes/
│   ├── header.php
│   ├── footer.php
│   └── connection.php
├── public/
│   ├── index.php
│   └── uploads/
├── src/
│   ├── controllers/
│   ├── models/
│   └── views/
├── tests/
├── .gitignore
├── LICENSE
├── README.md
├── composer.json
├── package.json
└── index.php
```

Catatan: struktur dapat berbeda tergantung pengembangan final dari project. Gunakan folder utama yang tersedia pada source code aktif sebagai referensi utama.

## Penggunaan

### Login ke aplikasi

1. Buka aplikasi melalui browser.
2. Masukkan username dan password yang valid.
3. Setelah login, pengguna akan diarahkan ke dashboard utama.

### Menambah data barang

1. Masuk ke menu inventaris.
2. Klik tombol tambah barang.
3. Isi data seperti nama barang, kategori, jumlah, lokasi, dan kondisi.
4. Simpan data.

### Peminjaman aset

1. Pilih menu peminjaman.
2. Masukkan data peminjam dan barang yang dipinjam.
3. Tentukan tanggal peminjaman dan tanggal pengembalian.
4. Simpan data peminjaman.

### Laporan inventaris

1. Pilih menu laporan.
2. Sesuaikan filter periode atau kategori yang diperlukan.
3. Export laporan sesuai kebutuhan.

## Fitur Tambahan (Opsional)

- Dashboard statistik inventaris
- Filter data berdasarkan kategori dan lokasi
- Audit log aktivitas pengguna
- Notifikasi pengingat barang yang akan jatuh tempo
- Export data ke Excel/PDF

## Kontribusi

Kontribusi sangat terbuka untuk pengembangan project ini. Jika Anda ingin berkontribusi, silakan ikuti langkah berikut:

1. Fork repository ini
2. Buat branch baru untuk fitur atau perbaikan yang ingin Anda lakukan
3. Lakukan perubahan dengan commit yang jelas dan rapi
4. Push branch ke fork Anda
5. Buka Pull Request ke repository utama

Contoh commit yang baik:

```bash
git checkout -b feature/tambah-laporan-inventaris
git add .
git commit -m "feat: menambahkan fitur laporan inventaris"
git push origin feature/tambah-laporan-inventaris
```

### Prinsip kontribusi

- Gunakan nama branch yang deskriptif
- Berikan deskripsi perubahan yang jelas pada Pull Request
- Hindari perubahan yang tidak relevan terhadap topik patch
- Jaga kode tetap rapi, terstruktur, dan dapat dibaca
- Uji perubahan sebelum dikirimkan

## Lisensi

Project ini dilisensikan di bawah lisensi MIT.

MIT License

Copyright (c) 2025 chaerulzaky14

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

## Kontak

- GitHub: [chaerulzaky14](https://github.com/chaerulzaky14)
- Repository: [SI Inventaris Kantor](https://github.com/chaerulzaky14/SI_Inventaris_kantor)

## Catatan

Project ini masih dikembangkan secara berkelanjutan dan dapat disesuaikan sesuai kebutuhan internal organisasi. Jika Anda membutuhkan modifikasi khusus, fitur tambahan, atau integrasi dengan sistem lain, Anda dapat membuka issue atau menghubungi maintainer.

---

Dibuat dengan tujuan untuk mendukung pengelolaan aset kantor secara lebih terstruktur, aman, dan efisien.
