<?php
 session_start(); 
 
  
  if (strlen($_SESSION['loginUser'])==0) {
      header("Location: index.php");
    }
    require_once "koneksi/functions.php";
  if (isset($_GET['id'])){
		$delete_blog = DB::delete('pengguna', "id_pengguna=%i", $id = $_GET['id']);
		if ($delete_blog){
		  echo "<script>
				alert('Akun Berhasil Di Hapus');
				document.location='index.php';
				</script>";
	  }
	}
	
	
	$id_pengguna = $_SESSION['userlogin']
	 
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



<!-- Libs CSS -->

<link href="assets/fonts/feather/feather.css" rel="stylesheet" />
<link href="assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
<link href="assets/libs/dragula/dist/dragula.min.css" rel="stylesheet" />
<link href="assets/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />
<link href="assets/libs/prismjs/themes/prism.css" rel="stylesheet" />
<link href="assets/libs/dropzone/dist/dropzone.css" rel="stylesheet" />
<link href="assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet" />
<link href="assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
<link href="assets/libs/%40yaireo/tagify/dist/tagify.css" rel="stylesheet">
<link href="assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet">
<link href="assets/libs/tippy.js/dist/tippy.css" rel="stylesheet">




<!-- Theme CSS -->
<link rel="stylesheet" href="assets/css/theme.min.css">
	<title>Galery Pameran</title>
</head>

<body>
<!-- Navbar -->
<?php include_once 'includes/header.php'; ?>
<?php include_once 'includes/header-user.php'; ?>
<!-- Page Content -->
<div class="pt-5 pb-5">
		<div class="container">
			<!-- User info -->
			<div class="row mt-0 mt-md-4">
				<div class="col-lg-3 col-md-4 col-12">
					<!-- User profile -->
					<nav class="navbar navbar-expand-md navbar-light shadow-sm mb-4 mb-lg-0 sidenav">
						<!-- Menu -->
						<a class="d-xl-none d-lg-none d-md-none text-inherit font-weight-bold" href="#!">Menu</a>
						<!-- Button -->
						<button class="navbar-toggler d-md-none icon-shape icon-sm rounded bg-primary text-light" type="button"
							data-toggle="collapse" data-target="#sidenav" aria-controls="sidenav" aria-expanded="false"
							aria-label="Toggle navigation">
							<span class="fe fe-menu"></span>
						</button>
						<!-- Collapse -->
						<div class="collapse navbar-collapse" id="sidenav">
							<div class="navbar-nav flex-column">
								<span class="navbar-header">Dashboard</span>
								<ul class="list-unstyled ml-n2 mb-4">
									<!-- Nav item -->
									<li class="nav-item">
										<a class="nav-link" href="profile.php"><i class="fe fe-home nav-icon"></i>My
											Dashboard</a>
									</li>
									<!-- Nav item -->
									<li class="nav-item">
										<a class="nav-link" href="user-galery.php"><i class="fe fe-book nav-icon"></i>Galery Pameran</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="user-testimony.php"><i class="fe fe-book nav-icon"></i>Testimony</a>
									</li>
								</ul>
								<!-- Navbar header -->
								<span class="navbar-header">Account Settings</span>
								<ul class="list-unstyled ml-n2 mb-0">
									<!-- Nav item -->
									<li class="nav-item">
										<a class="nav-link" href="profile-edit.php"><i class="fe fe-settings nav-icon"></i>Edit Profile</a>
									</li>
									<!-- Nav item -->
									<li class="nav-item active">
										<a class="nav-link" href="delete-profile.php"><i class="fe fe-trash nav-icon"></i>Delete
											Profile</a>
									</li>
									<!-- Nav item -->
									<li class="nav-item">
										<a class="nav-link" href="logout.php"><i class="fe fe-power nav-icon"></i>Sign Out</a>
									</li>
								</ul>
							</div>
						</div>
					</nav>
				</div>
	<!-- Content -->
				<div class="col-lg-9 col-md-8 col-12">
					<div class="row">
											<!-- Card -->
					<div class="card">
						<!-- Card header -->
						<div class="card-header">
							<h3 class="mb-0">Delete your account</h3>
							<p class="mb-0">Hapus atau Close Akun Anda Secara Permanen.</p>
						</div>
						<!-- Card body -->
						<div class="card-body p-4">
							<span class="text-danger h4">Warning</span>
							<p>
								Jika Kamu Menutup Akun, Maka Semua Postingan Galery Pameran Akan Terhapus Permanen 
								dan Kehilangan Akses Login Selamanya
							</p>
							<a href="delete-profile.php?id=<?=$id_pengguna?>" class="btn btn-outline-danger btn-sm">Close My Account</a>
						</div>
					</div>
					</div>

				</div>
			</div>
		</div>
	</div>
 <!-- Footer -->
<?php include_once 'includes/footer.php'; ?> 
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