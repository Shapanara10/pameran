<?php
  session_start();

  if (strlen($_SESSION['loginUser'])==0) {
      header("Location: index.php");
    }
    require_once "koneksi/functions.php";
 if (isset($_GET['id'])){
		$delete_blog = DB::delete('blog', "id_post=%i", $id = $_GET['id']);
		if ($delete_blog){
		  echo "<script>
				alert('Galery Berhasil Di Hapus');
				document.location='user-galery.php';
				</script>";
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
									<li class="nav-item  active">
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
					<div clas="row">
						<!-- Card -->
					<div class="card mb-4">
						<!-- Card header -->
						<div class="card-header">
							<h3 class="mb-0">Galery Pameran</h3>
							<span>Manage Galery Pameran Anda, Tunggu Apabila Proses menunggu konfirmasi Admin dan Live udah di posting</span>
						</div>
						<!-- Card body -->
						<div class="card-body">
							<!-- Form -->
							<form class="form-row" action="" method="POST">
								<div class="col-lg-9 col-md-7 col-12 mb-lg-0 mb-2">
									<input type="text" name="keyword" id="keyword" class="form-control" placeholder="Search" />
								</div>
							</form>
						</div>
						<!-- Table -->
						<div class="table-responsive border-0 overflow-y-hidden ">
							<table class="table mb-0 text-nowrap table-bordered table-striped">
								<thead>
									<tr>
										<th scope="col" class="border-0">No</th>
										<th scope="col" class="border-0">JUDUL</th>
										<th scope="col" class="border-0">IMAGE</th>
										<th scope="col" class="border-0">CATEGORY</th>
										<th scope="col" class="border-0">DATE</th>
										<th scope="col" class="border-0">Articel</th>
										<th scope="col" class="border-0">STATUS</th>
										<th scope="col" class="border-0"></th>
									</tr>
								</thead>
								<tbody>
								<?php 
										$id_pengguna = $_SESSION['userlogin'];
										$jumlahDataPerHalaman = 10;
										$sql = "SELECT * FROM blog";
										$result = $dbh->prepare($sql);
										$result-> execute();
										$jumlahData = $result->rowCount();
										$jumlahHalaman = ceil($jumlahData/$jumlahDataPerHalaman);
										$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
										$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
                               				$blog = DB::query("Select * from blog WHERE id_pengguna=$id_pengguna order by id_post desc LIMIT $awalData, $jumlahDataPerHalaman ");
                                			$id = 0;
                                			foreach ($blog as $article):
                                    		$id++;
										
                                		?>
									<tr>
										
										<td class="align-middle border-top-0">
											<?php echo $id; ?>
										</td>
										<td class="align-middle border-top-0">
											<h5 class="mb-0"><a href="#!" class="text-inherit"><?php echo $article['Title']; ?></a></h5>
										</td>
										<td class="align-middle border-top-0">
											<img width="80" alt="<?php echo $article['Title']; ?>" src="uploads/post/<?php if(empty($article['Picture'])){echo 'blog_post_1.jpg';}else{echo $article['Picture'];} ?>">
										</td>
										<td class="align-middle border-top-0">
											<a href="#!" class="text-inherit"><?php echo $article['Category']; ?></a>
										</td>
										<td class="align-middle border-top-0">
											<?php echo $article['date_posted'];?>
										</td>
										<td class="align-middle border-top-0">						
											<?php echo $article['Article']; ?>																			
										</td>
										
										<td class="align-middle border-top-0">
												<?php $sts = $article['status']; ?>
												<?php if( $sts == "published") : ?>
													<span class="badge badge-success">Live</span>
												<?php elseif( $sts == "pending") : ?>			
													<span class="badge badge-warning">Pending</span>
												<?php endif;  ?>
										</td>
										<td class="align-middle  text-muted border-top-0">
											<span class="dropdown">
												<a class="text-muted text-decoration-none" href="#!" role="button" id="courseDropdown"
													data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<i class="fe fe-more-vertical"></i>
												</a>
												<span class="dropdown-menu" aria-labelledby="courseDropdown">
													<span class="dropdown-header">Setting </span>
													<a class="dropdown-item" href="edit-user.php?id=<?=$article['id_post']?>"><i class="fe fe-edit dropdown-item-icon"></i>Edit</a>
													<a class="dropdown-item" href="user-galery.php?id=<?=$article['id_post']?>""><i class="fe fe-trash dropdown-item-icon"></i>Remove</a>
												</span>
											</span>
										</td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
					</div>
											<!-- Card Footer -->
											<div class="card-footer">
					
					<nav aria-label="Page navigation example">
						
					<ul class="pagination justify-content-center mb-0">
						<?php if( $halamanAktif > 1) : ?>
						<li class="page-item">
							<a class="page-link mx-1 rounded" href="?halaman=<?= $halamanAktif - 1; ?>" tabindex="-1" aria-disabled="true"><i class="mdi mdi-chevron-left"></i></a>
						</li>
						<?php elseif( $halamanAktif == 1) : ?>
						<li class="page-item disabled">
							<a class="page-link mx-1 rounded" tabindex="-1" aria-disabled="true"><i class="mdi mdi-chevron-left"></i></a>
						</li>
						<?php endif ?>
						<?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
							<?php if($i == $halamanAktif) :  ?>	
								<li class="page-item active">
									<a class="page-link mx-1 rounded" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
								</li>
							<?php else :  ?>
								<li class="page-item">
									<a class="page-link mx-1 rounded" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
								</li>
							<?php endif;  ?>
							<?php endfor; ?>
					<?php if( $halamanAktif < $jumlahHalaman) : ?>
						<li class="page-item">
							<a class="page-link mx-1 rounded" href="?halaman=<?= $halamanAktif + 1; ?>"><i class="mdi mdi-chevron-right"></i></a>
						</li>
					<?php elseif( $halamanAktif == $jumlahHalaman) : ?>
						<li class="page-item">
							<a class="page-link mx-1 rounded"><i class="mdi mdi-chevron-right"></i></a>
						</li>
					<?php endif ?>
					</ul>
					</nav>
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