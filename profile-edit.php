<?php
 session_start(); 
  
  if (strlen($_SESSION['loginUser'])==0) {
      header("Location: index.php");
    }
    require_once "koneksi/classes/db.class.php";
   require_once "koneksi/functions.php";
  if (isset($_POST['edit'])){
	$ugn = $_SESSION['userlogin'];
    $nama = htmlspecialchars($_POST['fullname']);
    $email = htmlspecialchars($_POST['email']);
    $image = $_FILES['image']['name'];
    $phone = htmlspecialchars($_POST['phone']);
     
    if($image != "") {
      $ekstensi_diperbolehkan = array('png','jpg');
      $x = explode('.', $image); 
      $ekstensi = strtolower(end($x));
      $file_tmp = $_FILES['image']['tmp_name'];   
      $nama_image_baru = uniqid();
      $nama_image_baru .= '.';
      $nama_image_baru .= $ekstensi; 
      if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                    move_uploaded_file($file_tmp, 'uploads/profile/'.$nama_image_baru);                        
                      $update_blog = DB::update('pengguna',[
                        'nama'=> $nama,
                        'email'=> $email,
                        'phone'=> $phone,
                        'poto'=>$nama_image_baru,
                      ], "id_pengguna=%i", $id = $ugn);
                      if(!$update_blog){
                          die ("Query gagal dijalankan: ");
                      } else {
                        echo "<script>alert('Profile berhasil diubah.');window.location='profile.php';</script>";
                      }
                } else {     
                    echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='blog.php';</script>";
                }
      } else {
        $update_blog = DB::update('pengguna',[
          'nama'=> $nama,
          'email'=> $email,
          'phone'=> $phone,
        ], "id_pengguna=%i", $id = $ugn);
        if(!$update_blog){
              die ("Query gagal dijalankan: ");
        } else {
            echo "<script>alert('Profile berhasil diubah.');window.location='profile.php';</script>";
        }
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
									<li class="nav-item active">
										<a class="nav-link" href="profile-edit.php"><i class="fe fe-settings nav-icon"></i>Edit Profile</a>
									</li>
									<!-- Nav item -->
									<li class="nav-item">
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
					<div class="row"></div>
					<div class="card">
						<!-- Card header -->
						<div class="card-header">
							<h3 class="mb-0">Profile Details</h3>
							<p class="mb-0">
								Kamu Mempunyai Akses Penuh Untuk Me-Setting Akun Anda.
							</p>
						</div>
						<!-- Card body -->
						<div class="card-body">
			
							<div>
								<h4 class="mb-0">Personal Details</h4>
								<p class="mb-4">
									Edit Profil Diri Anda.
								</p>
								<!-- Form -->
								<form class="form-row" enctype="multipart/form-data" method="post">
									<!-- First name -->
									<div class="form-group col-12 col-md-6">
										<label class="form-label" for="fname">Name Lengkap</label>
										<input type="text" class="form-control" name="fullname"  placeholder="Nama Lengkap" required />
									</div>
									<!-- Last name -->
									<div class="form-group col-12 col-md-6">
										<label class="form-label" for="lname">Email</label>
										<input type="email" name="email" class="form-control" placeholder="Email" required />
									</div>
									<!-- Phone -->
									<div class="form-group col-12 col-md-6">
										<label class="form-label" for="phone">Phone</label>
										<input type="text" name="phone" class="form-control" placeholder="Phone" required />
									</div>
									<div class="custom-file-container" data-upload-id="courseCoverImg" id="courseCoverImg">
											<label class="form-label">Masukan Foto Profile
											<a href="javascript:void(0)" class="custom-file-container__image-clear"
												title="Clear Image"></a></label>
											<label class="custom-file-container__custom-file">
											<input type="file" name="image" class="custom-file-container__custom-file__custom-file-input"
												accept="image/*" required/>
											<input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
											<span class="custom-file-container__custom-file__custom-file-control"></span>
											</label>
											<div class="custom-file-container__image-preview"></div>
										</div>
									<div class="col-12">
										<!-- Button -->
										<button class="btn btn-primary" name="edit" type="submit">
											Update Profile
										</button>
									</div>
								</form>
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