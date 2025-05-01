<?php 
include   '../../asset/header.php';


// <!-- koneksi database -->
include "../../conn.php";

     
 // cek id via url
 if(isset($_GET['id'])) {
     $id_karyawan = $_GET['id'];

 
 // query untuk mendapatkan data anggota berdasarkan ID
     $sql = "SELECT * FROM karyawan WHERE id_karyawan = $id_karyawan";
  

     $result = mysqli_query($conn, $sql);

 

 // jika data ditemukan, tampilkan nanti di form
     if(mysqli_num_rows($result) == 1) {
         $row = mysqli_fetch_assoc($result);

         $nama_karyawan = $row['nama_karyawan'];
         $nomor_hp = $row['nomor_hp'];
         
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
     $nama_karyawan = $_POST['nama_karyawan'];
     $nomor_hp = $_POST['nomor_hp'];
  



     // Query untuk update data anggota
     $sql_update = "UPDATE karyawan SET nama_karyawan='$nama_karyawan', 
     nomor_hp='$nomor_hp' WHERE id_karyawan=$id_karyawan";


     // Menjalankan query
     if (mysqli_query($conn, $sql_update)) {
     echo " <script>
                 alert('data berhasil diubah');
                 document.location = '../../karyawan.php';
             </script>";
     } else {
     echo "Terjadi kesalahan: ". mysqli_error($koneksi);
     }


 // Menutup koneksi
 mysqli_close($koneksi);
}
?>






 
 <!-- Custom fonts for this template-->
 <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">


  
  <style>
  .card {
  
    margin:auto;
    width: 800px;
  }

  .section-header {
            background-color: #6777ef; /* Warna biru latar belakang */
            padding: 20px;
            border-radius: 5px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 800px;
            margin:auto;
            margin-top: 20px;
        }

        .section-header h1 {
            margin: 0;
            font-size: 24px;
        }

        .section-header-breadcrumb a {
            color: #ffffff; /* Warna breadcrumb */
            text-decoration: none;
            opacity: 0.9;
        }

        .section-header-breadcrumb a:hover {
            text-decoration: underline;
            opacity: 1;
        }

        .section-header-breadcrumb {
            color: white;
        }
</style>


  <section class="section">
            <div class="section-header">
                <h1>EDIT KARYAWAN</h1>
                <div class="section-header-breadcrumb">
                    <a href="home.php">Dashboard</a> / 
                    <a href="../../karyawan.php">karyawan</a>  
                </div>
            </div>
        </section><br>

        <!-- Begin Page Content -->
        <div class="container-fluid">

         <!-- DataTales Example -->
         <div class="card shadow mb-4 relative">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">EDIT DATA KARYAWAN</h6>
            
              <hr>
            

            </div>
            <div class="card-body">
              <form action=""  method="post">
              <div class="mb-3">
                <label for="nama" class="form-label">NAMA</label>
                <input type="text" class="form-control" id="nama" name="nama_karyawan" placeholder="masukan namamu" required autocomplete="off" value="<?php echo $nama_karyawan; ?>">
              </div>
           
              <div class="mb-3">
                <label for="nomor_hp" class="form-label">NO HP</label>
                <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" placeholder="masukan namamu" required autocomplete="off" value="<?php echo $nomor_hp; ?>">
              </div>
           
           
           
                <button type="submit"  name="submit" class="btn btn-primary float-end" style="margin-left: 41%;" >EDIT DATA</i></button>
            </form>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->


        
     <!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin-2.min.js"></script>
       


<?php
    
include "../../asset/footer.php"; 

?>


        
   