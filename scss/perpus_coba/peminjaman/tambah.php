


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    
    <style>
    .container {
        background-color : silver;
        width: 550px;
        margin-top : 40px;
        padding: 30px;
    }
    h3 {
        text-align : center;
        text-decoration : underline;
        margin-bottom : 50px;
    }

    button {
        text-align : auto;
    }
    </style>
</head>
<body>


    <div class="container">
    <form method="post" action="">
   <center> <h1>Tambah peminjaman</h1><br><br></center>


     <div class="mb-3" >
            <label for="exampleInputEmail1" class="form-label">ANGGOTA ID</label>
            <select id="" class="form-select" name="jenis_kelamin">
            <option value="">SELECT OPTION</option>
                 <?php foreach ($data['tb_anggota'] as $anggota): ?>
            <option value="<?= $anggota['id'] ?>"><?= $anggota['nama'] ?></option>
                 <?php endforeach; ?>
            </select>
        </div>
     
        <div class="mb-3" >
            <label for="exampleInputEmail1" class="form-label">BUKU ID</label>
            <select id="" class="form-select" name="jenis_kelamin">
                <option value="">SELECT OPTION</option>
            <?php foreach ($data['tb_buku'] as $tb_buku): ?>
                 <option value="<?= $tb_buku['id'] ?>"><?= $tb_buku['nama'] ?></option>
             <?php endforeach; ?>
            </select>
        </div>
       
        <div class="mb-3" >
            <label for="exampleInputEmail1" class="form-label">PETUGAS ID</label>
            <select id="" class="form-select" name="jenis_kelamin">
                <option value="">SELECT OPTION</option>
            <?php foreach ($data['petugas'] as $petugas): ?>
                <option value="<?= $petugas['id'] ?>"><?= $petugas['nama'] ?></option>
            <?php endforeach; ?>
            </select>
        </div>

    <div class="mb-3" >
            <label for="tgl_peminjaman" class="form-label">TANGGAL PEMINJAMAN</label>
            <input type="date" class="form-control"  id="tgl_peminjaman"  name="tgl_peminjaman"  >
        </div>
  
        <div class="mb-3" >
            <label for="tgl_pengembalian" class="form-label">TANGGAL PENGEMBALIAN</label>
            <input type="date" class="form-control"  id="tgl_pengembalian"  name="tgl_pengembalian"  >
        </div>
   
 
        <center>
        <button type="submit" class="btn btn-primary" name="submit" >TAMBAH DATA</button>
        <a href="../peminjaman.php"  class="btn btn-danger" >BACK</a>
        </center>
</form>
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 </body>
</html>

  
<?php
// Koneksi ke database
include '../koneksi.php';

// Query gabungan
$queryGabungan = "
SELECT anggota_id AS id, nama_anggota AS nama, 'tb_anggota' AS tipe FROM anggota
UNION
SELECT buku_id AS id, judul_buku AS nama, 'buku' AS tipe FROM tb_buku
UNION
SELECT petugas_id AS id, nama_petugas AS nama, 'petugas' AS tipe FROM tb_petugas";

$data = [];
if ($resultGabungan = mysqli_query($koneksi, $queryGabungan)) {
    while ($row = mysqli_fetch_assoc($resultGabungan)) {
        $data[$row['tipe']][] = $row;
    }
} else {
    echo "Error: " . mysqli_error($koneksi);
    exit;
}

if (isset($_POST['submit'])) {
    // Mengambil data dari form
    $anggota_id = $_POST['anggota_id'];
    $buku_id = $_POST['buku_id'];
    $petugas_id = $_POST['petugas_id'];
    $tgl_peminjaman = $_POST['tgl_peminjaman'];
    $tgl_pengembalian = $_POST['tgl_pengembalian'];

    // Validasi tanggal
    if (strtotime($tgl_peminjaman) > strtotime($tgl_pengembalian)) {
        echo "Tanggal peminjaman tidak boleh lebih besar dari tanggal pengembalian.";
        exit;
    }

    // Query untuk menyimpan data
    $sql = "INSERT INTO peminjaman (anggota_id, buku_id, petugas_id, tgl_peminjaman, tgl_pengembalian)
            VALUES ('$anggota_id', '$buku_id', '$petugas_id', '$tgl_peminjaman', '$tgl_pengembalian')";

    if (mysqli_query($koneksi, $sql)) {
        echo "<script>
            alert('Data berhasil ditambahkan');
            document.location = '../peminjaman.php';
        </script>";
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($koneksi);
    }
}

// Menutup koneksi
mysqli_close($koneksi);
?>

