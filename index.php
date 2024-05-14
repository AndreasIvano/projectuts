<?php
include "koneksi.php";
// Proses login jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lakukan validasi dan proses login di sini
    // Contoh sederhana: query database untuk mencocokkan username dan password
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 1) {
        // Login berhasil, arahkan ke halaman lain
        $row = mysqli_fetch_assoc($result);
        $role = $row['sebagai'];
		
		if ($role == 'admin') {
            // Jika peran adalah admin, arahkan ke halaman admin
            header("Location: menu_admin.php");
        } elseif ($role == 'user') {
            // Jika peran adalah user, arahkan ke halaman user biasa
            header("Location: menu_user.php");
        } else {
			header("Location: menu_user.php");
		}
        exit();

    } else {
        // Login gagal, tampilkan pesan kesalahan
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2 align="center">Login</h2>

<?php if(isset($error)) { echo "<p>$error</p>"; } ?>

<!-- Form login -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="username">
    <div align="center">Username:</div>
    </label>
    <div align="center">
      <input type="text" id="username" name="username">
      <br>
      <br>
    </div>
    <label for="password">
    <div align="center">Password:</div>
    </label>
    <div align="center">
      <input type="password" id="password" name="password">
      <br>
      <br>
        <input type="submit" value="Login">
    </div>
</form>

</body>
</html>

<?php
// Tutup koneksi database
mysqli_close($koneksi);
?>
