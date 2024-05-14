<!DOCTYPE html>
<html>
<head>
<title>Input User</title>
	<link rel="stylesheet" type="text/css" href="button.css">
</head>
<body>
    <h2 align="center">Input User Baru</h2>
    <form method="post" action="usersinput.php">
        <div>
            <label>Username</label>
            <input type="text" name="username" required>
        </div>
		<br>
        <div>
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
		<br>
		<br>
        <div>
          <div align="left">
            <button type="submit">Submit</button>
          </div>
          <button onclick="history.back()">Kembali</button>
        </div>
    </form>
</body>
</html>
