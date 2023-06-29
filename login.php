<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Peminjaman Barang Jurusan Teknik Elektro</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/logo_polines.png" type="image/x-icon"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <style type="text/css">
         html,body{height: 100%;}
         .bg-utama{
         background-image: url("assets/img/polines0.png");
         -webkit-background-size: 100% 100%;
		-moz-background-size: 100% 100%;
		-o-background-size: 100% 100%;
		background-size: 100% 100%;
         background-position: center;
         height: 100%;
         width: 100%;
         display: table;
         vertical-align: middle;
         }
         h1,p{color: white;}
         .konten-ditengah {
         display: table-cell;
         vertical-align: middle;
         }
      </style>

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
    <?php
    session_start();
    if (isset($_SESSION['message'])){
    ?>
        <div class="alert alert-light text-center">
            <?php echo $_SESSION['message']; ?>
        </div>  
    <?php
        unset($_SESSION['message']);  
    }
    ?>
	<div class="bg-utama">
		<div class="wrapper wrapper-login">
			<div class="container container-login animated fadeIn">
				<h3 class="text-center">Silakan Login</h3>
				
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
				</div>
			</div>

		</div>
	</div>
	<center><h6><b>&copy; Copyright@2022|Politeknik Negeri Semarang</b></h6></center>
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
$nohp = $_POST['nohp'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

      mysqli_query($conn,"insert into user values('','$nama_lengkap','$email','$nohp','$username','$password','$level')");
      echo "<script>alert ('Data Berhasil Disimpan') </script>";
      echo"<meta http-equiv='refresh' content=0; URL=index.php>";
}
?>