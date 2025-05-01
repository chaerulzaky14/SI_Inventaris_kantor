    
<?php

// Koneksi ke database
include '../koneksi.php';



 // cek id via url
 if(isset($_GET['id'])) {
     $buku_id = $_GET['id'];

 
 // query untuk mendapatkan data anggota berdasarkan ID
     $sql = "SELECT * FROM tb_buku WHERE buku_id = $buku_id ";
  

     $result = mysqli_query($koneksi, $sql);

 

 // jika data ditemukan, tampilkan nanti di form
     if(mysqli_num_rows($result) == 1) {
         $row = mysqli_fetch_assoc($result);

         $judul_buku = $row['judul_buku'];
         $pengarang = $row['pengarang'];
         $tahun_terbit = $row['tahun_terbit'];
         $kategori_id = $row['kategori_id'];
     }else{
         echo "data tidak ada";
         exit;
     } 
     
 }else {
     echo "ID tidak ditemukan";
     exit;
 }



// proses update dara jika di klik tombol submit
  if (isset($_POST['submit'])) {

     // Mengambil data dari form
     $judul_buku = $_POST['judul_buku'];
         $pengarang = $_POST['pengarang'];
         $tahun_terbit = $_POST['tahun_terbit'];
         $kategori_id = $_POST['kategori_id'];



     // Query untuk update data anggota
     $sql_update = "UPDATE tb_buku SET judul_buku='$judul_buku', 
     pengarang='$pengarang', tahun_terbit='$tahun_terbit', kategori_id='$kategori_id' WHERE buku_id=$buku_id";


     // Menjalankan query
     if (mysqli_query($koneksi, $sql_update)) {
     echo " <script>
                 alert('data berhasil diubah');
                 document.location = '../anggota.php';
             </script>";
     } else {
     echo "Terjadi kesalahan: ". mysqli_error($koneksi);
     }


 // Menutup koneksi
 mysqli_close($koneksi);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update buku</title>
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
    <form method="POST" >
        <H3>UBAH DATA BUKU</H3>
        <div class="mb-3" >
            <label for="judul_buku" class="form-label">JUDUL ANGGOTA</label>
            <input type="text" class="form-control"  id="judul_buku"  name="judul_buku" value="<?php echo $judul_buku ; ?>">
        </div>
        <div class="mb-3" >
            <label for="exampleInputEmail1" class="form-label">PENGARANG</label>
            <input type="text" class="form-control" value="<?php echo $pengarang; ?>" id="exampleInputEmail1" autocomplate="off" name="pengarang">
        </div>
        
        <div class="mb-3" >
            <label for="exampleInputEmail1" class="form-label">TAHUN TERBIT</label>
            <input type="text" class="form-control" value="<?php echo $tahun_terbit; ?>" id="exampleInputEmail1" autocomplate="off" name="tahun_terbit">
        </div>
       
        <div class="mb-3" >
            <label for="exampleInputEmail1" class="form-label">KATEGORI_ID</label>
            <input type="number" class="form-control" value="<?php echo $kategori_id; ?>" id="exampleInputEmail1" name="no_hp">
        </div>
      
 
        <center>
        <button type="submit" class="btn btn-primary" name="submit" >UBAH DATA</button>
        <a href="../buku.php"  class="btn btn-danger" >BACK</a>
        </center>
</form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 </body>
</html>