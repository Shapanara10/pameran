<?php 
	require_once "koneksi/functions.php";
	$app = new AppLib();
	if (isset($_POST['register'])) {
		$fullname = htmlspecialchars($_POST['fullname']);
		$username = htmlspecialchars($_POST['username']);
		$phone = htmlspecialchars($_POST['phone']);
		$email = htmlspecialchars($_POST['email']);
		$password = htmlspecialchars($_POST['password']);
		$confirmpass = htmlspecialchars($_POST['confirm_password']);
		if ($password == $confirmpass) {
			$app->Register($fullname,$username,$phone,$email,$password);
		}else{
		echo "<script>alert('Password Yang Anda Masukan Tidak Cocok')</script>";
		}  
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Libs CSS -->
<link href="assets/fonts/feather/feather.css" rel="stylesheet"/>
<link href="assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"/>
<link href="assets/libs/dragula/dist/dragula.min.css" rel="stylesheet"/>
<link href="assets/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet"/>
<link href="assets/libs/prismjs/themes/prism.css" rel="stylesheet"/>
<link href="assets/libs/dropzone/dist/dropzone.css" rel="stylesheet"/>
<link href="assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet"/>
<link href="assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
<link href="assets/libs/%40yaireo/tagify/dist/tagify.css" rel="stylesheet">
<link href="assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet">
<link href="assets/libs/tippy.js/dist/tippy.css" rel="stylesheet">
<!-- Theme CSS -->
<link rel="stylesheet" href="assets/css/theme.min.css">
<title>Galery Pameran</title>
</head>
<body>
<!-- Page content -->
<div class="container d-flex flex-column">
	<div class="row align-items-center justify-content-center no-gutters min-vh-100">
		<div class="col-lg-5 col-md-8 py-8 py-xl-0">
			<!-- Card -->
			<div class="card shadow">
				<!-- Card body -->
				<div class="card-body p-6">
					<div class="mb-4">
						
						<h1 class="mb-1 font-weight-bold">Sign up</h1>
						<span>Already have an account? <a href="login.php" class="ml-1">Sign in</a></span>
					</div>
					<!-- Form -->
					<form method="post">
						<!-- FullName -->
						<div class="form-group">
							<label for="fullname" class="form-label">Name Lengkap</label>
							<input type="text" name="fullname" class="form-control" placeholder="Masukan Nama Lengkap" required/>
						</div>
						<!-- Username -->
						<div class="form-group">
							<label for="username" class="form-label">User Name</label>
							<input type="text" class="form-control" name="username" placeholder="Masukan Username" required/>
						</div>
						<!-- Phone -->
						<div class="form-group">
							<label for="phone" class="form-label">Phone</label>
							<input type="text" class="form-control" name="phone" placeholder="Masukan Nomer Hp" required/>
						</div>
						<!-- Email -->
						<div class="form-group">
							<label for="email" class="form-label">Email</label>
							<input type="email" class="form-control" name="email" placeholder="Email address here" required/>
						</div>
						<!-- Password -->
						<div class="form-group">
							<label for="password" class="form-label">Password</label>
							<input type="password" class="form-control" name="password" placeholder="Password" required/>
						</div>
						<!-- Konfirmasi Password -->
						<div class="form-group">
							<label for="confirm_password" class="form-label">Password</label>
							<input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required/>
						</div>
						<div>
							<!-- Button -->
							<button type="submit" name="register" class="btn btn-primary btn-block">Sign Up</button>
							<br><br><span>Batal Sign Up<a href="index.php" class="ml-1">Kembali</a></span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Scripts -->
<!-- Libs JS -->
<script src="assets/libs/jquery/dist/jquery.min.js"></script>
<script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/odometer/odometer.min.js"></script>
<script src="assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
<script src="assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="assets/libs/flatpickr/dist/flatpickr.min.js"></script>
<script src="assets/libs/inputmask/dist/jquery.inputmask.min.js"></script>
<script src="assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="assets/libs/quill/dist/quill.min.js"></script>
<script src="assets/libs/file-upload-with-preview/dist/file-upload-with-preview.min.js"></script>
<script src="assets/libs/dragula/dist/dragula.min.js"></script>
<script src="assets/libs/bs-stepper/dist/js/bs-stepper.min.js"></script>
<script src="assets/libs/dropzone/dist/min/dropzone.min.js"></script>
<script src="assets/libs/jQuery.print/jQuery.print.js"></script>
<script src="assets/libs/prismjs/prism.js"></script>
<script src="assets/libs/prismjs/components/prism-scss.min.js"></script>
<script src="assets/libs/%40yaireo/tagify/dist/tagify.min.js"></script>
<script src="assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
<script src="assets/libs/%40popperjs/core/dist/umd/popper.min.js"></script>
<script src="assets/libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>
<script src="assets/libs/typed.js/lib/typed.min.js"></script>
<script src="assets/libs/jsvectormap/dist/js/jsvectormap.min.js"></script>
<script src="assets/libs/jsvectormap/dist/maps/world.js"></script>
<!-- clipboard -->
<script src="cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>
<!-- Theme JS -->
<script src="assets/js/theme.min.js"></script>
</body>
</html>