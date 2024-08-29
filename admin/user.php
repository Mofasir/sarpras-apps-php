<?php
require 'functions.php';
$user = query("SELECT * FROM user WHERE level ='user'");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="s-touch-icon" sizes="76x76" href="../assets/img/logo-app.png">
    <link rel="icon" type="image/png" href="../assets/img/logo-app.png">
    <title>App SarPrasTren</title>
</head>
<body>
    <?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:login.php?pesan=gagal");
	}
	?>
    <header>
    <nav class="navbar">
        <img class="navbar-brand" src="../assets/img/logo-app1.png" alt="logo app">
        <a href="index.php" class="navbar-brand">App SarPrasTren</a>
        <ul>
            <li><p>Anda login sebagai <b><?php echo $_SESSION['level']; ?></b></p></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
        <button class="navbar-toggler">
            <span></span>
        </button>
    </nav>
    </header>
    <main>
        <div id="content" class="card1">
        <h1>Data User</h1>
        <button class="buttonplus"><a href="tambahUser.php">+ Tambah User</a></button>
        <table>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Username</th>
                <th>No HP</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach($user as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["username"]; ?></td>
                <td><?= $row["no_hp"]; ?></td>
                <td><?= $row["level"]; ?></td>
                <td><a class="hapus" href="hapusUser.php?id_user=<?= $row["id_user"]; ?>" onclick="return confirm('Anda Yakin?');">Hapus</a></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
        </div>
        <aside>
            <a href="index.php">Dashboard</a>
            <a href="sarana.php">Data Sarana</a>
            <a href="prasarana.php">Data Prasarana</a>
            <a href="request.php">Data Permintaan</a>
            <a href="user.php">Data User</a>
        </aside>
    </main>
</body>
</html>