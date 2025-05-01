<?php 
include   '../../asset/header.php';


// <!-- conn database -->
include "../../conn.php";

 // cek id via url
 if(isset($_GET['id'])) {
    $id_barang = $_GET['id'];


// query untuk mendapatkan data anggota berdasarkan ID
    $sql = "SELECT * FROM barang WHERE id_barang = $id_barang";
 

    $result = mysqli_query($conn, $sql);



// jika data ditemukan, tampilkan nanti di form
    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        // menampilkan data
        $nama_barang = $row['nama_barang'];
        $id_kategori = $row['id_kategori'];
        $id_lokasi = $row['id_lokasi'];
        $stok_barang = $row['stok_barang'];
     
        
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
    $nama_barang = $_POST['nama_barang'];
    $id_kategori = $_POST['id_kategori'];
    $id_lokasi = $_POST['id_lokasi'];
    $stok_barang = $_POST['stok_barang'];

 



    // Query untuk update data anggota
    $sql_update = "UPDATE barang SET nama_barang='$nama_barang', id_kategori='$id_kategori', 
    id_lokasi='$id_lokasi',  stok_barang ='$stok_barang'    WHERE id_barang=$id_barang";


    // Menjalankan query
    if (mysqli_query($conn, $sql_update)) {
    echo " <script>
                alert('data berhasil diubah');
                document.location = '../../barang.php';
            </script>";
    } else {
    echo "Terjadi kesalahan: ". mysqli_error($conn);
    }


// Menutup koneksi
mysqli_close($conn);
}

?>


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


<style>
  .card {
  
    margin: 5% 10% 25% 18%;
    width: 800px;
  }
</style>
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
                <h1>EDIT BARANG</h1>
                <div class="section-header-breadcrumb">
                    <a href="home.php">Dashboard</a> / 
                    <a href="../../barang.php">Barang</a>  
                </div>
            </div>
        </section><br>



        <!-- Begin Page Content -->
        <div class="container-fluid">

         <!-- DataTales Example -->
         <div class="card shadow mb-4 relative">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">EDIT BARANG</h6>
            
              <hr>
            

            </div>
            <div class="card-body">
              <form action=""  method="post">

              <div class="mb-3">
                <label for="nama" class="form-label">NAMA BARANG</label>
                <input type="text" class="form-control" id="nama" name="nama_barang" placeholder="masukan barang" required autocomplete="off" value="<?= $nama_barang; ?>" >
              </div>
              
              <div class="mb-3">
                <label for="nama" class="form-label">ID KATEGORI</label>
                <select  class="selectpicker form-control" data-live-search="true" name="id_kategori" ata-style="border" data-max-options="10">
                             <option disabled="value" selected>--PILIHAN--</option>
                              <?php
                                    // id barang yang dipilih
                                    $idDipilih = $row['id_kategori']; 

                                  // jalankan query untuk menampilkan semua data diurutkan berdasarkan
                                  $query = "SELECT * FROM kategori ORDER BY nama_kategori ASC";
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
                             <option value="<?= $row['id_kategori']; ?>" <?php if($row['id_kategori']=="$idDipilih"){?> selected="selected" <?php } ?>>  <?= $row['id_kategori'] .' - '. $row['nama_kategori'] ?>  </option>
                             <?php
                                    $no++; //untuk nomor urut terus bertambah 1
                                  }
                                  ?>
                             </select>
              </div>
           

              
              <div class="mb-3">
                <label for="nama" class="form-label">ID LOKASI</label>
                <select  class="selectpicker form-control" data-live-search="true" name="id_lokasi" ata-style="border" data-max-options="10">
                             <option disabled="value" selected>--PILIHAN--</option>
                              <?php
                                 // id barang yang dipilih
                                 $idDipilih = $id_lokasi; 
                                 // jalankan query untuk menampilkan semua data diurutkan berdasarkan
                                  $query = "SELECT * FROM lokasi ORDER BY nama_lokasi ASC";
                                  $result = mysqli_query($conn, $query);
                                  //mengecek apakah ada error ketika menjalankan query
                                  if(!$result){
                                    die ("Query Error: ".mysqli_errno($conn).
                                       " - ".mysqli_error($conn));
                                  }
 
                                  $no = 1;  
                                 
                                  while($lokasi = mysqli_fetch_assoc($result))
                                  
                                  {
                                  ?>
                             <option value="<?= $lokasi['id_lokasi']; ?>" <?php if($lokasi['id_lokasi']=="$idDipilih"){?> selected="selected" <?php } ?> >  <?= $lokasi['id_lokasi'].'-' .$lokasi['nama_lokasi'] ?>  </option>
                             <?php
                            
                                
                                    $no++; //untuk nomor urut terus bertambah 1
                                  }

                                  
                                  ?>
                             </select>
              </div>


              <div class="mb-3">
                <label for="nama" class="form-label">STOK BARANG</label>
                <input type="text" class="form-control" id="" value="<?= $stok_barang; ?>" name="stok_barang" placeholder="masukan jumlah barang" required autocomplete="off" >
              </div>
           
            
           
           
           
                <button type="submit"  name="submit" class="btn btn-primary float-end" style="margin-left: 40%;" >+ EDIT DATA</i></button>
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

<script>

$(document).ready(function () {
        $('.selectpicker').selectpicker();
    });
</script>

        
   