<?php 
// mengaktifkan session pada php
session_start();
 
$conn = mysqli_connect("localhost", "root", "", "sarpras");

if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
 
$login = mysqli_query($conn,"SELECT * FROM user WHERE username='$username'");

// cek username

if(mysqli_num_rows($login) === 1) {

	// cek password
	$data= mysqli_fetch_assoc($login);
	if (password_verify($password, $data["password"])) {

 		// cek jika user login sebagai admin
		if($data['level']=="admin"){
 
			// buat session login dan username
			$_SESSION['username'] = $username;
			$_SESSION['level'] = $data['level'];
			// alihkan ke halaman dashboard admin
			header("location:./admin/index.php");
 
		// cek jika user login sebagai user
		}else if($data['level']=="user"){
			// buat session login dan username
			$_SESSION['id_user'] = $data['id_user'];
			$_SESSION['nama'] = $data['nama'];
			$_SESSION['username'] = $username;
			$_SESSION['no_hp'] = $data['no_hp'];
			$_SESSION['level'] = $data['level'];
			// alihkan ke halaman dashboard user
			header("location:./user/index.php");
 
		}else{
 
			// alihkan ke halaman login kembali
			header("location:index.php?pesan=gagal");
		}	
	}else{
		header("location:index.php?pesan=gagal");
	}
	exit;
}
?>