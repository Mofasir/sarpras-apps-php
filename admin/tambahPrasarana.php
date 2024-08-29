<?php
require 'functions.php';

if( isset($_POST["simpan"]) ) {
    if( tambahPrasarana($_POST) > 0 ) {
        echo "<script>
            alert('Data berhasil ditambahkan!');
            document.location.href = 'prasarana.php';
        </script>";
    } else {
        echo mysqli_error($conn);
    }
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
        <h1 class="add">Tambah Prasarana</h1>
        <a class="back" href="prasarana.php">Kembali</a>
        <form class="form" method="post" action="">
          <label for="id_prasarana">Id Prasarana</label><br>
          <input id="id_prasarana" class="form__input" name="id_prasarana" type="text" placeholder="Id Prasarana" required>
          
          <label for="nama_prasarana">Nama Prasarana</label><br>
          <input id="nama_prasarana" class="form__input" name="nama_prasarana" type="text" placeholder="Nama Prasarana" required>
          
          <label for="jumlah">Jumlah</label><br>
          <input id="jumlah" class="form__input" name="jumlah" type="number" placeholder="Jumlah" required>
          
          <label for="keterangan">Keterangan</label><br>
          <input id="keterangan" class="form__input" name="keterangan" type="text" placeholder="Keterangan" required>
          
          <button type="submit" name="simpan" class="form__button button">Simpan</button>
          
        </form>
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