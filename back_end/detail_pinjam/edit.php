<?php 
include   '../../asset/header.php';


// <!-- conn database -->
include "../../conn.php";

 // cek id via url
 if(isset($_GET['id'])) {
    $id_detail_peminjaman = $_GET['id'];


// query untuk mendapatkan data anggota berdasarkan ID
    $sql = "SELECT * FROM detail_peminjaman WHERE id_detail_peminjaman = $id_detail_peminjaman";
 

    $result = mysqli_query($conn, $sql);



// jika data ditemukan, tampilkan nanti di form
    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        // menampilkan data
     
        $id_peminjaman = $row['id_peminjaman'];
        $id_barang = $row['id_barang'];
        $jumlah_barang = $row['jumlah_barang'];
     
        
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

    $id_peminjaman = $_POST['id_peminjaman'];
    $id_barang = $_POST['id_barang'];
    $jumlah_barang = $_POST['jumlah_barang'];

 



    // Query untuk update data anggota
    $sql_update = "UPDATE detail_peminjaman SET  id_peminjaman='$id_peminjaman', 
    id_barang='$id_barang',  jumlah_barang ='$jumlah_barang'    WHERE id_detail_peminjaman = $id_detail_peminjaman ";


    // Menjalankan query
    if (mysqli_query($conn, $sql_update)) {
    echo " <script>
                alert('data berhasil diubah');
                document.location = '../../detail_pinjam.php';
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
              <h6 class="m-0 font-weight-bold text-primary">EDIT DETAIL PEMINJAMAN</h6>
            
              <hr>
            

            </div>
            <div class="card-body">
              <form action=""  method="post">

         
              <div class="mb-3">
                <label for="nama" class="form-label">DETAIL PEMINJAMAN</label>
                <select  class="selectpicker form-control" data-live-search="true" name="id_peminjaman" ata-style="border" data-max-options="10">
                             <option disabled="value" selected>--PILIHAN--</option>
                              <?php
                                    // id barang yang dipilih
                                    $idDipilih = $id_barang; 

                                  // jalankan query untuk menampilkan semua data diurutkan berdasarkan
                                  $query = "SELECT  peminjaman.id_peminjaman,karyawan.nama_karyawan, petugas.nama_petugas
                                  FROM peminjaman
                                  INNER JOIN 
                                      karyawan ON peminjaman.id_karyawan = karyawan.id_karyawan
                                  INNER JOIN 
                                      petugas ON peminjaman.id_petugas = petugas.id_petugas";
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
                             <option value="<?= $row['id_peminjaman']; ?>" <?php if($row['id_peminjaman']=="$idDipilih"){?> selected="selected" <?php } ?>>    
                             ID :<?=  $row['id_peminjaman']?> 
                             | karyawan :<?=  $row['nama_karyawan']?> 
                             | petugas : <?= $row['nama_petugas'] ?>
                            </option>
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
                                 // id barang yang dipilih
                                 $idDipilih = $id_barang; 
                                 // jalankan query untuk menampilkan semua data diurutkan berdasarkan
                                  $query = "SELECT * FROM barang ORDER BY nama_barang ASC";
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
                             <option value="<?= $lokasi['id_barang']; ?>" <?php if($lokasi['id_barang']=="$idDipilih"){?> selected="selected" <?php } ?> >  <?= 'ID :'. $lokasi['id_barang'].' | ' . $lokasi['nama_barang'].' | stok :' .$lokasi['stok_barang'] ?> </option>
                             <?php
                            
                                
                                    $no++; //untuk nomor urut terus bertambah 1
                                  }

                                  
                                  ?>
                             </select>
              </div>


              <div class="mb-3">
                <label for="nama" class="form-label">JUMLAH BARANG</label>
                <input type="text" class="form-control" id="" value="<?= $jumlah_barang; ?>" name="jumlah_barang" placeholder="masukan jumlah barang" required autocomplete="off" >
              </div>
           
            
           
           
           
                <button type="submit"  name="submit" class="btn btn-primary " style="margin-left: 40%;" >+ EDIT DATA</i></button>
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

        
   