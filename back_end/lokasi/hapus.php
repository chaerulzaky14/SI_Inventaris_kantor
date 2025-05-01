<?php 
// <!-- koneksi database -->
include "../../conn.php";


// cek id via url
if(isset($_GET['id'])) {
    $id_lokasi = $_GET['id'];

    // query untuk mendapatkan data anggota berdasarkan ID
    $sql = "DELETE FROM lokasi WHERE id_lokasi = $id_lokasi ";

    if (mysqli_query($conn, $sql)) {
       echo " <script>
                    alert('data berhasil dihapus');
                   document.location = '../../lokasi.php';
               </script>";
    }else{
       echo "TERJADI KESALAHAN: ".mysqli_error($conn);
    }

    // menutup conn
    mysqli_close($conn);

    // pindahkan kehalaman utama
    //header("location: ../anggota.php");
  
}else {
   echo "ID LOKASI TIDAK DITEMUKAN";
}


?>