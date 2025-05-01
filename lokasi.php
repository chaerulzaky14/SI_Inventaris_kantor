<?php 
include "asset/header.php";
include "asset/sidebar.php";

// <!-- koneksi database -->
include "conn.php";

// query untuk tampilkan data lokasi
$lks = "select * from lokasi";

// jalankan query
$result = mysqli_query($conn, $lks);

?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

         <!-- DataTales Example -->
         <div class="card shadow mb-4 relative">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DATA LOKASI</h6>
              <hr>
              <a href="back_end/lokasi/tambah.php" class="btn btn-primary float-end" style="margin-left: 80%;"><i class="fas fa-plus"> TAMBAH DATA</i></a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <!-- kondisi jika baris lebih dari 0 maka false jika sebaliknya true atau ada isinya -->
                <?php if(mysqli_num_rows($result) > 0) { ?>
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama lokasi</th>
                      <th>action</th>
                    </tr>
                  </thead>
                 <tbody>
                  <!-- proses me-looping data -->
                  <?php 
                   $no=1;
                  while( $row = mysqli_fetch_assoc($result)) 
                    {
                  ?>
               
                     <tr>
                      <td><?php echo $no; ?></td>
                      <td> <?php echo $row['nama_lokasi']; ?></td>
                       <td> 
                      <a href='back_end/lokasi/edit.php?id="<?php echo  $row['id_lokasi'];  ?>"' class="btn btn-primary" onclick="return confirm('Apakah Anda yakin ingin mengedit data ini?');"><i class="fas fa-edit"></i></a> |
                      <a href='back_end/lokasi/hapus.php?id="<?php echo  $row['id_lokasi'];  ?>"' class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin hapus data ini?');"><i class="fas fa-trash"></i></a> 
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


        
   