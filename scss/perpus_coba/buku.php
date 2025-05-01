<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <title>Data Buku </title>
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
            text-align: center;
            text-decoration : underline;
        }
    </style>
</head>
<body>


<div class="container"></div>
     <h1>Data Buku</h1><br><br>

     <a type="button" class="btn btn-danger btn-lg" href='buku/tambah.php' name="submit">Tambah</a> <br>


     <?php
    // Koneksi ke database
    include './koneksi.php';
    // Query JOIN untuk menampilkan data buku beserta nama 
    $sql = "SELECT tb_buku.buku_id, tb_buku.judul_buku, tb_buku.pengarang, 
    tb_buku.tahun_terbit, tb_kategorii_buku.nama_kategori
    FROM tb_buku
    INNER JOIN tb_kategorii_buku ON tb_buku.kategori_id = tb_kategorii_buku.kategori_id";


// Menjalankan query
    $result = mysqli_query($koneksi, $sql);
// Cek apakah ada data yang ditemukan
    if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
    <tr>
        <th>ID Buku</th>
        <th>Judul Buku</th>
        <th>Pengarang</th>
        <th>Tahun Terbit</th>
        <th>Kategori</th>
        <th>action</th>
    </tr>";
 while ($row = mysqli_fetch_assoc($result)) {
 echo "<tr>
    <td>" . $row['buku_id'] . "</td>
    <td>" . $row['judul_buku'] . "</td>
    <td>" . $row['pengarang'] . "</td>
    <td>" . $row['tahun_terbit'] . "</td>
    <td>" . $row['nama_kategori'] . "</td>
       <td> 
                <a href='buku/update.php?id=". $row['buku_id'] ."' onclick='return confirm(\"apakah yakin ingin ubah ?\")'>update</a> | 
                <a href='buku/delete.php?id=" . $row['buku_id'] . "' onclick='return confirm(\"apakah yakin ingin hapus ?\")'>delete</a> | 

             </td>
 </tr>";
 }
    echo "</table>";
} else {
    echo "Tidak ada data buku yang ditemukan.";
}
// Menutup koneksi
    mysqli_close($koneksi);
?>

</style>
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
