    
<?php

// Koneksi ke database
include '../koneksi.php';



 // cek id via url
 if(isset($_GET['id'])) {
     $kategori_id = $_GET['id'];

 
 // query untuk mendapatkan data anggota berdasarkan ID
     $sql = "SELECT * FROM tb_kategorii_buku WHERE kategori_id = $kategori_id ";
  

     $result = mysqli_query($koneksi, $sql);

 

 // jika data ditemukan, tampilkan nanti di form
     if(mysqli_num_rows($result) == 1) {
         $row = mysqli_fetch_assoc($result);

         $nama_kategori = $row['nama_kategori'];
     
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
 
         $nama_kategori = $_POST['nama_kategori'];



     // Query untuk update data anggota
     $sql_update = "UPDATE tb_kategorii_buku SET nama_kategori='$nama_kategori'  WHERE kategori_id=$kategori_id";


     // Menjalankan query
     if (mysqli_query($koneksi, $sql_update)) {
     echo " <script>
                 alert('data berhasil diubah');
                 document.location = '../kategori_buku.php';
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
        <H3>UBAH DATA KATEGORI_BUKU</H3>
        <div class="mb-3" >
            <label for="nama_kategori" class="form-label">NAMA KATEGORI</label>
            <input type="text" class="form-control"  id="nama_kategori"  name="nama_kategori" value="<?php echo $nama_kategori ; ?>">
        </div>
       
 
        <center>
        <button type="submit" class="btn btn-primary" name="submit" >UBAH KATEGORI</button>
        <a href="../kategori_buku.php"  class="btn btn-danger" >BACK</a>
        </center>
</form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 </body>
</html>