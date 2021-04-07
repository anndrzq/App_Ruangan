<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Peminjaman</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/azzara.min.css">
</head>
<body class="login">
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<h3 class="text-center">Silahkan Login</h3>
			
			<div class="login-form">
				<form method="POST" action="cek_login.php">
				<div class="form-group form-floating-label">
					<input id="username" maxlength="15" name="username" type="text" class="form-control input-border-bottom" required>
					<label for="username" class="placeholder">Username</label>
				</div>
				<div class="form-group form-floating-label">
					<input id="password" maxlength="15" name="password" type="password" class="form-control input-border-bottom" required>
					<label for="password" class="placeholder">Password</label>
				</div>
				
				<div class="form-action mb-3">
					<button type="submit" class="btn btn-primary btn-rounded btn-login">Login</button>
				</div>
				</form>
				<div class="login-account">
					<span class="msg">Belum Punya Akun ?</span>
					<a href="#" id="show-signup" class="link">Daftar</a>
				</div>
			</div>
		</div>

		<div class="container container-signup animated fadeIn">
			<h3 class="text-center">Silahkan Daftar</h3>
			<div class="login-form">
				<form method="POST" action="">
				<div class="form-group form-floating-label">
					<input id="fullname" name="nama_lengkap" type="text" class="form-control input-border-bottom" required>
					<label for="fullname" class="placeholder">Nama Lengkap</label>
				</div>
				
				<div class="form-group form-floating-label">
					<input id="email" name="email" type="email" class="form-control input-border-bottom" required>
					<label for="email" class="placeholder">Email</label>
				</div>
				<div class="form-group form-floating-label">
					<input id="nohp" name="nohp" type="text" class="form-control input-border-bottom" required>
					<label for="nohp" class="placeholder">No Handphone</label>
				</div>
				<div class="form-group form-floating-label">
					<input id="username" maxlength="15" name="username" type="text" class="form-control input-border-bottom" required>
					<label for="username" class="placeholder">Username</label>
				</div>
				<div class="form-group form-floating-label">
					<input  id="passwordsignin" maxlength="15" name="password" type="password" class="form-control input-border-bottom" required>
					<label for="passwordsignin" class="placeholder">Password</label>
				</div>
				<input type="hidden" name="level" value="user">
				<div class="form-action">
					<a href="#" id="show-signin" class="btn btn-danger btn-rounded btn-login mr-3">Cancel</a>
					<button name="simpan" type="submit" class="btn btn-primary btn-rounded btn-login">Daftar</button>>
				</div>
				</form>
			</div>
		</div>

	</div>
	<center><h6><b>&copy; Copyright@2020|GPIB CINERE|</b></h6></center>
	<script src="assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="assets/js/core/popper.min.js"></script>
	<script src="assets/js/core/bootstrap.min.js"></script>
	<script src="assets/js/ready.js"></script>
</body>
</html>

<?php
include"koneksi.php";

if(isset($_POST['simpan'])){
$nama_lengkap = $_POST['nama_lengkap'];
$email = $_POST['email'];
$nohp = $_POST['nohp'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

      mysqli_query($conn,"insert into user values('','$nama_lengkap','$email','$nohp','$username','$password','$level')");
      echo "<script>alert ('Data Berhasil Disimpan') </script>";
      echo"<meta http-equiv='refresh' content=0; URL=index.php>";
}
?>