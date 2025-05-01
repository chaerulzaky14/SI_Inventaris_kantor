<!-- // nama: chaerul mas’ud zaky / nim 2350081033
// klsB -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <title>Data peminjaman JOIN denda</title>
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
     <h1>Data peminjaman JOIN denda</h1>


     <?php
    // Koneksi ke database
    include 'koneksi.php';
    // Query JOIN untuk menampilkan data buku beserta nama 
   $sql = "SELECT  peminjaman.peminjaman_id, peminjaman.anggota_id, peminjaman.buku_id, peminjaman.petugas_id,
    peminjaman.tgl_peminjaman, peminjaman.tgl_pengembalian, tb_denda.jumlah_denda
    FROM perpus_coba.peminjaman JOIN perpus_coba.tb_denda
    ON peminjaman.peminjaman_id = tb_denda.peminjaman_id";



// Menjalankan query
    $result = mysqli_query($koneksi, $sql);
// Cek apakah ada data yang ditemukan
    if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
    <tr>
        <th>Peminjaman ID</th>
        <th>Anggota ID</th>
        <th>Buku ID</th>
        <th>Petugas ID</th>
        <th>Tanggal peminjaman</th>
        <th>Tanggal kembali</th>
        <th>Jumalah denda</th>
        <th>aksi</th>
       
    </tr>";
 while ($row = mysqli_fetch_assoc($result)) {
 echo "<tr>
    <td>" . $row['peminjaman_id'] . "</td>
    <td>" . $row['anggota_id'] . "</td>
    <td>" . $row['buku_id'] . "</td>
    <td>" . $row['petugas_id'] . "</td>
    <td>" . $row['tgl_peminjaman'] . "</td>   
    <td>" . $row['tgl_pengembalian'] . "</td>   
    <td>" . $row['jumlah_denda'] . "</td>   
      <td> 
                <a href=''>Tambah</a> |
                <a href=''>delete</a> | 
                <a href=''>delete</a> | 
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
