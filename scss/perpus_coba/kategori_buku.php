<!-- // nama: chaerul mas’ud zaky / nim 2350081033
// klsB -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <title>Data Kategori buku</title>
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
     <h1>Data Kategori buku</h1><br><br>
     <a type="button" class="btn btn-danger btn-lg" href='kategori_buku/tambah.php' name="submit">Tambah</a> <br>

     <?php
    // Koneksi ke database
    include 'koneksi.php';
    // Query JOIN untuk menampilkan data buku beserta nama 
    $sql = "SELECT * FROM tb_kategorii_buku";


// Menjalankan query
    $result = mysqli_query($koneksi, $sql);
// Cek apakah ada data yang ditemukan
    if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
    <tr>
        <th>kategori ID</th>
        <th>Nama kategori</th>
        <th>aksi</th>
       
    </tr>";
 while ($row = mysqli_fetch_assoc($result)) {
 echo "<tr>
    <td>" . $row['kategori_id'] . "</td>
    <td>" . $row['nama_kategori'] . "</td>
     <td> 
               
          <a href='kategori_buku/update.php?id=". $row['kategori_id'] ."' onclick='return confirm(\"apakah yakin ingin ubah ?\")'>update</a> | 
        <a href='kategori_buku/delete.php?id=" . $row['kategori_id'] . "' onclick='return confirm(\"apakah yakin ingin hapus ?\")'>delete</a> | 
    
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
<a href="buku.php">Data Buku</a>    |   <a href="denda.php">Data denda</a>   | <a href="petugas.php">Data petugas</a>   |
<a href="anggota.php">Data anggota</a>    |   <a href="kategori_buku.php">Data kategori_bk</a>   | <a href="peminjaman_denda.php">Data peminjaman denda</a>
<a href="denda_angregasi.php">Data denda agregasi</a>    |  <a href="peminjaman.php">Peminjaman</a> |
</div>
</body>
</html>
