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

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">



  <style>
  .card {
  
    margin:  auto;
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
                <h1>TAMBAH DETAIL PEMINJAMAN</h1>
                <div class="section-header-breadcrumb">
                    <a href="home.php">Dashboard</a> / 
                    <a href="../../detail_pinjam.php">Detail peminjaman</a>  
                </div>
            </div>
        </section><br>



        <!-- Begin Page Content -->
        <div class="container-fluid">

         <!-- DataTales Example -->
         <div class="card shadow mb-4 relative">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DETAIL PEMINJAMAN BARANG</h6>
            
              <hr>
            

            </div>
            <div class="card-body">
              <form action=""  method="post">

              
              <div class="mb-3">
                <label for="nama" class="form-label">DETAIL PEMINJAMAN</label>
                <select  class="selectpicker form-control" data-live-search="true" name="id_peminjaman" ata-style="border" data-max-options="10">
                             <option disabled="value" selected>--PILIHAN--</option>
                              <?php
                                  // jalankan query untuk menampilkan semua data diurutkan berdasarkan
                                  $query = "SELECT  peminjaman.id_peminjaman,karyawan.nama_karyawan, petugas.nama_petugas
                                  FROM peminjaman
                                  INNER JOIN 
                                      karyawan ON peminjaman.id_karyawan = karyawan.id_karyawan
                                  INNER JOIN 
                                      petugas ON peminjaman.id_petugas = petugas.id_petugas ";


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
                             <option value="<?php echo $row['id_peminjaman']; ?>">ID :<?=  $row['id_peminjaman']?> | karyawan :<?=  $row['nama_karyawan']?> | petugas : <?= $row['nama_petugas'] ?></option>
                             <?php
                                    $no++; //untuk nomor urut terus bertambah 1
                                  }
                                  ?>
                             </select>
              </div>
           
              <div class="mb-3">
                <label for="nama" class="form-label">NAMA BARANG</label>
                <select  class="selectpicker form-control" data-live-search="true" name="id_barang" ata-style="border" data-max-options="10">
                             <option disabled="value" selected>--PILIHAN--</option>
                              <?php
                                  // jalankan query untuk menampilkan semua data diurutkan berdasarkan
                                  $query = "SELECT * FROM barang ORDER BY nama_barang ASC";
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
                             <option value="<?php echo $row['id_barang']; ?>"><?= 'ID :'. $row['id_barang'].' | ' . $row['nama_barang'].' | stok :' .$row['stok_barang'] ?></option>
                             <?php
                                    $no++; //untuk nomor urut terus bertambah 1
                                  }
                                  ?>
                             </select>
              </div>


              <div class="mb-3">
                <label for="nama" class="form-label">JUMLAH BARANG</label>
                <input type="text" class="form-control" id="nama" name="jumlah_barang" placeholder="masukan jumlah barang" required autocomplete="off" >
              </div>
           
            
           
           
                                  
                <button type="submit"  name="submit" class="btn btn-primary " style="margin-left : 40%;"  >+ TAMBAH DATA</i></button>
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
       
  <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Bootstrap Select JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>




<?php
     if (isset($_POST['submit'])) {
      // Mengambil data dari form
       
      $id_peminjaman = $_POST['id_peminjaman'];
      $id_barang = $_POST['id_barang'];
      $jumlah_barang = $_POST['jumlah_barang'];
    
     
      // Query untuk menambahkan data anggota
      $sql = "INSERT INTO detail_peminjaman ( id_peminjaman, id_barang, jumlah_barang) 
      VALUES ( ' $id_peminjaman','$id_barang', '$jumlah_barang')";

      // Menjalankan query
      if (mysqli_query($conn, $sql)) {
      echo " <script>
        alert('data berhasil tersimpan');
        document.location = '../../detail_pinjam.php';
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

        
   