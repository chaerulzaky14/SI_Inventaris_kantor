<?php 
// <!-- koneksi database -->
include "../../conn.php";


// cek id via url
if(isset($_GET['id'])) {
    $id_detail_peminjaman = $_GET['id'];

    // query untuk mendapatkan data anggota berdasarkan ID
    $sql = "DELETE FROM detail_peminjaman WHERE id_detail_peminjaman = $id_detail_peminjaman ";

    if (mysqli_query($conn, $sql)) {
       echo " <script>
                    alert('data berhasil dihapus');
                   document.location = '../../detail_pinjam.php';
               </script>";
    }else{
       echo "TERJADI KESALAHAN: ".mysqli_error($conn);
    }

    // menutup conn
    mysqli_close($conn);

    // pindahkan kehalaman utama
    //header("location: ../barang.php");
  
}else {
   echo "ID DETAIL PEMINJAMAN TIDAK DITEMUKAN";
}


?>