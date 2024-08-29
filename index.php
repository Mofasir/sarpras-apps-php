<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css"><link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="s-touch-icon" sizes="76x76" href="assets/img/logo-app.png">
    <link rel="icon" type="image/png" href="assets/img/logo-app.png">
    <title>App SarPrasTren</title>
  </head>
  <body>
  <?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<script>alert('Username dan Password tidak sesuai!');
        </script>";
		}
	}
	?>
    <div class="main">
      <div class="container a-container" id="a-container">
        <form class="form" id="a-form" method="post" action="cekLogin.php">
          <h2 class="form_title title1">Portal Website</h2>

          <label for="username">Username</label><br>
          <input id="username" name="username" class="form__input" type="text" placeholder="Username" required>

          <label for="password">Password</label><br>
          <input id="username" name="password" class="form__input" type="password" placeholder="Password" required>
          
          <button type="submit" name="masuk" class="form__button button">Masuk</button>
        </form>
      </div>
      <div class="switch" id="switch-cnt">
        <div class="switch__circle"></div>
        <div class="switch__circle switch__circle--t"></div>
        <div class="switch__container" id="switch-c1">
          <h2 class="switch__title title2"><img class="switch__img" src="assets/img/logo-app.png" alt="logo app">Inventarisasi Sarana Prasarana Pesantren</h2>
        </div>
      </div>
    </div>
    <script src="function.js"></script>
  </body>
</html>