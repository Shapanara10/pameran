<?php 
   require_once "koneksi/functions.php";
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
<?php include_once 'includes/header2.php'; ?>

    <!-- Content -->
    <div class="py-4 py-lg-12 pb-14 ">
	<?php 
              $title = $_GET['post'];
              // $blog = DB::query("SELECT * FROM blog WHERE Title=%s",$title);
              // foreach ($blog as $article);
              $blog = DB::query("SELECT * from blog 
				      INNER JOIN pengguna ON blog.id_pengguna = pengguna.id_pengguna
				      WHERE status='published' AND Title=%s",$title);
                  foreach ($blog as $article):
            ?>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-8 col-lg-8 col-md-12 col-12 mb-2">
            <div class="text-center mb-4">
              <h1 class="display-3 font-weight-bold mb-4"><?php echo $article['Title']; ?></h1>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <!-- Image -->
          <div class="col-xl-10]2 col-lg-4 col-md-12 col-12 mb-6">
		        <img src="uploads/post/<?php if(empty($article['Picture'])){echo 'blog_post_1.jpg';}else{echo $article['Picture'];} ?>"  alt="<?php  echo $article['Title']; ?>" title="<?php $article['Title']; ?>" class="img-fluid rounded-lg" width="600">
            
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-xl-8 col-lg-8 col-md-12 col-12 mb-2">
            <!-- Descriptions -->
              <div>
                <div class="mb-4">
				            <p><?php echo htmlspecialchars_decode($article['Article']); ?></p>
                </div>
            <!-- Media -->
            <hr class="mt-8 mb-5">
          </div>
        </div>
      </div>
      <?php endforeach; ?>  
      <!-- Container -->
      <div class="container">
        <div class="row">
			<div class="my-5">
              <h2>Related Post</h2>
            </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-12">
		     <?php 
                
                $blog = DB::query("SELECT * from blog 
				        INNER JOIN pengguna ON blog.id_pengguna = pengguna.id_pengguna
				        WHERE status='published' LIMIT 0, 8");
                foreach ($blog as $article):
            ?>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6 col-12">
            <!-- Card -->
            <div class="card mb-4 shadow-lg ">
			        <img src="uploads/post/<?php if(empty($article['Picture'])){echo 'blog_post_1.jpg';}else{echo $article['Picture'];} ?>"  alt="<?php  echo $article['Title']; ?>" title="<?php $article['Title']; ?>" class="card-img-top rounded-top">
              <!-- Card body -->
              <div class="card-body">
                <a href="#!" class="font-size-sm font-weight-semi-bold d-block mb-3 text-primary">#<?php echo $article['Category']; ?></a>
                <a href="artikel.php?post=<?php echo $article['Title']; ?>">
                  <h3><?php echo $article['Title']; ?></h3>
                </a>
                <!-- Media content -->
                <div class="row align-items-center no-gutters mt-4">
                  <div class="col-auto">
                    <img src="uploads/profile/<?php if(empty($article['poto'])){echo 'testimonial.jpg';}else{echo $article['poto'];} ?>"  alt="<?php  echo $article['Title']; ?>" title="<?php $article['Title']; ?>" class="rounded-circle avatar-sm mr-2">
                  </div>
                  <div class="col lh-1">
                    <h5 class="mb-1"><?php echo $article['nama']; ?></h5>
                    <p class="font-size-xs mb-0"><?php echo $article['date_posted']; ?></p>
                  </div>
                </div>
              </div>
            </div>
			<?php endforeach; ?>  
          </div>
        </div>
      </div>
    </div>
	<!-- Akhir Content -->

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