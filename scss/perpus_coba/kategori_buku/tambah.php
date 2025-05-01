<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah K_B</title>
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
   <center> <h1>Tambah kategori Buku</h1><br><br></center>

    <div class="mb-3" >
            <label for="nama_kategori" class="form-label">NAMA KATEGORI</label>
            <input type="text" class="form-control"  id="nama_kategori"  name="nama_kategori"  >
        </div>
   
 
        <center>
        <button type="submit" class="btn btn-primary" name="submit" >TAMBAH DATA</button>
        <a href="../kategori_buku.php"  class="btn btn-danger" >BACK</a>
        </center>
</form>
    </div>
    
<?php

   // Koneksi ke database
   include '../koneksi.php';

     if (isset($_POST['submit'])) {
        // Mengambil data dari form
        $nama_kategori = $_POST['nama_kategori'];
   
        // Query untuk menambahkan data anggota
        $sql = "INSERT INTO tb_kategorii_buku (nama_kategori) VALUES ('$nama_kategori')";
        // Menjalankan query
        if (mysqli_query($koneksi, $sql)) {
        echo " <script>
					alert('data berhasil ditambahkan');
					document.location = '../kategori_buku.php';
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