<?php 
include "asset/header.php";
include "asset/sidebar.php";

// <!-- koneksi database -->
include "conn.php";

// query untuk tampilkan data petugas
$ptgs = "select * from petugas";

// jalankan query
$result = mysqli_query($conn, $ptgs);

?>
    <style>
        .section-header {
            background-color: #6777ef; /* Warna biru latar belakang */
            padding: 20px;
            border-radius: 5px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
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


        <!-- Begin Page Content -->
        <div class="container-fluid">

        <section class="section">
            <div class="section-header">
                <h1>DATA PETUGAS</h1>
                <div class="section-header-breadcrumb">
                    <a href="home.php">Dashboard</a> / 
                    <a href="petugas.php">Petugas</a>  
                </div>
            </div>
        </section><br>

         <!-- DataTales Example -->
         <div class="card shadow mb-4 relative">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DATA PETUGAS</h6>
              <hr>
              <a href="back_end/petugas/tambah.php" class="btn btn-primary float-end" style="margin-left: 80%;"><i class="fas fa-plus"> TAMBAH DATA</i></a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <!-- kondisi jika baris lebih dari 0 maka false jika sebaliknya true atau ada isinya -->
                <?php if(mysqli_num_rows($result) > 0) { ?>
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>No hp</th>
                      <th>username</th>
                      <th>Password</th>
                      <th>action</th>
                    </tr>
                  </thead>
                 <tbody>
                  <!-- proses me-looping data -->
                  <?php 
                  // membuat nomer
                  $no =1;
                  while( $row = mysqli_fetch_assoc($result)) {
                  ?>
                 
                    <tr>
                      <td> <?php echo $no;   ?></td>
                      <td> <?php echo $row['nama_petugas'] ?></td>
                      <td> <?php echo $row['nomor_hp']  ?></td>
                      <td> <?php echo $row['username']  ?></td>
                      <td> <?php echo $row['password']  ?></td>
                       <td> 
                       <a href='back_end/petugas/edit.php?id="<?php echo  $row['id_petugas'];  ?>"' class="btn btn-primary" onclick="return confirm('Apakah Anda yakin ingin mengedit data ini?');"><i class="fas fa-edit"></i></a> |
                      <a href='back_end/petugas/hapus.php?id="<?php echo  $row['id_petugas'];  ?>"' class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin hapus data ini?');"><i class="fas fa-trash"></i></a> 
                      </td>
                    </tr>
                 
                
                 <?php $no++; } ?>
                </table>
                </tbody>
                    <?php 
                  }else{
                    echo"tidak ada data ditemukan";
                  }  
                  ?>

              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

       
<?php include "asset/footer.php"; ?>


        
   