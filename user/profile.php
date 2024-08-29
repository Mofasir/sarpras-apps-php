<?php
	session_start();

require 'functions.php';

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
        <h1>Profile</h1>
        <form class="form" method="post" action="">
            
          <label for="nama">Nama</label><br>
          <input id="nama" class="form__input" name="nama" type="text" readonly value="<?= $_SESSION['nama']; ?>">
          
          <label for="username">Username</label><br>
          <input id="username" class="form__input" name="username" type="text" readonly value="<?= $_SESSION['username']; ?>">
          
          <label for="no_hp">No HP</label><br>
          <input id="no_hp" class="form__input" name="no_hp" type="number" readonly value="<?= $_SESSION['no_hp']; ?>">
          
          <button name="edit" class="form__button button"><a href="editProfile.php?id_user=<?= $_SESSION["id_user"]; ?>">Edit</a></button>
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