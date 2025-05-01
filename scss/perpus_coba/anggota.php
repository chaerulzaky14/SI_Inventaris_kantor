<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 3;
            padding: 5px;
        }

        table {
            margin-top: 120px;
            margin: auto;
            border-collapse: collapse;
            width: 80%;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .menu {
            text-align: center;
            margin-top: 20px;
        }

        .menu a {
            text-decoration: none;
            margin: 0 10px;
            color: #007bff;
            font-weight: bold;
        }

        .menu a:hover {
            text-decoration: underline;
        }

        h1 {
            margin-bottom : 50px;
            text-align: center;
            text-decoration : underline;
        }
 

    </style>
</head>
<body>
<H1>DATA ANGGOTA</H1>

<div class="container">

<a type="button" class="btn btn-danger btn-lg" href='anggota/tambah.php' name="tombol">Tambah</a> <br><br>




<?php
// Koneksi ke database
include 'koneksi.php';


// mengambil

// Query dasar untuk menampilkan semua data anggota
$sql = "SELECT * FROM tb_anggota";

// Menjalankan query
$result = mysqli_query($koneksi, $sql);

// Cek apakah ada data yang ditemukan
if (mysqli_num_rows($result) > 0) {
    echo "
    
    <table>
    <tr>
        <th>ID Anggota</th>
        <th>Nama Anggota</th>
        <th>Alamat</th>
        <th>Jenis Kelamin</th>
        <th>No HP</th>
        <th>aksi</th>
    </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td>" . $row['anggota_id'] . "</td>
            <td>" . $row['nama_anggota'] . "</td>
            <td>" . $row['alamat'] . "</td>
            <td>" . $row['jenis_kelamin'] . "</td>
            <td>" . $row['no_hp'] . "</td>
            <td> 
                <a href='anggota/upadate.php?id=". $row['anggota_id'] ."' onclick='return confirm(\"apakah yakin ingin ubah ?\")'>update</a> | 
                <a href='anggota/delete.php?id=" . $row['anggota_id'] . "' onclick='return confirm(\"apakah yakin ingin hapus ?\")'>delete</a> | 
             </td>
        </tr>";
    }

    echo "</table>";
} else {
    echo "<p style='text-align: center; margin-top: 50px;'>Tidak ada data yang ditemukan.</p>";
}



// Menutup koneksi
mysqli_close($koneksi);
?>
</div>
<div class="menu">
    <a href="buku.php">Data Buku</a> | 
    <a href="denda.php">Data Denda</a> | 
    <a href="petugas.php">Data Petugas</a> | 
    <a href="anggota.php">Data Anggota</a> | 
    <a href="kategori_buku.php">Data Kategori Buku</a> | 
    <a href="peminjaman_denda.php">Data Peminjaman Denda</a> | 
    <a href="denda_angregasi.php">Data Denda Agregasi</a> | 
    <a href="peminjaman.php">Peminjaman</a> |
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
