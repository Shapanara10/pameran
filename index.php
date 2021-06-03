<?php
  require_once "koneksi/functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
<!-- Libs CSS -->
<link href="assets/fonts/feather/feather.css" rel="stylesheet"/>
<link href="assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"/>
<link href="assets/libs/dragula/dist/dragula.min.css" rel="stylesheet"/>
<link href="assets/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet"/>
<link href="assets/libs/prismjs/themes/prism.css" rel="stylesheet"/>
<link href="assets/libs/dropzone/dist/dropzone.css" rel="stylesheet"/>
<link href="assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet"/>
<link href="assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet"/>
<link href="assets/libs/%40yaireo/tagify/dist/tagify.css" rel="stylesheet"/>
<link href="assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet"/>
<link href="assets/libs/tippy.js/dist/tippy.css" rel="stylesheet"/>
<!-- Theme CSS -->
<link rel="stylesheet" href="assets/css/theme.min.css"/>
<title>Galery Pameran</title>
</head>
<body>
	
<!-- Navbar -->

<?php include_once 'includes/header2.php'; ?>

<!-- Page Content -->
<div class="bg-primary">
	<div class="container">
		<!-- Hero Section -->
		<div class="row align-items-center no-gutters py-lg-8 ">
			<div class="col-xl-5 col-lg-6 col-md-12">
				<div class="py-5 py-lg-0">
					<h1 class="text-white display-4 font-weight-bold">Welcome to Galery Pameran</h1>
					<p class="text-white-50 mb-4 lead">
						 Anda Dapat Melihat Hasil Karya Kesenian Lokal Masyarakat Indonesia
					</p>
				</div>
			</div>
			<div class="col-xl-7 col-lg-6 col-md-12 text-lg-right text-center">
				<img src="assets/images/kayu.jpg" alt="" class="img-fluid"/>
			</div>
		</div>
	</div>
</div>
<!-- akhir Page Content -->
<!-- Content -->
<div class="py-6">
	<div class="container">
		<!-- Content -->
		<div class="row">
			<div class="col-lg-12 col-md-12 col-12">
				<div class="mb-5">
					<h2 class="mb-1">Karya Kayu Nusantara</h2>
					<p class="mb-0">
						Kesenian Lokal Masyarakat Dari Kayu Alam Indonesia
					</p>
				</div>
			</div>
		</div>
		<div class="row">
		<?php 
                $jumlahDataPerHalaman = 4;
                $sql = "SELECT * FROM blog";
                $result = $dbh->prepare($sql);
                $result-> execute();
                $jumlahData = $result->rowCount();
                $jumlahHalaman = ceil($jumlahData/$jumlahDataPerHalaman);
                $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
                $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
    
                  $blog = DB::query("SELECT * from blog 
				   INNER JOIN pengguna ON blog.id_pengguna = pengguna.id_pengguna
				   WHERE status='published' LIMIT $awalData, $jumlahDataPerHalaman");
                  foreach ($blog as $article):
            ?>
			<div class="col-lg-3 col-md-6 col-12">
				<!-- Card -->
				<div class="card mb-4 card-hover">
					<img src="uploads/post/<?php if(empty($article['Picture'])){echo 'blog_post_1.jpg';}else{echo $article['Picture'];} ?>"  alt="<?php  echo $article['Title']; ?>" title="<?php $article['Title']; ?>" class="img-fluid">
				
					<!-- Card body -->
					<div class="card-body">
						<a href="#!" class="font-size-sm font-weight-semi-bold d-block mb-3 text-primary">#<?php echo $article['Category']; ?></a>
						<h3 class="h4 mb-2 text-truncate-line-2 "><a href="artikel.php?post=<?php echo $article['Title']; ?>" class="text-inherit"><?php echo $article['Title']; ?></a></h3>
						<ul class="mb-3 list-inline">
							<li class="list-inline-item">
								<i class="far fa-clock mr-1"></i><?php echo $article['date_posted']; ?>
							</li>
						</ul>
						<div class="lh-1">
							<span>
							<i class="mdi mdi-star text-warning mr-n1"></i>
							<i class="mdi mdi-star text-warning mr-n1"></i>
							<i class="mdi mdi-star text-warning mr-n1"></i>
							<i class="mdi mdi-star text-warning mr-n1"></i>
							<i class="mdi mdi-star text-warning"></i>
							</span>
						</div>
					</div>
					<!-- Card footer -->
					<div class="card-footer">
						<div class="row align-items-center no-gutters">
							<div class="col-auto">
								<img src="uploads/profile/<?php if(empty($article['poto'])){echo 'testimonial.jpg';}else{echo $article['poto'];} ?>"  alt="<?php  echo $article['Title']; ?>" title="<?php $article['Title']; ?>" class="rounded-circle avatar-sm mr-2" >
							</div>
							<div class="col ml-2">
								<span><?php echo $article['nama']; ?></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>  
		</div>
		<div class="row tm-mb-90 mb-12">
            <div class="col-12 d-flex justify-content-between align-items-center tm-paging-col">
                <?php if( $halamanAktif > 1) : ?>
                    <a href="?halaman=<?= $halamanAktif - 1; ?>" class="btn btn-primary tm-btn-prev mb-2">Previous</a>
                <?php elseif( $halamanAktif == 1) : ?>
                    <a class="btn btn-primary tm-btn-prev mb-2 disabled">Previous</a>
                <?php endif ?>
                <div class="tm-paging d-flex">
                    <?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                        <?php if($i == $halamanAktif) :  ?>
                            <a href="?halaman=<?= $i; ?>" class="active tm-paging-link btn btn-primary mr-sm-2"><?= $i; ?></a>
                        <?php else :  ?>
                            <a href="?halaman=<?= $i; ?>" class="tm-paging-link btn btn-primary mr-sm-2"><?= $i; ?></a>
                        <?php endif;  ?>
                    <?php endfor; ?>
                </div>
                <?php if( $halamanAktif < $jumlahHalaman) : ?>
                    <a href="?halaman=<?= $halamanAktif + 1; ?>" class="btn btn-primary tm-btn-next">Next Page</a>
                <?php elseif( $halamanAktif == $jumlahHalaman) : ?>
                    <a class="btn btn-primary tm-btn-next  disabled">Next Page</a>
                <?php endif ?>
            </div>            
        </div>
	</div>
</div>
<!-- Akhir Content -->
<!-- Awal Footer -->
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