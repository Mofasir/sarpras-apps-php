<?php
	session_start();
require 'functions.php';

$nama = $_SESSION['nama'];
// pagination
// konfigurasi
$jmlhDataperHal = 3;
$jmlhData = count(query("SELECT * FROM request WHERE nama='$nama'"));
$jmlhHal = ceil($jmlhData / $jmlhDataperHal);
$halAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ( $jmlhDataperHal * $halAktif ) - $jmlhDataperHal;

$request = query("SELECT * FROM request WHERE nama='$nama' LIMIT $awalData, $jmlhDataperHal");
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
            <li><p>Halo <b><?= $_SESSION['nama']; ?></b></p></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
        <button class="navbar-toggler">
            <span></span>
        </button>
    </nav>
    </header>
    <main>
        <div id="content" class="card">
        <h2>Selamat Datang Di Aplikasi Sarana Prasarana Pesantren</h2><br>
        <h1>Fitur Aplikasi</h1><br>
        <h3><li>Melihat dan Mencari Data Sarana</li></h3><br>
        <h3><li>Melihat dan Mencari Data Prasarana</li></h3><br>
        <h3><li>Mengisi Form Permintaan Sarana</li></h3><br>
        <h1>Histori Permintaan Sarana</h1>
        <div class="pagination">
        <?php if( $halAktif > 1 ) :?>
            <a class="pasive" href="?halaman=<?= $halAktif - 1 ?>">&laquo;</a>
        <?php endif;?>

        <?php for( $i = 1; $i <= $jmlhHal; $i++ ) :?>
            <?php if( $i == $halAktif ) :?>
                <a class="active" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
            <?php else :?>
                <a class="pasive" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if( $halAktif < $jmlhHal ) :?>
            <a class="pasive" href="?halaman=<?= $halAktif + 1 ?>">&raquo;</a>
        <?php endif;?>
        </div>
        <table>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Nama Sarana</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
            </tr>
            <?php $i = $awalData + 1; ?>
            <?php foreach($request as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["nama_sarana"]; ?></td>
                <td><?= $row["jumlah"]; ?></td>
                <td><?= $row["keterangan"]; ?></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
        </div>
        <aside>
            <a href="index.php">Home</a>
            <a href="profile.php">Profile</a>
            <a href="sarana.php">Data Sarana</a>
            <a href="prasarana.php">Data Prasarana</a>
            <a href="request.php">Form Permintaan</a>
        </aside>
    </main>
</body>
</html>