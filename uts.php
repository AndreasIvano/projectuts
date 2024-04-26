<!DOCTYPE html>
<html>
<head>
    <title>Warehouse Management System</title>
</head>
<body>
    <h1>Warehouse Management System</h1>
    
    <?php
    // Koneksi ke database
    $conn = mysqli_connect("localhost", "username", "password", "nama_database");
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Fungsi untuk menambahkan barang baru
    function tambahBarang($conn, $nama, $kategori, $pemasok, $harga, $stok) {
        $sql = "INSERT INTO Products (ProductName, Category, Supplier, UnitPrice, Stock) VALUES ('$nama', '$kategori', '$pemasok', $harga, $stok)";
        if (mysqli_query($conn, $sql)) {
            echo "Barang berhasil ditambahkan.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    // Form untuk menambahkan barang baru
    echo "<h2>Tambah Barang Baru</h2>";
    echo "<form method='post'>";
    echo "Nama Barang: <input type='text' name='nama'><br>";
    echo "Kategori: <input type='text' name='kategori'><br>";
    echo "Pemasok: <input type='text' name='pemasok'><br>";
    echo "Harga: <input type='text' name='harga'><br>";
    echo "Stok: <input type='text' name='stok'><br>";
    echo "<input type='submit' name='submit' value='Tambah'>";
    echo "</form>";

    // Proses form jika disubmit
    if (isset($_POST['submit'])) {
        tambahBarang($conn, $_POST['nama'], $_POST['kategori'], $_POST['pemasok'], $_POST['harga'], $_POST['stok']);
    }

    // Menampilkan stok barang
    echo "<h2>Stok Barang</h2>";
    $result = mysqli_query($conn, "SELECT * FROM Products");
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Product ID</th><th>Nama Barang</th><th>Kategori</th><th>Pemasok</th><th>Harga</th><th>Stok</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row["ProductID"]."</td><td>".$row["ProductName"]."</td><td>".$row["Category"]."</td><td>".$row["Supplier"]."</td><td>".$row["UnitPrice"]."</td><td>".$row["Stock"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Tidak ada barang dalam stok.";
    }

    // Tutup koneksi
    mysqli_close($conn);
    ?>
</body>
</html>
