<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah buku</title>
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
   <center> <h1>Tambah Buku</h1><br><br></center>

    <div class="mb-3" >
            <label for="judul_buku" class="form-label">JUDUL BUKU</label>
            <input type="text" class="form-control"  id="judul_buku"  name="judul_buku"  >
        </div>
        <div class="mb-3" >
            <label for="exampleInputEmail1" class="form-label">PENGARANG</label>
            <input type="text" class="form-control"   id="exampleInputEmail1" autocomplate name="pengarang">
        </div>
        
        <div class="mb-3" >
            <label for="exampleInputEmail1" class="form-label">TAHUN TERBIT</label>
            <input type="text" class="form-control"   id="exampleInputEmail1" autocomplate name="tahun_terbit">
        </div>
       
        <div class="mb-3" >
            <label for="exampleInputEmail1" class="form-label">KATEGORI_ID</label>
            <input type="number" class="form-control"   id="exampleInputEmail1" name="kategori_id">
        </div>
      
 
        <center>
        <button type="submit" class="btn btn-primary" name="submit" >TAMBAH DATA</button>
        <a href="../buku.php"  class="btn btn-danger" >BACK</a>
        </center>
</form>
    </div>
    
<?php

   // Koneksi ke database
   include '../koneksi.php';

     if (isset($_POST['submit'])) {
        // Mengambil data dari form
        $judul_buku = $_POST['judul_buku'];
        $pengarang = $_POST['pengarang'];
        $tahun_terbit = $_POST['tahun_terbit'];
        $kategori_id = $_POST['kategori_id'];
        // Query untuk menambahkan data anggota
        $sql = "INSERT INTO tb_buku (judul_buku, pengarang, 
        tahun_terbit, kategori_id) VALUES ('$judul_buku', '$pengarang', 
        '$tahun_terbit', '$kategori_id')";
        // Menjalankan query
        if (mysqli_query($koneksi, $sql)) {
        echo " <script>
					alert('data berhasil tersimpan');
					document.location = '../buku.php';
				</script>";
        } else {
        echo "Terjadi kesalahan: ". mysqli_error($koneksi);
        }
    // Menutup koneksi
    mysqli_close($koneksi);
}

?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 </body>
</html>