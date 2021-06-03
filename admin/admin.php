<?php 
 session_start(); 
  if (strlen($_SESSION['userlogin'])==0) {
      header("Location: index.php");
    }
  require_once "../koneksi/functions.php";
  
  
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Libs CSS -->
<link href="../assets/fonts/feather/feather.css" rel="stylesheet"/>
<link href="../assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"/>
<link href="../assets/libs/dragula/dist/dragula.min.css" rel="stylesheet"/>
<link href="../assets/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet"/>
<link href="../assets/libs/prismjs/themes/prism.css" rel="stylesheet"/>
<link href="../assets/libs/dropzone/dist/dropzone.css" rel="stylesheet"/>
<link href="../assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet"/>
<link href="../assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
<link href="../assets/libs/%40yaireo/tagify/dist/tagify.css" rel="stylesheet">
<link href="../assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet">
<link href="../assets/libs/tippy.js/dist/tippy.css" rel="stylesheet">
<!-- Theme CSS -->
<link rel="stylesheet" href="../assets/css/theme.min.css">
<title>Admin Galery Pameran</title>
</head>
<body>
<!-- Wrapper -->
<div id="db-wrapper">
    <?php include_once 'includes/nav-admin.php'; ?>
	<!-- Page Content -->
	<div id="page-content">
        <?php include_once 'includes/header-admin.php'; ?>
		<!-- Container fluid -->
		<div class="container-fluid p-4">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-12">
					<div class="border-bottom pb-4 mb-4 d-lg-flex justify-content-between align-items-center">
						<div>
							<h1 class="mb-0 h2 font-weight-bold">Dashboard</h1>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-3 col-lg-6 col-md-12 col-12">
					<!-- Card -->
					<div class="card mb-4">
						<!-- Card body -->
						<div class="card-body">
							<div class="d-flex align-items-center justify-content-between mb-3 lh-1">
								<div>
									<span class="font-size-xs text-uppercase font-weight-semi-bold">Jumlah Kategory Galery</span>
								</div>
								<div>
									<span class=" fe fe-book-open font-size-lg text-primary"></span>
								</div>
							</div>
							<h2 class="font-weight-bold mb-1"><?php echo table_count('category'); ?></h2>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 col-md-12 col-12">
					<!-- Card -->
					<div class="card mb-4">
						<!-- Card body -->
						<div class="card-body">
							<div class="d-flex align-items-center justify-content-between mb-3 lh-1">
								<div>
									<span class="font-size-xs text-uppercase font-weight-semi-bold">Jumlah Posting Galery</span>
								</div>
								<div>
									<span class=" fe fe-book-open font-size-lg text-primary"></span>
								</div>
							</div>
							<h2 class="font-weight-bold mb-1"><?php echo table_count('blog'); ?></h2>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 col-md-12 col-12">
					<!-- Card -->
					<div class="card mb-4">
						<!-- Card body -->
						<div class="card-body">
							<div class="d-flex align-items-center justify-content-between mb-3 lh-1">
								<div>
									<span class="font-size-xs text-uppercase font-weight-semi-bold">Jumlah Pengguna</span>
								</div>
								<div>
									<span class=" fe fe-users font-size-lg text-primary"></span>
								</div>
							</div>
							<h2 class="font-weight-bold mb-1"><?php echo table_count('pengguna'); ?></h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Script -->
<!-- Libs JS -->
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/libs/odometer/odometer.min.js"></script>
<script src="../assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
<script src="../assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="../assets/libs/flatpickr/dist/flatpickr.min.js"></script>
<script src="../assets/libs/inputmask/dist/jquery.inputmask.min.js"></script>
<script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="../assets/libs/quill/dist/quill.min.js"></script>
<script src="../assets/libs/file-upload-with-preview/dist/file-upload-with-preview.min.js"></script>
<script src="../assets/libs/dragula/dist/dragula.min.js"></script>
<script src="../assets/libs/bs-stepper/dist/js/bs-stepper.min.js"></script>
<script src="../assets/libs/dropzone/dist/min/dropzone.min.js"></script>
<script src="../assets/libs/jQuery.print/jQuery.print.js"></script>
<script src="../assets/libs/prismjs/prism.js"></script>
<script src="../assets/libs/prismjs/components/prism-scss.min.js"></script>
<script src="../assets/libs/%40yaireo/tagify/dist/tagify.min.js"></script>
<script src="../assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
<script src="../assets/libs/%40popperjs/core/dist/umd/popper.min.js"></script>
<script src="../assets/libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>
<script src="../assets/libs/typed.js/lib/typed.min.js"></script>
<script src="../assets/libs/jsvectormap/dist/js/jsvectormap.min.js"></script>
<script src="../assets/libs/jsvectormap/dist/maps/world.js"></script>
<!-- clipboard -->
<script src="cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>
<!-- Theme JS -->
<script src="../assets/js/theme.min.js"></script>
</body>

</html>