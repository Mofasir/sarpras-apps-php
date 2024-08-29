<?php
require 'functions.php';

if( isset($_POST["simpan"]) ) {
    if( tambahUser($_POST) > 0 ) {
        echo "<script>
            alert('User baru berhasil ditambahkan!');
            document.location.href = 'user.php';
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
        <h1 class="add">Tambah User</h1>
        <a class="back" href="user.php">Kembali</a>
        <form class="form" method="post" action="">

          <label for="nama">Nama</label><br>
          <input id="nama" class="form__input" name="nama" type="text" placeholder="Nama" required>
          
          <label for="username">Username</label><br>
          <input id="username" class="form__input" name="username" type="text" placeholder="Username" required>
          
          <label for="password">Password</label><br>
          <input id="password" class="form__input" name="password" type="password" placeholder="Password" required>
          
          <label for="kpassword">Konfirmasi Password</label><br>
          <input id="kpassword" class="form__input" name="kpassword" type="password" placeholder="Konfirmasi Password" required>
          
          <label for="no_hp">No HP</label><br>
          <input id="no_hp" class="form__input" name="no_hp" type="number" placeholder="No HP" required>
          
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