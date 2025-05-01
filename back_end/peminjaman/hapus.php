<?php 
// <!-- koneksi database -->
include "../../conn.php";


// cek id via url
if(isset($_GET['id'])) {
    $id_peminjaman = $_GET['id'];

    // query untuk mendapatkan data anggota berdasarkan ID
    $sql = "DELETE FROM peminjaman WHERE id_peminjaman = $id_peminjaman ";

    if (mysqli_query($conn, $sql)) {
       echo " <script>
                    alert('data berhasil dihapus');
                   document.location = '../../peminjaman.php';
               </script>";
    }else{
       echo "TERJADI KESALAHAN: ".mysqli_error($conn);
    }

    // menutup conn
    mysqli_close($conn);

    // pindahkan kehalaman utama
    //header("location: ../barang.php");
  
}else {
   echo "ID PEMINJAMAN TIDAK DITEMUKAN";
}


?>