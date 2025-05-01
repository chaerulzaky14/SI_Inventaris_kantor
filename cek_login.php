<?php 
// Mengaktifkan session pada PHP
session_start();

// Menghubungkan PHP dengan database
include 'conn.php';

// Menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Menggunakan prepared statement untuk menghindari SQL Injection
$query = "SELECT * FROM petugas WHERE username = ? AND password = ?";
$stmt = mysqli_prepare($conn, $query);

// Bind parameter untuk menghindari SQL Injection
mysqli_stmt_bind_param($stmt, "ss", $username, $password);

// Eksekusi statement
mysqli_stmt_execute($stmt);

// Ambil hasil query
$result = mysqli_stmt_get_result($stmt);
$cek = mysqli_num_rows($result);

// Cek apakah username dan password ditemukan dalam database
if ($cek > 0) {
    $data = mysqli_fetch_assoc($result);
    
    $_SESSION['id_petugas'] = $data['id_petugas'];
    $_SESSION['nama_petugas'] = $data['nama_petugas']; // Simpan nama petugas di session
    $_SESSION['level'] = $data['level'];

    // Mengganti session username dengan nama_petugas
    $_SESSION['username'] = $data['nama_petugas'];

    // Cek jika user login sebagai petugas
    if ($data['level'] == "petugas") {
        // Alihkan ke halaman dashboard petugas
        header("location:home.php?pesan=sukses");
    } else {
        // Alihkan ke halaman login kembali
        header("location:index.php?pesan=gagal");
    }
} else {
    header("location:index.php?pesan=gagal");
}

// Tutup statement
mysqli_stmt_close($stmt);

// Tutup koneksi database
mysqli_close($conn);
?>
