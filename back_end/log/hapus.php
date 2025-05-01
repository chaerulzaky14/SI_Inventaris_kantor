<?php 
// <!-- koneksi database -->
include "../../conn.php";


// cek id via url
if(isset($_GET['id'])) {
    $id_aktivitas = $_GET['id'];

    // query untuk mendapatkan data aktivitas berdasarkan ID
    $sql = "DELETE FROM log_aktivitas WHERE id_aktivitas = $id_aktivitas ";

    if (mysqli_query($conn, $sql)) {
       echo " <script>
                    alert('data berhasil dihapus');
                   document.location = '../../log_activity.php';
               </script>";
    }else{
       echo "TERJADI KESALAHAN: ".mysqli_error($conn);
    }

    // menutup conn
    mysqli_close($conn);

    // pindahkan kehalaman utama
    //header("location: ../barang.php");
  
}else {
   echo "ID AKTIVITAS TIDAK DITEMUKAN";
}


?>