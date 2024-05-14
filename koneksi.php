<!<?php
// Detail koneksi database
$host = "localhost"; // Biasanya "localhost" jika database berada di server yang sama dengan web server
$username = "root";
$password = "";
$database = "warehouse";

// Buat koneksi
$koneksi = mysqli_connect($host, $username, $password, $database);
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error()); }
?>