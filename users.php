<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar User</title>
    <style>
        .button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2 align="center">Daftar User</h2>
    <div align="right"><br/>
		<a href="menu.php" class="button">List Barang</a>
        <a href="input_user.php" class="button">Input User</a>
        <a href="index.php" class="button">Log Out</a>
    </div>
    <br/>
    <br/>
    <table width="600" border="1" align="center">
        <tr>
            <th width="50">ID</th>
            <th width="200">Username</th>
            <th width="150">Password</th>
            <th width="100">Opsi</th>
        </tr>
        <?php 
        $no = 1;
        $data = mysqli_query($koneksi, "SELECT * FROM user");
        while ($d = mysqli_fetch_array($data)) {
            ?>
            <tr>
                <td><div align="center"><?php echo $no++; ?></div></td>
                <td><div><?php echo $d['username']; ?></div></td>
                <td><div><?php echo $d['password']; ?></div></td>
                <td>
                    <div align="center">
                        <a href="hapus_user.php?username=<?php echo urlencode($d['username']); ?>" onclick="return confirm('Yakin ingin menghapus user ini?')">HAPUS</a>
                    </div>
                </td>
            </tr>
            <?php 
        }
        ?>
    </table>
</body>
</html>
