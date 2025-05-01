<!-- // nama: chaerul mas’ud zaky / nim 2350081033
// klsB -->


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <title>Data Anggota dengan Filter</title>
</head>
<body>
 <h2>Data Anggota</h2>
 
 <!-- Form untuk filter jenis kelamin -->
 <form action="filter_anggota.php" method="get">
 Filter Jenis Kelamin:

 <select name="filter">
    <option value="">Semua</option>
    <option value="L" <?php if (isset($_GET['filter']) && $_GET['filter'] == 'L') echo 'selected'; ?>>Laki-laki</option>
    <option value="P" <?php if (isset($_GET['filter'])  && $_GET['filter'] == 'P') echo 'selected'; ?>>Perempuan</option>
 </select>
    <input type="submit" value="Terapkan Filter">
    </form>
    <br>
   <?php

   // Koneksi ke database
   include 'koneksi.php';
   // Mengambil nilai filter dari form
   $filter = isset($_GET['filter']) ? $_GET['filter'] : '';
   // Query dasar untuk menampilkan semua data tb_anggota
   $sql = "SELECT * FROM tb_anggota";
   // Menambahkan filter jenis kelamin jika ada
   if ($filter != '') {
    $sql .= " WHERE jenis_kelamin = '$filter'";
   }
   // Menjalankan query
   $result = mysqli_query($koneksi, $sql);

   // Cek apakah ada data yang ditemukan
if (mysqli_num_rows($result) > 0) {
 echo "<table border='1'>
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
                <a href=''>Tambah</a> |
                <a href=''>delete</a> | 
                <a href=''>delete</a> | 
             </td>
    </tr>";
    }
    echo "</table>";
   } else {
    echo "Tidak ada data yang ditemukan.";
   }
   // Menutup koneksi
   mysqli_close($koneksi);
   ?>
   </body>
   </html>
   
