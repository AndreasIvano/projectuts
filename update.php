<?php
include 'koneksi.php';

if (isset($_POST['nama_brg']) && isset($_POST['tanggal']) && isset($_POST['kuantiti'])) {
    $nama_brg = $_POST['nama_brg'];
    $tanggal = $_POST['tanggal'];
    $kuantiti = $_POST['kuantiti'];

    $query = "UPDATE barang SET tanggal='$tanggal', kuantiti='$kuantiti' WHERE nama_brg='$nama_brg'";

    if (mysqli_query($koneksi, $query)) {
        header("Location: menu.php");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    echo "Data tidak lengkap";
}
?>
