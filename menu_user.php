<!DOCTYPE html>
<html>
<head>
	<title></title>
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
 
	<h2 align="center">Daftar Barang</h2>
	<div align="right"><br/>
	  <a href="input.php" class="button">Input Barang</a>
	  <a href="index.php" class="button">Log Out</a>
	  </div>
	  
	<td><div align="right"></div></td>
	<br/>
	<br/>
	<table width="1000" border="1" align="center">
		<tr>
			<th width="71">ID</th>
			<th width="440">NamaBarang</th>
			<th width="220">Tanggal</th>
			<th width="90">Qty</th>
			<th width="145">Opsi</th>
		</tr>
		<?php 
		include 'koneksi.php';
		$no = 1;
		$data = mysqli_query($koneksi,"select * from barang");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><div align="center"><?php echo $no++; ?></div></td>
				<td><div><?php echo $d['nama_brg']; ?></div></td>
				<td><div align="center"><?php echo $d['tanggal']; ?></div></td>
				<td><div align="center"><?php echo $d['kuantiti']; ?></div></td>
				<td>
					<div align="center">
                    <a href="edit.php?nama_brg=<?php echo urlencode($d['nama_brg']); ?>">EDIT</a>
                    <a href="hapus.php?nama_brg=<?php echo urlencode($d['nama_brg']); ?>" onClick="return confirm('Yakin ingin menghapus barang ini?')">HAPUS</a>
                	</div>
				</td>
			</tr>
			<?php 
		}
		?>
	</table>
</body>
</html>