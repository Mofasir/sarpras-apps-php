<?php
require 'functions.php';

// pagination
// konfigurasi
$jmlhDataperHal = 6;
$jmlhData = count(query("SELECT * FROM data_sarana"));
$jmlhHal = ceil($jmlhData / $jmlhDataperHal);
$halAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ( $jmlhDataperHal * $halAktif ) - $jmlhDataperHal;

$sarana = query("SELECT * FROM data_sarana LIMIT $awalData, $jmlhDataperHal");

if( isset($_POST["cari"]) ) {
    $sarana = cariSarana($_POST["keyword"]);
}

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
        <h1>Data Sarana</h1>
        <button class="buttonplus"><a href="tambahSarana.php">+ Tambah Sarana</a></button>
        <form action="" method="post">

            <input class="forms__input" type="text" name="keyword" autofocus placeholder="masukkan keyword pencarian..." autocomplete="off">
            <button class="forms__button button" type="submit" name="cari">Cari</button>

        </form>
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
        <button class="buttonprint"><a href="cetakSarana.php" target="blank">Cetak Laporan</a></button>
        <table>
            <tr>
                <th>No.</th>
                <th>Id Sarana</th>
                <th>Nama Sarana</th>
                <th>Jumlah</th>
                <th>Letak</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
            <?php $i = $awalData + 1; ?>
            <?php foreach($sarana as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row["id_sarana"]; ?></td>
                <td><?= $row["nama_sarana"]; ?></td>
                <td><?= $row["jumlah"]; ?></td>
                <td><?= $row["letak"]; ?></td>
                <td><?= $row["keterangan"]; ?></td>
                <td>
                    <a class="edit" href="editSarana.php?id_sarana=<?= $row["id_sarana"]; ?>" >Edit</a> | 
                    <a class="hapus" href="hapusSarana.php?id_sarana=<?= $row["id_sarana"]; ?>" onclick="return confirm('Anda Yakin?');">Hapus</a>
                </td>
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