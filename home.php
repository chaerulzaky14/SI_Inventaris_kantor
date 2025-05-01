<?php 
include "asset/header.php";
include "asset/sidebar.php";
include 'conn.php';

// Query untuk menghitung jumlah data dari beberapa tabel sekaligus
$query = "
    SELECT 
        (SELECT COUNT(*) FROM karyawan) AS total_karyawan,
        (SELECT COUNT(*) FROM lokasi) AS total_lokasi,
        (SELECT COUNT(*) FROM barang) AS total_barang,
        (SELECT COUNT(*) FROM petugas) AS total_petugas,
         (SELECT COUNT(*) FROM kategori) AS total_kategori,
        (SELECT COUNT(*) FROM peminjaman) AS total_peminjaman,
        (SELECT COUNT(*) FROM detail_peminjaman) AS total_detail_peminjaman
       
";

$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <!-- Card Karyawan -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">KARYAWAN</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data['total_karyawan'] . " Orang"; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Lokasi -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">LOKASI</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data['total_lokasi'] . " Lokasi"; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-map-marker-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Barang -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">BARANG</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data['total_barang'] . " Barang"; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Petugas -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">PETUGAS</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data['total_petugas'] . " Petugas"; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-shield fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

          
<!-- Card Kategori -->
<div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Kategori</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data['total_kategori'] . " Kategori"; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tags fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


          <!-- Card Peminjaman -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Peminjaman</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data['total_peminjaman'] . " Transaksi"; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Card Detail Peminjaman -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Detail Peminjaman</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data['total_detail_peminjaman'] . " Detail"; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        
    </div>

</div>
<!-- /.container-fluid -->

<?php include "asset/footer.php"; ?>
