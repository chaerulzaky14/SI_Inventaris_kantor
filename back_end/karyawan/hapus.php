<?php 
// <!-- koneksi database -->
include "../../conn.php";


// cek id via url
if(isset($_GET['id'])) {
    $id_karyawan = $_GET['id'];

    // query untuk mendapatkan data anggota berdasarkan ID
    $sql = "DELETE FROM karyawan WHERE id_karyawan = $id_karyawan ";

    if (mysqli_query($conn, $sql)) {
       echo " <script>
                    alert('data berhasil dihapus');
                   document.location = '../../karyawan.php';
               </script>";
    }else{
       echo "TERJADI KESALAHAN: ".mysqli_error($conn);
    }

    // menutup conn
    mysqli_close($conn);

    // pindahkan kehalaman utama
    //header("location: ../anggota.php");
  
}else {
   echo "ID KARYAWAN TIDAK DITEMUKAN";
}


?>