    
<?php

// Koneksi ke database
include '../koneksi.php';



 // cek id via url
 if(isset($_GET['id'])) {
     $anggota_id = $_GET['id'];

 
 // query untuk mendapatkan data anggota berdasarkan ID
     $sql = "SELECT * FROM tb_anggota WHERE anggota_id = $anggota_id ";
  

     $result = mysqli_query($koneksi, $sql);

 

 // jika data ditemukan, tampilkan nanti di form
     if(mysqli_num_rows($result) == 1) {
         $row = mysqli_fetch_assoc($result);

         $nama_anggota = $row['nama_anggota'];
         $alamat = $row['alamat'];
         $jenis_kelamin = $row['jenis_kelamin'];
         $no_hp = $row['no_hp'];
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
     $nama_anggota = $_POST['nama_anggota'];
     $alamat = $_POST['alamat'];
     $no_hp = $_POST['no_hp'];
     $jenis_kelamin = $_POST['jenis_kelamin'];



     // Query untuk update data anggota
     $sql_update = "UPDATE tb_anggota SET nama_anggota='$nama_anggota', 
     alamat='$alamat', jenis_kelamin='$jenis_kelamin', no_hp='$no_hp' WHERE anggota_id=$anggota_id";


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
    <title>update anggota</title>
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
        <H3>UBAH DATA ANGGOTA</H3>
        
        <div class="mb-3" >
            <label for="nama_anggota" class="form-label">NAMA ANGGOTA</label>
            <input type="text" class="form-control"  id="nama_anggota"  name="nama_anggota" value="<?php echo $nama_anggota; ?>">
        </div>
        <div class="mb-3" >
            <label for="exampleInputEmail1" class="form-label">ALAMAT</label>
            <input type="text" class="form-control" value="<?php echo $alamat; ?>" id="exampleInputEmail1" autocomplate="off" name="alamat">
        </div>
        <div class="mb-3" >
            <label for="exampleInputEmail1" class="form-label">JENIS KELAMIN</label>
            <select id="jenis_kelamin" class="form-select" name="jenis_kelamin">
                <option value="">SELECT OPTION</option> 
                <option value="L" <?php if($jenis_kelamin == 'L') echo 'selected';  ?> >LAKI-LAKI</option>
                <option value="P" <?php if($jenis_kelamin == 'P') echo 'selected';  ?>>PEREMPUAN</option>
            </select>
        </div>
        <div class="mb-3" >
            <label for="exampleInputEmail1" class="form-label">NOMER HP</label>
            <input type="number" class="form-control" value="<?php echo $no_hp; ?>" id="exampleInputEmail1" name="no_hp">
        </div>
      
 
        <center>
        <button type="submit" class="btn btn-primary" name="submit">UBAH DATA</button>
        <a href="../anggota.php"  class="btn btn-danger" >BACK</a>
        </center>
</form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 </body>
</html>