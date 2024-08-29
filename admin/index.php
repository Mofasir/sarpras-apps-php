<?php
	session_start();
require 'functions.php';

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
        <h2>Dashboard</h2>
          <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-1">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <?php 
                    $sarana = mysqli_query($conn, "SELECT * FROM data_sarana");
                    $counts = mysqli_num_rows($sarana);
                    ?> 
                    <img src="../assets/img/note.png" alt="note">
                  </div>
                  <p class="card-category">Data Sarana</p>
                  <h3 class="card-title"><?= $counts;?>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a class="view" href="sarana.php">View Detail</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <?php 
                    $prasarana = mysqli_query($conn, "SELECT * FROM data_prasarana");
                    $countp = mysqli_num_rows($prasarana);
                    ?>
                    <img src="../assets/img/building.png" alt="building">
                  </div>
                  <p class="card-category">Data Prasarana</p>
                  <h3 class="card-title"><?= $countp;?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a class="view" href="prasarana.php">View Detail</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <?php 
                    $request = mysqli_query($conn, "SELECT * FROM request");
                    $countr = mysqli_num_rows($request);
                    ?>
                    <img src="../assets/img/hand.png" alt="request">
                  </div>
                  <p class="card-category">Data Permintaan</p>
                  <h3 class="card-title"><?= $countr;?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a class="view" href="request.php">View Detail</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1">
              <div class="card card-stats">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <?php 
                    $user = mysqli_query($conn, "SELECT * FROM user WHERE level='user'");
                    $countu = mysqli_num_rows($user);
                    ?>
                    <img src="../assets/img/user.png" alt="user">
                  </div>
                  <p class="card-category">Data User</p>
                  <h3 class="card-title"><?= $countu;?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a class="view" href="user.php">View Detail</a>
                  </div>
                </div>
              </div>
            </div>
            </div>  
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