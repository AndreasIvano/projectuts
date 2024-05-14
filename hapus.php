<?php
include 'koneksi.php';

if (isset($_GET['nama_brg'])) {
    $nama_brg = $_GET['nama_brg'];

    $query = "DELETE FROM barang WHERE nama_brg='$nama_brg'";

    if (mysqli_query($koneksi, $query)) {
        header("Location: menu.php");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    echo "Nama barang tidak diberikan";
}
?>
