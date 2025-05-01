<!-- // nama: chaerul mas’ud zaky / nim 2350081033
// klsB -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <title>Data denda</title>
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
     <h1>Data denda</h1>


     <?php
    // Koneksi ke database
    include 'koneksi.php';
    // Query agregasi denda untuk menampilkan data denda  
    $sql = "SELECT 
    COUNT(denda_id) AS total_denda,
    SUM(jumlah_denda) AS total_jumlah_denda,
    AVG(jumlah_denda) AS rata_rata_denda,
    MAX(jumlah_denda) AS denda_tertinggi,
    MIN(jumlah_denda) AS denda_terendah
    FROM 
    tb_denda";



// Menjalankan query
    $result = mysqli_query($koneksi, $sql);
// Cek apakah ada data yang ditemukan
    if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
    <tr>
                <th>Total Denda</th>
                <th>Total Jumlah Denda</th>
                <th>Rata-rata Denda</th>
                <th>Denda Tertinggi</th>
                <th>Denda Terendah</th>
    </tr>";
 while ($row = mysqli_fetch_assoc($result)) {
 echo "<tr>
    <td>" . $row['total_denda'] . "</td>
    <td>" . $row['total_jumlah_denda'] . "</td>
    <td>" . $row['rata_rata_denda'] . "</td> 
    <td>" . $row['denda_tertinggi'] . "</td> 
    <td>" . $row['denda_terendah'] . "</td> 
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
<a href="denda_angregasi.php">Data denda agregasi</a>    |  
</div>
</body>
</html>
