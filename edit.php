<?php
include 'koneksi.php';

if (isset($_GET['nama_brg'])) {
    $nama_brg = $_GET['nama_brg'];
    $data = mysqli_query($koneksi, "SELECT * FROM barang WHERE nama_brg='$nama_brg'");

    if ($data && mysqli_num_rows($data) > 0) {
        $d = mysqli_fetch_array($data);
    } else {
        echo "Barang tidak ditemukan";
        exit();
    }
} else {
    echo "Nama barang tidak diberikan";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>
</head>
<body>
    <h2 align="center">Edit Barang</h2>
    <form method="post" action="update.php">
        <input type="hidden" name="nama_brg" value="<?php echo $d['nama_brg']; ?>">
        <div>
            <label><h3>Nama Barang</h3></label>
            <p><?php echo $d['nama_brg']; ?></p>
        </div>
        <div>
            <label>Tanggal</label>
            <input type="date" name="tanggal" value="<?php echo $d['tanggal']; ?>">
        </div>
        <div>
            <label>Quantity</label>
            <input type="number" name="kuantiti" value="<?php echo $d['kuantiti']; ?>">
        </div>
		<br>
        <div>
            <button type="submit">Update</button>
			<button onclick="history.back()">Kembali</button>
        </div>
    </form>
</body>
</html>
