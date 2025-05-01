<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah anggota</title>
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
        <H3>TAMBAH DATA ANGGOTA</H3>
        <div class="mb-3" >
            <label for="exampleInputEmail1" class="form-label">NAMA ANGGOTA</label>
            <input type="text" class="form-control" id="exampleInputEmail1"  name="nama_anggota">
        </div>
        <div class="mb-3" >
            <label for="exampleInputEmail1" class="form-label">ALAMAT</label>
            <input type="text" class="form-control" id="exampleInputEmail1" autocomplate="off" name="alamat">
        </div>
        <div class="mb-3" >
            <label for="exampleInputEmail1" class="form-label">JENIS KELAMIN</label>
            <select id="" class="form-select" name="jenis_kelamin">
                <option value="">SELECT OPTION</option>
                <option value="L">LAKI-LAKI</option>
                <option value="P">PEREMPUAN</option>
            </select>
        </div>
        <div class="mb-3" >
            <label for="exampleInputEmail1" class="form-label">NOMER HP</label>
            <input type="number" class="form-control" id="exampleInputEmail1" name="no_hp">
        </div>
      
 
        <center>
        <button type="submit" class="btn btn-primary" name="submit">TAMBAH DATA</button>
        <a href="../anggota.php"  class="btn btn-danger" >BACK</a>
        </center>
</form>
    </div>
    
<?php

   // Koneksi ke database
   include '../koneksi.php';

     if (isset($_POST['submit'])) {
        // Mengambil data dari form
        $nama_anggota = $_POST['nama_anggota'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        // Query untuk menambahkan data anggota
        $sql = "INSERT INTO tb_anggota (nama_anggota, alamat, 
        no_hp, jenis_kelamin) VALUES ('$nama_anggota', '$alamat', 
        '$no_hp', '$jenis_kelamin')";
        // Menjalankan query
        if (mysqli_query($koneksi, $sql)) {
        echo " <script>
					alert('data berhasil tersimpan');
					document.location = '../anggota.php';
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