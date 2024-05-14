<?php
include 'koneksi.php';

if (isset($_GET['username'])) {
    $username = $_GET['username'];

    $query = "DELETE FROM user WHERE username='$username'";

    if (mysqli_query($koneksi, $query)) {
        header("Location: users.php");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    echo "Username tidak diberikan";
}
?>
