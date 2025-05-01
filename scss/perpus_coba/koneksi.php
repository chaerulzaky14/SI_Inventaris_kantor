<?php
$koneksi = mysqli_connect("localhost", "root", "", 
"perpus_coba");
if (!$koneksi) {
 die("Koneksi gagal: " . mysqli_connect_error());
} 
?>