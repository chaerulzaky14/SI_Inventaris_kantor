<?php 
// <!-- koneksi database -->
include "../../conn.php";


// cek id via url
if(isset($_GET['id'])) {
    $id_petugas = $_GET['id'];

    // query untuk mendapatkan data anggota berdasarkan ID
    $sql = "DELETE FROM petugas WHERE id_petugas = $id_petugas ";

    if (mysqli_query($conn, $sql)) {
       echo " <script>
                    alert('data berhasil dihapus');
                   document.location = '../../petugas.php';
               </script>";
    }else{
       echo "TERJADI KESALAHAN: ".mysqli_error($conn);
    }

    // menutup conn
    mysqli_close($conn);

    // pindahkan kehalaman utama
    //header("location: ../anggota.php");
  
}else {
   echo "ID PETUGAS TIDAK DITEMUKAN";
}


?>