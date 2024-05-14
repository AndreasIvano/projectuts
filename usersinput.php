<?php
include 'koneksi.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "INSERT INTO user (username, password) VALUES ('$username', '$password')";

    if (mysqli_query($koneksi, $query)) {
        header("Location: users.php");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    echo "Data tidak lengkap";
}
?>
