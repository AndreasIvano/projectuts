<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama_brg'];
    $tanggal = $_POST['tanggal'];
    $qty = $_POST['kuantiti'];

    $sql = "INSERT INTO barang (nama_brg, tanggal, kuantiti) VALUES ('$nama', '$tanggal', '$qty')";

    if ($koneksi->query($sql) === TRUE) {
        header("Location: menu.php");
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang Baru</title>
	
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
      $(function() 
	  {
       	$( "tanggal" ).datepicker({dateFormat: "dd-mm-yy"});
      });
      </script>
</head>
<body>
    <h2>Tambah Barang Baru</h2>
    <form method="post" action="input.php">
        <p>Nama: <input type="text" name="nama_brg" required></p>
        <p>Tanggal:<input type="date" name="tanggal" value="<?php echo $d['tanggal']; ?>"></p>
        <p>Kuantiti: <input type="text" name="kuantiti" required></p>
        <p><input type="submit" value="Tambah"></p>
		<button onclick="history.back()">Kembali</button>
    </form>

</body>
</html>
