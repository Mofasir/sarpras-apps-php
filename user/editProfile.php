<?php
	session_start();

require 'functions.php';

$id_user = $_GET["id_user"];

$user = query("SELECT * FROM user WHERE id_user = $id_user")[0];

if( isset($_POST["simpan"]) ) {
    if( editProfile($_POST) > 0 ) {
        echo "<script>
            alert('Profile berhasil diedit!');
            document.location.href = 'profile.php';
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
        <h1 class="add" >Edit Profile</h1>
        <a class="back" href="profile.php">Kembali</a>
        <form class="form" method="post" action="">
        
          <input type="hidden" name="id_user" value="<?= $user["id_user"]; ?>">
          
          <label for="nama">Nama</label><br>
          <input id="nama" class="form__input" name="nama" type="text" placeholder="Nama" required
          value="<?= $user["nama"]; ?>">
          
          <label for="username">Username</label><br>
          <input id="username" class="form__input" name="username" type="text" placeholder="Username" required
          value="<?= $user["username"]; ?>">
          
          <label for="no_hp">No HP</label><br>
          <input id="no_hp" class="form__input" name="no_hp" type="number" placeholder="No HP" required
          value="<?= $user["no_hp"]; ?>">
          
          <button type="submit" name="simpan" class="form__button button">Simpan</button>
        </form>
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