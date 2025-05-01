<?php 
include "asset/header.php";
include "asset/sidebar.php";

// <!-- koneksi database -->
include "conn.php";

// query untuk tampilkan data karyawan
$kywn = "select * from karyawan";

// jalankan query
$result = mysqli_query($conn, $kywn);

?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

         <!-- DataTales Example -->
         <div class="card shadow mb-4 relative">
            <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold text-primary">DATA KARYAWAN</h5>
              <hr>

              <a href="back_end/karyawan/tambah.php" class="btn btn-primary float-end" style="margin-left: 80%;"><i class="fas fa-plus"> TAMBAH DATA</i></a>
                    
            <div class="card-body">
            </div>

              <div class="table-responsive">
                <!-- kondisi jika baris lebih dari 0 maka false jika sebaliknya true atau ada isinya -->
                <?php if(mysqli_num_rows($result) > 0) { ?>
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>No hp</th>
                      <th>action</th>
                    </tr>
                  </thead>
                 <tbody>
                  <!-- proses me-looping data -->
                   
                  <?php 
                  $no =1;
                  while( $row = mysqli_fetch_assoc($result))  { ?>
                  
                   <tr>
                      <td><?php echo $no;  ?> </td>
                      <td><?php echo $row['nama_karyawan']; ?> </td>
                      <td> <?php echo $row['nomor_hp']; ?></td> 
                       <td> 
                      <a href='back_end/karyawan/edit.php?id="<?php echo  $row['id_karyawan'];  ?>"'  class="btn btn-primary"  onclick="return confirm('Apakah Anda yakin ingin mengedit data ini?');"> <i class="fas fa-edit"></i></a> |
                      <a href='back_end/karyawan/hapus.php?id="<?php echo  $row['id_karyawan'];  ?>"' class="btn btn-danger"  onclick="return confirm('Apakah Anda yakin ingin hapus data ini?');"><i class="fas fa-trash"></i></a> 
                      </td>
                    </tr>
                  
             
                 <?php
                  $no++;
                  } 
                 ?>
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


        
   