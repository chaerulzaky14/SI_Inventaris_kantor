<?php 

// Koneksi ke database
include '../koneksi.php';


error_reporting(0); // Tidak menampilkan error
 // cek id via url
 if(isset($_GET['id'])) {
     $kategori_id = $_GET['id'];

     // query untuk mendapatkan data anggota berdasarkan ID
     $sql = "DELETE FROM tb_kategorii_buku WHERE kategori_id = $kategori_id ";

     if (mysqli_query($koneksi, $sql)) {
        echo " <script>
                     alert('data berhasil dihapus');
                    document.location = '../kategori_buku.php';
                </script>";
     }else{
        echo "TERJADI KESALAHAN: ".mysqli_error($koneksi);
     }

     // menutup koneksi
     mysqli_close($koneksi);

     // pindahkan kehalaman utama
     //header("location: ../anggota.php");
   
 }else {
    echo "ID KATEGORI TIDAK DITEMUKAN";
 }


?>