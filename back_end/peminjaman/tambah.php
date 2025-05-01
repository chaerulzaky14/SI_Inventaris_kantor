<?php 
include   '../../asset/header.php';


// <!-- conn database -->
include "../../conn.php";

 

?>
 



 <!-- Custom fonts for this template-->
 <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Select CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" rel="stylesheet">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Bootstrap Select JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>


  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">



  <style>
  .card {
  
    margin: auto;
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
                <h1>TAMBAH PEMINJAMAN</h1>
                <div class="section-header-breadcrumb">
                    <a href="home.php">Dashboard</a> / 
                    <a href="../../peminjaman.php"> peminjaman</a>  
                </div>
            </div>
        </section><br>



        <!-- Begin Page Content -->
        <div class="container-fluid">

      

         <!-- DataTales Example -->
      
  
         
         <div class="card shadow mb-4 relative">

        
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">TAMBAH DATA PEMINJAMAN</h6>
            
              <hr>
            

            </div>
            <div class="card-body">
              <form action=""  method="post">

              <div class="mb-3">
                <label for="nama" class="form-label">TANGGAL PEMINJAMAN</label>
                <input type="date" class="form-control" id="" name="tanggal_peminjaman" placeholder="masukan tanggal peminjaman" required autocomplete="off" >
              </div>
              
              <div class="mb-3">
                <label for="nama" class="form-label">TANGGAL PENGEMBALIAN</label>
                <input type="date" class="form-control" id="" name="tanggal_pengembalian" placeholder="masukan tanggal pengembalian" required autocomplete="off" >
              </div>
              
              <div class="mb-3">
                <label for="nama" class="form-label">ID KARYAWAN</label>
                <select  class="selectpicker form-control" data-live-search="true" name="id_karyawan" ata-style="border" data-max-options="10">
                             <option disabled="value" selected>--PILIHAN--</option>
                              <?php
                                  // jalankan query untuk menampilkan semua data diurutkan berdasarkan
                                  $query = "SELECT * FROM karyawan ORDER BY nama_karyawan ASC";
                                  $result = mysqli_query($conn, $query);
                                  //mengecek apakah ada error ketika menjalankan query
                                  if(!$result){
                                    die ("Query Error: ".mysqli_errno($conn).
                                       " - ".mysqli_error($conn));
                                  }
 
                                  $no = 1;  
                                 
                                  while($row = mysqli_fetch_assoc($result))
                                  {
                                  ?>
                             <option value="<?php echo $row['id_karyawan']; ?>"><?=  $row['id_karyawan'].' - ' . $row['nama_karyawan'] ?></option>
                             <?php
                                    $no++; //untuk nomor urut terus bertambah 1
                                  }
                                  ?>
                             </select>
              </div>
           
              <div class="mb-3">
                <label for="nama" class="form-label">ID PETUGAS</label>
                <select  class="selectpicker form-control" data-live-search="true" name="id_petugas" ata-style="border" data-max-options="10">
                             <option disabled="value" selected>--PILIHAN--</option>
                              <?php
                                  // jalankan query untuk menampilkan semua data diurutkan berdasarkan
                                  $query = "SELECT * FROM petugas ORDER BY nama_petugas  ASC";
                                  $result = mysqli_query($conn, $query);
                                  //mengecek apakah ada error ketika menjalankan query
                                  if(!$result){
                                    die ("Query Error: ".mysqli_errno($conn).
                                       " - ".mysqli_error($conn));
                                  }
 
                                  $no = 1;  
                                 
                                  while($row = mysqli_fetch_assoc($result))
                                  {
                                  ?>
                             <option value="<?php echo $row['id_petugas']; ?>"><?=  $row['id_petugas'].' - ' . $row['nama_petugas'] ?></option>
                             <?php
                                    $no++; //untuk nomor urut terus bertambah 1
                                  }
                                  ?>
                             </select>
              </div>

           
                <button type="submit"  name="submit" class="btn btn-primary float-end" style="margin-left: 40%;" >+ TAMBAH DATA</i></button>
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
     if (isset($_POST['submit'])) {
      // Mengambil data dari form
      $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
      $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
      $id_karyawan = $_POST['id_karyawan'];
      $id_petugas = $_POST['id_petugas'];
    
     
      // Query untuk menambahkan data anggota
      $sql = "INSERT INTO peminjaman (tanggal_peminjaman, tanggal_pengembalian, id_karyawan, id_petugas) VALUES ('$tanggal_peminjaman', ' $tanggal_pengembalian','$id_karyawan', '$id_petugas')";
      // Menjalankan query
      if (mysqli_query($conn, $sql)) {
      echo " <script>
        alert('data berhasil tersimpan');
        document.location = '../../peminjaman.php';
      </script>";
      } else {
      echo "Terjadi kesalahan: ". mysqli_error($conn);
      }
  // Menutup conn
  mysqli_close($conn);
}



include "../../asset/footer.php"; 

?>

<script>

$(document).ready(function () {
        $('.selectpicker').selectpicker();
    });
</script>


        
   